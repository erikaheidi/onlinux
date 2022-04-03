---
title: Shure SMB7
description: Shure SMB7 microphone overview and how it works on Linux
tags: devices, microphones, audio
cover_image: https://onlinux.ams3.digitaloceanspaces.com/shure_smb7.png
---

The [Shure SMB7 dynamic microphone](https://amzn.to/3wGY6LD) is a popular choice for outstanding voice recording, used by professional musicians, podcasters, youtubers... It's one of the best microphones available in the market, especially designed for voice recording. Because it is a professional microphone that uses a [XLR connection](https://amzn.to/3uvViym) (and not a USB plug-and-play one), you will need a couple more devices in order to connect this beauty to your computer:
 
1. an audio interface such as the [Scarlet i2i](/devices/focusrite-scarlet-2i2), which connects to your computer via USB and has two inputs where you can connect two microphones or one microphone and a guitar, for instance.
2. a microphone pre-amp or activator such as the [Cloudlifter](/devices/cloudlifter-cl-1). Without this one, your voice won't sound loud and clear enough.

You'll also need a microphone mount such as the [Rode PSA1 microphone boom arm](https://amzn.to/3NoRfMK) since the Shure SMB7 package doesn't come with any stand or mount, and [XLR cables](https://amzn.to/3uvViym) to connect the devices.

## OnLinux Review

- **Works on Linux?**
  - **Yes.** This microphone requires additional devices to be connected to your computer, no matter the OS. Once connected via a compatible audio interface such as the Scarlet, it is plug-and-play and will show up on your audio settings as "Scarlet i2i audio interface". No extra software needed on Ubuntu 21.04+.
- **Tested with**
  - Ubuntu 21.04, Ubuntu 21.10

### Audio Samples
Clean recording without background noise:
{% audio /audio/mic_samples/shure_smb7_nobg.mp3 %}

Recording with background noise:
{% audio /audio/mic_samples/shure_smb7.mp3 %}