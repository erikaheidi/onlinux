---
title: How to install and set up Ubuntu 22.04 as main system on a desktop computer
description: Full installation guide for Ubuntu 22.04 Desktop edition, including step-by-step screenshots of the whole process.
tags: guides, ubuntu, installation
cover_image: https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/install%20ubuntu%2022.png
---

## Introduction

In order to follow this guide, you'll need access to a computer or laptop where you can install Ubuntu 22.04 from scratch.

You can follow this guide in two ways:

- Install Ubuntu 22.04 **as the main operating system** on your computer (recommended)
  - This is the recommended option to have the best experience with Ubuntu, but it will erase all data in your hard disk. You can also try Ubuntu from the startup disk before installing it.
- Install Ubuntu 22.04 **on a virtual machine** with VirtualBox
  - This option will require more machine power, since you'll have to share RAM memory with the VM (about 4GB recommended). If you want to test Ubuntu or just learn how to install it, you can install it on a virtual machine. In this case, first [install VirtualBox](https://www.virtualbox.org/wiki/Downloads) on your main system. 

In both cases, you should have an active connection to the internet so that you can download updates and 3rd party software such as graphics cards drivers.

### Requirements for installing Ubuntu as main operating system

If you're installing Ubuntu as your main operating system, before moving ahead you'll need to create an [Ubuntu 22.04](https://releases.ubuntu.com/22.04/) startup disk. You can also use the startup disk to try out Ubuntu before installing it.

You can follow our guide on how to create such a disk using another Ubuntu system:

{% guide 20220502_how-to-create-a-ubuntu-2204-startup-disk-on-ubuntu-systems %}

Somewhere in the beginning of the installation process, you will be prompted to connect to a wi-fi network. Follow the instructions to set that up and allow internet access from the installation program.

Before moving ahead you should **make sure** you have backed up any personal data to a removable disk, a remote / cloud driver, or another computer. Don't forget to save your `.ssh` directory containing your SSH keys, otherwise you will lose access to servers and services where your current key is registered.

### Requirements for installing Ubuntu on a virtual machine

If you're installing Ubuntu on a virtual machine, make sure you have an [up-to-date version of VirtualBox](ttps://www.virtualbox.org/wiki/Downloads) installed on your main operating system. You won't need a startup disk. Just create a new Linux VM (about 4GB of RAM should be enough) and use the Ubuntu ISO directly to boot your VM, then skip to step 2.

## Step 1: Boot from startup disk
Depending on your computer and the setup program it runs, you will have to press a special key to either choose the boot device directly or access the BIOS setup program and adjust your settings in order to boot from your new Ubuntu boot disk. In most computers, this key will be `F12`.

With my Lenovo Thinkpad laptop, I need to press `F12` as soon as the computer beeps after rebooting, and this will let me choose which device to boot. My old, generic USB stick is recognized as "USB HDD:VendorCo ProductCode".

![Choosing the boot disk on a Lenovo Thinkpad Carbon](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/lenovo_boot.jpg)

When the computer successfully starts up the boot program from your Ubuntu disk, you'll then see the **Grub boot screen**.

![Starting the Ubuntu installation](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step1_grub.png)

Choose "Try or install Ubuntu" to proceed.

## Step 2: Start the installation program

You'll see a screen like the following:

![Step 2](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step2_install.png)

You may want to try Ubuntu before installing it. In that case, use the option on the left. To install Ubuntu, click on "Install Ubuntu".

## Step 3: Choose the language and installation options
The first screen will be to choose your keyboard layout and language.
![Step 3](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step3_lang.png)

Once you confirm that, you'll be taken to a screen where you'll have a few options regarding updates. Leave "Normal installation" checked, and check both options in the "Other options" area to make sure your installation is able to download the latest updates and also third-party drivers whenever necessary.
![Step 4](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step4_options.png)

Click on "Continue" to move on.

## Step 3: Customize disk options

For improved security, I strongly advise anyone installing Ubuntu these days to make use of their full disk encryption feature. When you get to the "Installation Type" screen, select `Advanced Features`.

![Step 5](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step5_disks.png)

On the popup that will appear, choose `Erase disk and use ZFS`, then check the `Encrypt the new Ubuntu installation for security` option.

![Step 6](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step6_encrypt.png)

Once you confirm that, you'll be asked to choose a security key. You will be prompted to provide this security key every time you restart your computer, and if you lose this key you will be 100% locked out. Make sure to choose a good one!

![Step 7](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step7_securitykey.png)

### Creating a recovery key (optional)
You can create a recovery key by selecting `Enable recovery key`. This key will be automatically generated and temporarily stored in `/home/ubuntu/recovery.key`. This file will be gone once you restart the system, so you should copy it to a removable disk and then save it to a secure location - don't leave it on your usb stick :)


### Confirming disk changes
Confirm the disk options to proceed with the installation.

![Step 8](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step8_confirm.png)

## Step 4: Choose the timezone
Next, choose your timezone. The installation program will try to auto-detect your location based on your current network connection.

![Step 9](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step9_timezone.png)

Click on "Continue" to move on.

## Step 5: Set up main user and machine name

Next, you will be asked to set up the first machine user, who will have admin permissions. You'll also be asked to give a name to this machine.

![Step 10](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step10_user.png)

## Step 6: Wait until the installation is finished and restart your computer

At this point, you'll just have to wait until the installation is finished.
![Step 11](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step11_wait.png)
When the installation is finished, you will be prompted to restart your computer.  

![Step 12](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step12_finish.png)

Confirm and wait until you are prompted again to **remove the USB stick**. After that, your computer will restart.

![Step 13](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step13_restart.png)

After the computer restarts, you should be greeted by the Grub boot screen again. Select the first option to enter your freshly installed Ubuntu 22.04 system.

## Step 7: Unlock the disk to access your fresh Ubuntu system
If you followed all steps in this guide and chose full disk encryption, you will be prompted to provide your secure key now. Type the key and hit `ENTER`.

![Step 14](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step14_unlockdisk.png)

You should see a message indicating that the disk was successfully unencrypted.

![Step 15](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step15_success.png)

After that, your Ubuntu system will be mounted and you will be greeted with the log in screen. Provide your login and password to access your new Ubuntu 22.04 system.

![Step 16](https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204_install/step16_login.png)

Your system should now be fully functional.

## Step 8: Customize your Ubuntu 22.04 Appearance

With the main system installed, you can now customize its appearance to make it look _just right_ for your taste.
In this section I will share the customization I made for my own system. Feel free to explore other options.

Go to `Settings -> Appearance` to customize the appearance of your new Ubuntu 22.04.

### Style
Start by choosing your preferred style. This will change the highlight color in your entire system. I chose "Purple" because it's my favorite color :)

![Customizing Ubuntu 22.04 appearance](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/li30ycip3oz2y7tl2o2l.png)

### Desktop Icons
This will change where and how your desktop icons will appear. I didn't make any changes in this section.

### Dock
The new Gnome version that comes with Ubuntu 22.04 has a new way to set up your Dock, so that it resembles the Mac OS style. I really like how sleek it looks, so that's what I chose for my setup, with addition to auto-hiding the Dock so that it only shows up when I hover my mouse at the bottom of the screen.

For that, first enable **Auto-hide the dock**, leaving "Panel mode" unchecked. You can increase a bit the icon size if you want - I set mine to **56**. Then set **Position on screen** to **Bottom**. I didn't like the disks showing up at the Dock, so I went to **Configure dock behavior** and unchecked the **Show volumes and devices** option.

This is how my Ubuntu looks like now:

![Ubuntu 22.04 Jammy Jellyfish](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/g4i2jhsvfxg9h4gg4lli.png)

_**Tip:** to add an app to the Dock, open the application, then right-click on the app icon on the Dock and click on "Add to favorites". This works with most applications._

## Troubleshooting Issues with Snap on Ubuntu 22.04

After a few hours using my newly installed system normally and installing a few new packages, I run into an issue with AppArmor that denied access to snap-installed apps; this might seem trivial at first, but the new Ubuntu 22.04 uses Snap as the default source for new package installations (even when from the command line with `apt install`). The Mozilla Firefox installation that comes with Ubuntu 22.04 is snap-based. So all of a sudden I was unable to open Firefox, the Ubuntu Software Center and the Snap store.

If you run into issues where Firefox doesn't open anymore, you can check your `dmesg` to see what comes up as error. I got quite a few AppArmor denied log messages like those:

```
[170080.035628] audit: type=1400 audit(1651402213.755:89): apparmor="DENIED" operation="open" profile="snap.firefox.firefox" name="/etc/fstab" pid=6733 comm="firefox" requested_mask="r" denied_mask="r" fsuid=1000 ouid=0
[170080.039802] audit: type=1400 audit(1651402213.759:90): apparmor="DENIED" operation="open" profile="snap.firefox.firefox" name="/run/mount/utab" pid=6733 comm="firefox" requested_mask="r" denied_mask="r" fsuid=1000 ouid=0
```

I personally believe pushing Snap to users by default is a bad decision from Ubuntu, since there are known stability issues (like this one, on a fresh install) that simply don't happen with traditional .deb packages. That's why I decided to remove Snap (all apps and snapd) altogether from my system. In case you decide to follow the same route, you can follow [this excellent guide](https://haydenjames.io/remove-snap-ubuntu-22-04-lts/) from Hayden James.

## Conclusion

The new Ubuntu 22.04 James Jellyfish comes with lots of new software and improvements, a beautiful UI based on Gnome 42 that includes a MacOS-style dock, and great new tools. 

Although I did run into issues with Snap, I'm still very satisfied with this version so far since it fixed a few glitches and bugs I had with Ubuntu 21.10, in addition to bringing in some really nice new tools, such as the screenshot / printscreen built-in app that allows you to take nicely rounded window screenshots and also record screencasts.

Overall, there's always one thing or another with any operating system that you choose; I am glad that the Linux ecosystem in general gives us enough freedom to change what we don't like. So far, I'm sticking with Ubuntu.