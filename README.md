# Universal Remote Project

This project presents a web interface for a universal remote using a Raspberry Pi, complete with a livestream of the TV or device being controlled. 

## Setup

1. Compile FFMpeg

FFMpeg must be compiled to enable hardware-accellerated H.254 encoding. First, get all the required libraries and tools:

```sh
sudo apt-get update
sudo apt-get install autoconf automake build-essential libass-dev libfreetype6-dev \
libsdl1.2-dev libtheora-dev libtool libva-dev libvdpau-dev libvorbis-dev libxcb1-dev libxcb-shm0-dev \
libxcb-xfixes0-dev pkg-config texinfo zlib1g-dev libomxil-bellagio-dev
```

