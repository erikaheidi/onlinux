---
title: How to Disable Wayland on Ubuntu 22.04
description: This short guide shows how to disable Wayland on Ubuntu 22.04.
tags: guides, ubuntu, wayland
cover_image: https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204/ubuntu2204_disable_wayland.png
---

## Introduction

[Wayland](https://wayland.freedesktop.org/) is a communication protocol and implementation of a display system that works as a replacement for X, used by Ubuntu 22.04 as default display server.

Although Wayland comes as default, X is still ships with Ubuntu and is used for backwards compatibility. Not all applications run on Wayland, so you may be faced with a situation where if you want to use a certain app, you will need to disable Wayland. 

That's the case with [Streamdeck-ui](https://timothycrosley.github.io/streamdeck-ui/#linux-quick-start), since the underlying libraries have limited support for Wayland. I want to use my Streamdeck on Ubuntu, and I want the convenience of setting up my custom buttons via a nice UI interface. I had to disable Wayland for that. So far, so good; I didn't notice any difference to be quite honest.

**_DISCLAIMER: I'm not advising you to arbitrarily disable Wayland from your system; but, if you run into issues related to screen capture or input, you should give this a try to see if it solves your problems._**

### Requirements

This guide was developed and tested within the following environment:

- Linux Ubuntu 22.04

## 1. Disable Wayland in `custom.conf`

Open the file `/etc/gdm3/custom.conf`:

```shell
sudo nano /etc/gdm3/custom.conf
```

Search for the  **WaylandEnable** config. You should set it to **false** in order to disable Wayland:

```shell
WaylandEnable=false
```

Save the file and exit. On nano, you do that with `CTRL`+`X` then `y` and `ENTER` to confirm.

## 2. Restart GDM
You'll need to restart your Gnome Display Manager (GDM) in order to apply the change and switch back to X. When you run the following command, your screen should go black for a few moments, then you will be presented with the log in screen again. You should save any important work you're doing since all windows will be closed.

```shell
sudo systemctl restart gdm3
```

After logging in, you should be on X and Wayland should be disabled. To confirm, you can go check the system info by hitting the "window" key and searching for **about**:
![System About - Ubuntu with Gnome and X11](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204/system_info.png)
