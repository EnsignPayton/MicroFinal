# Universal Remote Project

## Overview

This project presents a web interface for a universal remote using a Raspberry Pi, complete with a livestream of the TV or device being controlled. 

The project is divided in to two parts, collected together on the final webpage.

![image](https://user-images.githubusercontent.com/18620874/33733009-4ec83fe8-db56-11e7-9cb2-9ba61bb9e273.png)

### Input

The input is a USB webcam, typically mounted to `/dev/video0`. We read from the webcam, encode the stream in H.264, and push out over RTMP with FFMpeg. This stream is picked up locally by NGINX and translated to an HLS stream. We grab the HLS stream on the frontend via Hls.js, which displays our livestream in an html video element.

### Output

The output is infrared light emitted by GPIO connected circuitry. Buttons on the frontend execute an AJAX call through jQuery which calls a PHP script. This PHP script executes a shell script, which parses the command type passed as an argument and executes the proper command. Commands are sent using the `irsend` tool of the LIRC project.

## Setup

### 1. Set up FFMpeg

FFMpeg must be compiled to enable hardware-accellerated H.264 encoding. First, get all the required libraries and tools:

```sh
sudo apt-get update
sudo apt-get install autoconf automake build-essential libass-dev libfreetype6-dev \
libsdl1.2-dev libtheora-dev libtool libva-dev libvdpau-dev libvorbis-dev libxcb1-dev libxcb-shm0-dev \
libxcb-xfixes0-dev pkg-config texinfo zlib1g-dev libomxil-bellagio-dev
```

Clone the latest FFMpeg:

```sh
cd ~
git clone https://github.com/ffmpeg/FFMpeg --depth 1
```

Configure and compile (multithreaded for speed, reduce threads if you experience problems):

```sh
cd ~/FFMpeg
./configure --enable-gpl --enable-nonfree --enable-mmal --enable-omx --enable-omx-rpi
make -j4
```

### 2. Set up NGINX

NGINX must be compiled with a module to process RTMP streams.
Install dependencies: 

```sh
sudo apt-get install build-essential libpcre3 libpcre3-dev libpcre++-dev curl libcurl4-openssl-dev libssl-dev zlib1g-dev
```

The easiest way to properly configure your system is to install and then remove the repo version:

```sh
sudo apt-get install nginx
sudo apt-get remove nginx
sudo apt-get clean
```

Get the source for NGINX and the RTMP module:

```sh
cd ~
git clone https://github.com/sergey-dryabzhinsky/nginx-rtmp-module.git
sudo cp -rv nginx-rtmp-module /usr/src
wget http://nginx.org/download/nginx-1.13.7.tar.gz
tar xf nginx-1.13.7.tar.gz
cd nginx-1.13.7
```

Compile and install

```sh
./configure --prefix=/var/www \
            --sbin-path=/usr/sbin/nginx \
            --conf-path=/etc/nginx/nginx.conf \
            --pid-path=/var/run/nginx.pid \
            --error-log-path=/var/log/nginx/error.log \  
            --http-log-path=/var/log/nginx/access.log \ 
            --with-http_ssl_module \
            --without-http_proxy_module \ 
            --add-module=/usr/src/nginx-rtmp-module
make -j 1
sudo make install
```

To configure, copy `nginx.conf` to `/etc/nginx` and make changes as desired.

```sh
git clone https://github.com/EnsignPayton/MicroFinal.git
cd MicroFinal
sudo cp -v nginx.conf /etc/nginx
```

Finally, restart the server

```sh
sudo service nginx restart
```

### 3. Set up PHP

Install the PHP package (nope, no compiling this one):

```sh
sudo apt-get install php-fpm
```

Make sure we have `cgi.fix_pathinfo=0` in `/etc/php/7.0/fpm/php.ini`.

Now, configure NGINX to use PHP. This is already done in the provided conf, if you're not using it then just figure it out.

Finally, restart our stuff:

```sh
sudo service php7.0-fpm restart
sudo service nginx restart
```

### 4. Set up LIRC

We have to install it first:

```sh
sudo apt-get install lirc
```

Enable some kernel modules:

```sh
sudo cat >> /etc/modules << EOF
lirc_dev
lirc_rpi gpio_in_pin=23 gpio_out_pin=22
EOF
```

Configure LIRC for your hardware:

```sh
sudo cat > /etc/lirc/hardware.conf << EOF
# Arguments which will be used when launching lircd
LIRCD_ARGS="--uinput"

# Don't start lircmd even if there seems to be a good config file
# START_LIRCMD=false

# Don't start irexec, even if a good config file seems to exist.
# START_IREXEC=false

# Try to load appropriate kernel modules
LOAD_MODULES=true

# Run "lircd --driver=help" for a list of supported drivers.
DRIVER="default"

# usually /dev/lirc0 is the correct setting for systems using udev
DEVICE="/dev/lirc0"

MODULES="lirc_rpi"

# Default configuration files for your hardware if any
LIRCD_CONF=""
LIRCMD_CONF=""
EOF
```

Enable LIRC in your device tree:

```sh
sudo cat >> /boot/config.txt << EOF
dtoverlay=lirc-rpi,gpio_in_pin=23,gpio_out_pin=22
EOF
```

And restart LIRC:

```sh
sudo service lircd restart
```

There's more configuration to be done, and I haven't gotten it working yet. Might update when I do.

### 5. Add frontend

Copy the contents of `www` to `/var/www`, or wherever you host your website. 

```sh
cd MicroFinal
sudo cp -rv ./www /var
```

### 6. Run FFMpeg

Finally, to start the livestream, run FFMpeg:

```sh
ffmpeg -i /dev/video0 -c:v h264_omx -b:v 3000K -c:a:0 libfdk_aac -b:a:0 480k -f flv rtmp://localhost:1935/hls/mystream;
```

## Resources

These things helped:

* http://www.lirc.org/html/irsend.html
* https://www.ocinside.de/modding_en/linux_ir_irrecord_list/
* http://ffmpeg.org/pipermail/ffmpeg-user/2017-October/037577.html
* https://www.reddit.com/r/raspberry_pi/comments/5677qw/hardware_accelerated_x264_encoding_with_ffmpeg/
* https://docs.peer5.com/guides/setting-up-hls-live-streaming-server-using-nginx/
* https://stackoverflow.com/questions/19658216/how-can-we-transcode-live-rtmp-stream-to-live-hls-stream-using-ffmpeg
* https://pkula.blogspot.de/2013/06/live-video-stream-from-raspberry-pi.html
* https://www.hackster.io/austin-stanton/creating-a-raspberry-pi-universal-remote-with-lirc-2fd581
