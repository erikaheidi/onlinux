---
title: Focusrite Scarlet 2i2
description: Overview of the Focusrite Scarlet 2i2 audio interface and how it works on Linux
tags: devices, microphone, audio
cover_image: https://onlinux.ams3.digitaloceanspaces.com/scarlet.png
---

The [Focusrite Scarlet 2i2](https://www.amazon.nl/gp/product/B07QR73T66/ref=ppx_yo_dt_b_asin_title_o07_s01?ie=UTF8&psc=1) is an audio interface with two mic/line/instrument inputs that basically lets you connect microphones and other equipment compatible with [XLR connectors](https://www.amazon.com/AmazonBasics-Male-Female-Microphone-Cable/dp/B01JNLTTKS) to your computer via USB. It offers studio-quality recording for both voice and instruments, and that's one of the reasons they are so popular with podcasters along with a [Shure SMB7 microphone](/devices/shure-smb7).

## OnLinux Review

- **Works on Linux?**
  - **Yes.** You don't need any extra software on Ubuntu 21.04+, the device connects via USB and becomes an audio device that you can set up as input / microphone called "Scarlet i2i audio interface". Make sure you toggle the "48V" button to enable [phantom power](https://www.sweetwater.com/sweetcare/articles/what-phantom-power-need/#) if you are using it with a condenser microphone (such as the Shure SMB7), since those require an extra power input.
- **Tested with**
  - Ubuntu 21.04, 21.10
