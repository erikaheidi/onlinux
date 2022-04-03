---
title: How to connect and use the Shure SMB7 Microphone on Linux (Ubuntu 21.10)
author_twitter: erikaheidi
description: In this guide I share how I connected my Shure SMB7 microphone to my Ubuntu 21.10 machine
tags: guides, microphones, audio, setup
cover_image: https://onlinux.ams3.digitaloceanspaces.com/shuresmb7_guide.png
---

If you have been watching video podcasts or live streams lately, you may have noticed a distinct microphone that seems to be the favorite of pro Youtubers and streamers. The [Shure SMB7 microphone](/devices/shure-smb7) is a top-notch dynamic microphone that reduces background noise and is especially designed for voice capture.

No wonder why this microphone is a favorite for so many folks. I was surprised with how much better my voice sounded with it! For comparison, check this [microphone samples page](/blog/20220328_microphones-compared).

The SMB7 produces clean recordings that make your voice sound very natural and "warm". Thanks to its cardioid capture pattern, air suspension shock isolation, and built-in pop filter, the SMB7 blocks most of the background noise around you, which makes it a superb choice for both studio and home recording or podcasting.

In this guide I'll share how to set up a Shure SMB7 microphone and how to use it on Linux. 

### Requirements

The following devices were used in this setup:

{% device shure-smb7 %}

{% device focusrite-scarlet-2i2 %}

{% device cloudlifter-cl-1 %}

You'll also need a microphone mount such as the [Rode PSA1 microphone boom arm](https://amzn.to/3NoRfMK) since the Shure SMB7 package doesn't come with any stand or mount, and **two** [XLR cables](https://amzn.to/3uvViym) to connect the microphone through the two devices.

This guide was developed and tested within an **Ubuntu 21.10** Linux system.

## 1. Setting Up the Devices

Follow the manual instructions to mount your Shure SMB7 microphone to a stand. If you went with the [Rode PSA1 microphone boom arm](https://amzn.to/3NoRfMK), which is a popular choice for this microphone, you have the option to mount it in two different ways: as a desk-clamp for desks up to 55mm thick, or as a desk-insert for desks up to 70mm thick - which requires you to make a hole in your desk to pass the attachment through. I am using the desk-clamp attachment, and have it set up on the left side of my desk:

![Rode PSA1 Desk mount clamp](https://onlinux.ams3.digitaloceanspaces.com/desk_mount.png)

### Connecting the cables

Start connecting an XLR cable to your Shure SMB7 microphone and connecting the other end of the cable to your Cloudlifter device. You won't need to interact with this device, so it's more than okay to place it in a hidden spot in your desk. I put mine under the table, hold with a cable net and some tape:

![Cloudlifter under the desk](https://onlinux.ams3.digitaloceanspaces.com/under_desk.jpg)

Then, connect the other XLR cable to the Cloudlifter, and use the other end of the cable to connect it to the Scarlet audio interface. The audio interface should sit at your desk in a position that lets you control the volume and turn the phantom power on/off - just don't tuck it in a difficult spot, you want to have clear access to this device. Then, connect the audio interface to the power input and make sure it's turned on.

![Scarlet 2i2 audio interface turned on](https://onlinux.ams3.digitaloceanspaces.com/scarlet.png)

Now you can connect the Scarlet audio interface to your computer via USB. Once you do that, the device should be automatically detected. On Ubuntu (and probably other systems too), it will also mount a small disk partition containing installation instructions.

## 2. Testing your Setup

While the Shure SMB7 itself doesn't require [phantom power](https://www.sweetwater.com/sweetcare/articles/what-phantom-power-need/#), pre-amps such as the Cloudlifter will require phantom power to operate, and that's why you will need to turn this on to make your setup fully functional. Just press the "48V" button on the Scarlet, you should see a red LED indicating that the phantom power is on. This is super important - when I first set everything up, I forgot to turn this on, and spent a lot of time trying to solve the issue via software when it was really just missing that extra input juice to power the preamp.

After adjusting the volume, you should be able to get instant feedback from the microphone if you tap it. You'll see the LED around the volume knob to light in orange / red in the Scarlet device. This means the device is successfully capturing audio, now you just need to set it up within your system.

Within Ubuntu 21.04+ systems, the audio interface will be recognized as "Analog Input - Scarlet 2i2 Camera", and this is what you'll need to select as your input / microphone in your system settings:

![Selecting the Scarlet audio interface as input on Linux Ubuntu 21.10](https://onlinux.ams3.digitaloceanspaces.com/scarlet_analog_input.png)

Because the Scarlet 2i2 also provides an output line with the combined output from its two channels, it is often recognized by the system and set as your default output, so just remember to change that to your preferred output such as laptop speakers or headphones.

### Recording

Now it's time to finally test the microphone with an actual recording. There are quite a few different open source / free applications you can use for that, but I would recommend something like [Audacity](https://www.audacityteam.org/) for simplicity. 

![Audio recording with Audacity on Linux Ubuntu 21.10](https://onlinux.ams3.digitaloceanspaces.com/audacity.png)

Here's a quick check-up list:

- Make sure the "Analog Input - Scarlet 2i2 Camera" device is selected as **input** device on your system settings
- Make sure the "48v" button is enabled on the Scarlet 2i2 device to enable phantom power
- Make sure to turn the volume up on the Scarlet 2i2 device and that you can see the LED around the volume knob turning green / orange when you tap or speak on the microphone

_**Important:** Always make sure you select "mono" channel when setting up your SMB7 input within different sound recording applications. If you set it as "stereo", your recording will come only on one side, which is easy to notice when using headphones but may go unnoticed if you are using your pc speakers to listen to the recorded sound. Some applications will set it to "stereo" by default, I had this issue with OBS._

Here's a sample of my own:

{% audio /audio/mic_samples/shure_smb7_nobg.mp3 %}

## Conclusion

The Shure SMB7 microphone is a fantastic vocal microphone used by professionals all around the world, and it works perfectly fine on Linux <3 With the correct setup, you will be able to create professional-sounding podcasts, YouTube videos, live streams, and even make some music if that's your vibe.

![Shure unboxing](https://onlinux.ams3.digitaloceanspaces.com/smb7-unboxing.png)