---
title: How to create an Ubuntu 22.04 startup disk on Ubuntu systems
description: Learn how to create an Ubuntu 22.04 startup / boot disk using the startup disk creation tool on Ubuntu systems
tags: guides, ubuntu, installation
cover_image: https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/startup%20disk.png
---

## Introduction

In order to install a new Ubuntu system into a computer, you'll need to first create a startup disk containing the Ubuntu installation software. The program that runs on the Ubuntu startup disk also allows you to try out Ubuntu 22.04 before installing it in your computer.

Startup disks are typically created with removable media (also known as regular pen drives / USB sticks). 
There are many ways and different software you can use to create a book disk based on an ISO image. In this guide I'll demonstrate in 3 steps how to create a startup (boot) disk from another Ubuntu system, using the native **Startup Disk Creation** tool that comes with all Ubuntu (desktop) versions. 

Although this guide shows how to create an Ubuntu 22.04 startup disk, you can use the same procedure to create startup disks for other distributions and operating systems. All you'll need is:

- An ISO file with the installation software. In this guide we'll use the [Ubuntu 22.04 desktop image](https://releases.ubuntu.com/22.04/).
- A removable drive such as a USB stick. For Ubuntu, it should be of at least 2GB.
- Physical access to an Ubuntu system where you can plug in your USB stick to create the startup disk. If you want to install Ubuntu on a virtual machine with [VirtualBox](https://www.virtualbox.org/wiki/Downloads), you don't need to create a startup disk; you can boot the virtual machine using the ISO directly.

## 1. Download the Ubuntu 22.04 ISO

The first step is to download the Ubuntu ISO. Go to the [official release page](https://releases.ubuntu.com/22.04/) and download the **desktop version**.

Make sure you have the ISO ready. It should be in the "Downloads" folder after you download it from the Ubuntu website. Also make sure to plug in the USB stick. 

## 2. Open Startup Disk Creation

Open the **Startup Disk Creation** tool by hitting the `Windows` key and then searching for "startup disk". 

The tool is fairly simple, with one top area for the ISO selection and a bottom area for the device selection.

![Ubuntu Disk Creation Tool](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/z020op0mua6surd6hu18.png)

In the top section you should select your preferred ISO file, in this guide I'm using Ubuntu 22.04 "Jammy Jellyfish". 
In the bottom section, select the removable media device you want to use as startup disk.

Make sure you're using the right disk here - typically, Ubuntu will hide your system disks to avoid mistakes, but if you have other removable media connected then you'll need to know which one refers to your USB stick.

_**Be aware that the storage media will be fully erased for the disk creation, so make sure to save any files you have on the device prior to using this tool.**_

Once you confirm both the "Source disk" and the "Disk to use" sections look right, click on the **Make Startup Disk** button and wait until the process is finished.

## 3. Using the Startup / Boot Disk

You'll need to restart your computer in order to test your new Startup disk.

Depending on your computer and the setup program it runs, you will have to press a special key to either choose the boot device directly or access the BIOS setup program and adjust your settings in order to boot from your new Ubuntu boot disk. In most computers, this key will be `F12`.

With my Lenovo Thinkpad laptop, I need to press `F12` as soon as the computer beeps after rebooting, and this will let me choose which device to boot. My old, generic USB stick is recognized as "USB HDD:VendorCo ProductCode".

![Choosing the boot disk on a Lenovo Thinkpad Carbon](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/lenovo_boot.jpg)

When the computer successfully starts up the boot program from your Ubuntu disk, you'll then see the **Grub boot screen**. 

![Starting the Ubuntu installation](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step1_grub.png)

You can then choose "Try or install Ubuntu" to proceed.


