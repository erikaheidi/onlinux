---
title: Huion Kamvas 13 Graphics Drawing Tablet
description: Overview of the Huion Kamvas 13 drawing tablet and how it works on Linux
tags: devices, drawing, tablet, huion
cover_image: https://onlinux.ams3.digitaloceanspaces.com/huion_kamvas_cover.png
---

The [Huion Kamvas 13](https://amzn.to/3IIEPf6) is a drawing tablet that also works as portable USB-C touch display. It has a 13.3 inch laminated screen, 8 express keys,  and comes with a battery-free, pressure-sensitive stylus that supports 8k+ levels of pen pressure and 60 degrees of tilt function. The display has a 1920x1080 resolution with 16.7 million colors. On Ubuntu 21.10+, the Kamvas 13 is automatically detected as an additional display, so you may have to configure positioning under the `Settings -> Displays` menu. You'll find configuration options for the tablet buttons under the main Ubuntu Settings panel, in a section called "Wacom Tablet".

{% video https://onlinux.ams3.digitaloceanspaces.com/kamvas_demo.mp4 %}

By default, the Huion 13 Kamvas tablet comes with a 3-in-1 cable that powers the tablet via 2 regular USBs and connects to the computer via HDMI. However, it also supports connection and power combined as one full-featured USB-C cable (not included). I strongly recommend you get [the USB-C cable](https://amzn.to/3M1QOGD) as it greatly facilitates connecting and operating your Huion tablet. With the USB-C cable you can also connect to Android phones and tablets, as long as the devices are compatible with the feature, and you provide an additional power supply to the Huion tablet.

Mapping buttons on Ubuntu 21.10+ is very straightforward, and you can do it through the Ubuntu Settings panel. Go to `Settings -> Wacom Tablet` then choose the **Tablet** tab. Click the **Map Buttons** button to configure the tablet buttons.

![Mapping Huion buttons on Ubuntu 21.10+](https://onlinux.ams3.digitaloceanspaces.com/map_kamvas_buttons.jpg)

- **Works on Linux?**
  - Yes, with minimal configuration. It works straight away as a USB touch display. You'll have to configure it as such - go to `Settings -> Displays` and arrange your displays to match your physical setup. To use it for drawing, you'll have to open the drawing application of your choice (for instance, [MyPaint](http://mypaint.org/)) and drag it into the tablet display. To configure the buttons, you should access `Settings -> Wacom Tablet` then choose the **Tablet** tab. Click the **Map Buttons** button to configure the tablet buttons.
- **Tested with**
  - Linux Ubuntu 21.10

