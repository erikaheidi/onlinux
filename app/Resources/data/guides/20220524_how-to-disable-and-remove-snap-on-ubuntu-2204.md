---
title: How to Disable Snap on Ubuntu 22.04
author_twitter: erikaheidi
description: This guide demonstrates how to disable and remove Snap on Ubuntu 22.04.
tags: guides, ubuntu, snap
cover_image: https://onlinux.ams3.digitaloceanspaces.com/ubuntu2204/ubuntu2204_disable_snap.png
---

## Introduction

[Snap](https://snapcraft.io/) is Linux package manager (such as `apt`) with its own package ecosystem and app store, and it's being pushed as new default on the latest Ubuntu release (22.04 _Jammy Jellyfish_). On Ubuntu 22.04, a fresh installation brings Firefox installed as Snap, and `apt` installs snaps when they're available. 
This wouldn't be such a problem if Snaps were as stable as `.deb` packages. In this specific case of Firefox as snap, imagine that you have just installed the system and you can't open your browser because Snap is broken. You can't google your issue and your error messages directly, because the browser is broken. This happened to me on all 5 installations I did of Ubuntu 22.04 in the past few weeks.

I personally believe pushing Snap to users by default is a bad decision from Ubuntu, since there are known stability issues (like it getting broken right after a fresh install, which happened to me) that simply don't happen with traditional .deb packages. That's why I decided to remove Snap (all apps and snapd) altogether from my system. After that I was able to install Firefox from the Mozilla team PPA, and things are running smoothly since then (it's been a couple of weeks).

In this guide, I share how I disabled Snap and purged it from my Ubuntu 22.04 system. That doesn't mean I hate it, I just  don't want to deal with Snap now. I believe things should improve and maybe we'll see a more stable platform in the next LTS release. For now, my choice is to remove it.

**Disclaimer**: Do this at your own risk. Although the procedure described here won't break your system, you may face limitations in the future (e.g: if a software is only available as Snap, or if you wanted to enable LivePatch).

### Requirements

This guide was developed and tested within the following environment:

- Linux Ubuntu 22.04

## Step 1: Disable Snap

Start by disabling the Snap services within Sysctl:

```shell
sudo systemctl disable snapd.service
sudo systemctl disable snapd.socket
sudo systemctl disable snapd.seeded.service
```

## 2. Remove Snap packages

Next, list your Snap packages to see what is currently installed. You should see Firefox as one of the snaps.

```shell
sudo snap list
```

Then, uninstall the packages. Because some packages depend on each other and there doesn't seem to be a way to automate the correct order in which they should be removed (also, poor error messages) it is better to remove each one individually. This way you will be notified if a package is a dependency and must be removed last.

```shell
sudo snap remove firefox
sudo snap remove snap-store
(...)
```

Repeat this with all the snap packages in the `snap list` list.

## 3. Remove Snap

Next, fully remove Snap from your system with:

```shell
sudo apt autoremove --purge snapd
```
Finally, clear any leftover cache from Snap:

```shell
sudo rm -rf /var/cache/snapd/
rm -rf ~/snap
```

Snap should now be completely removed from your system.

## Next Steps

With Snap removed, you'll need to install Firefox from a PPA. Because `apt` will still try to install the Snap version of Firefox, you will run into an error. There's a trick to overcome that issue: [pinning](https://help.ubuntu.com/community/PinningHowto) Firefox with Apt.

Create a new file within Apt's preferences dir:

```shell
sudo nano /etc/apt/preferences.d/firefox-no-snap
```

Include the following content in the newly created file:

```
Package: firefox*
Pin: release o=Ubuntu*
Pin-Priority: -1
```

Save and exit. With `nano`, you can do that by typing `CTRL`+`X`, then `Y` and `ENTER` to confirm.

You can now add Mozilla's PPA with:

```shell
sudo add-apt-repository ppa:mozillateam/ppa
```

When running the `add-apt-repository` command, the update happens now automatically, so you don't need to run `sudo apt update` anymore.

Install Firefox with:

```shell
sudo apt install firefox
```

Voilá, you should now have a Snap-free Ubuntu with Firefox installed.