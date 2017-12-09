#!/bin/bash
# Untested build script. Run at your own risk.
#

# Get all prerequisites from the package manager
apt-get -y update
apt-get -y install autoconf automake build-essential curl texinfo pkg-config  libtool \
                   libass-dev libfreetype6-dev libsdl1.2-dev libtheora-dev libva-dev libvdpau-dev \
                   libvorbis-dev libxcb1-dev libxcb-shm0-dev libxcb-xfixes0-dev zlib1g-dev libssl-dev \
                   libomxil-bellagio-dev libpcre3 libpcre3-dev libpcre++-dev libcurl4-openssl-dev

# Get all sources
# Assuming one level up is safe. Might be a bad assumption.
cd ..
git clone https://github.com/ffmpeg/FFMpeg --depth 1
git clone https://github.com/sergey-dryabzhinsky/nginx-rtmp-module.git
sudo cp -rv nginx-rtmp-module /usr/src
wget http://nginx.org/download/nginx-1.13.7.tar.gz
tar xf nginx-1.13.7.tar.gz

# Deal with FFMpeg first
# This will take at least half an hour
cd FFMpeg
./configure --enable-gpl --enable-nonfree --enable-mmal --enable-omx --enable-omx-rpi
make -j4
make install
cd ..

# Deal with NGINX
apt-get -y install nginx
apt-get -y remove nginx
apt-get clean
cd nginx-1.13.7
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
make install
cp -v ../MicroFinal/nginx.conf /etc/nginx
apt-get -y install php-fpm
# Edit some file here... Learn sed
service php7.0-fpm restart
service nginx restart

# LIRC junk pending

# That's all folks
