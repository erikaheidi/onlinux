---
title: Setting Up a Fresh Ubuntu 21.04 Desktop as Personal Computer
author_twitter: erikaheidi
published: true
description: I've been an Ubuntu user for a long time, it is a system where I feel very comfortable so that means it also makes me more productive. I decided to try the newest release, the brand new 21.04 a.k.a Hirsute Hippo. In this post, I share all my setup process.
tags: linux, ubuntu, setup, tutorial
cover_image: https://dev-to-uploads.s3.amazonaws.com/uploads/articles/o955obpis85rpsvhpclv.png
canonical_url: https://eheidi.dev/blog/setting-up-a-fresh-ubuntu-21-04-desktop-as-personal-computer-41i3
---

I recently got a [brand new personal laptop](https://twitter.com/erikaheidi/status/1387454418224828416) (hooray bonus!) and got a suggestion for a blog post about setting up my Ubuntu for personal use. It's been a while since I shared these types of posts, so I thought it would be fun to write about my new setup.

I've been an Ubuntu user for a long time, it is a system where I feel very comfortable so that means it also makes me more productive. I decided to try the newest release, the brand new 21.04 a.k.a _Hirsute Hippo_. In this post, I share all my setup process.

![Hirsute Hippo](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/iunpe6c9pz9df30ztpy6.png)

## Getting Started
Well, the first step is to get the system all installed and set up.

As I mentioned previously, I chose [the newest 21.04 release of Ubuntu](https://discourse.ubuntu.com/t/hirsute-hippo-release-notes/19221?_ga=2.160269758.2020671091.1619944592-790858347.1619944592), also known as Hirsute Hippo. You might want to go with the LTS (20.04) version if you don't plan on upgrading / reinstalling your system before 22.04 is out (the next LTS). The advantage of the 21.04 version is because it's already one year newer than the LTS, so the software that it comes with and the default apt packages for the distro are already bleeding edge, so you can install most things via `apt` without worrying that it's all outdated.

### Installation Remarks
Because this is a new laptop, I didn't need to do any backup, but if you are going to do this on your existing system please don't forget about it :)

I always choose [full disk encryption](https://ubuntu.com/core/docs/uc20/full-disk-encryption) when installing Ubuntu, this is an option that will show up when choosing installation type and partitions. This adds extra security to your system, just be sure you keep your decryption key safe otherwise you will lose access to your entire system!

## Priority Installs
Depending on which Ubuntu version you're installing, you may need to update the system right after installation to make sure you have the most updated version of the software you're going to use. You will get a notification from Ubuntu if updates are available for your system as soon as you log in.

Now it's time open the terminal to install a few basic packages right away:

```shell
sudo apt update
sudo apt install vim git unzip curl ffmpeg
```
Then, onto more interesting things.

### Terminator and Oh-My-Zsh
Next, I like to set up my terminal and shell. I've been using [Terminator](https://terminator-gtk3.readthedocs.io/en/latest/) for years, I really like to be able to split the screen in multiple ways and Terminator is a lot easier to use than tmux **for me**. I'm also a big fan of [oh-my-zsh](https://ohmyz.sh/) and have been using it for many years.

So the first thing is to install `zsh` and `terminator`.

```shell
sudo apt install zsh terminator
```

Then, you can run the Oh-my-Zsh installation script, which will also set `zsh` as your default shell:

```shell
$ sh -c "$(curl -fsSL https://raw.github.com/ohmyzsh/ohmyzsh/master/tools/install.sh)"
```

The theme I like is called `agnoster`, and to use that theme you'll need to install [Powerline fonts](https://github.com/powerline/fonts). To install these, you'll need to clone their repo and run the install script:

```shell
cd /tmp
git clone https://github.com/powerline/fonts.git
cd fonts/
./install.sh
```

Then, you can edit your `.zshrc` to change to the agnoster theme:

```command
vim ~/.zshrc
```

```shell
# Set name of the theme to load --- if set to "random", it will
# load a random theme each time oh-my-zsh is loaded, in which case,
# to know which specific one was loaded, run: echo $RANDOM_THEME
# See https://github.com/ohmyzsh/ohmyzsh/wiki/Themes
ZSH_THEME="agnoster"
```

Don't forget to save the file (with `vim`,  type `ESC` then `:wq` to save).

You can now close the old terminal and open `terminator`! You'll need to change the font to one of the Powerline patched fonts you just installed, otherwise the prompt won't show up correctly.

To customize your Terminator appearance, right-click and go to `Preferences` -> `Profiles` and unmark the checkbox that says `Use the system fixed width font`.  Then choose the font (tip: search for "powerline" to show only the powerline-compatible fonts).

![Screenshot of Terminator settings](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/ly9netcg9jt4334b47om.png)

While you're at it, you can also adjust background (I like to set up transparency to 85%).

This is the final result:

![Terminator + Oh-my-zsh agnoster theme](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/fsz1mk2v8tt2t2f5sc3r.png)

## SSH Setup
It is a good idea to set up a new SSH key if you are setting up a fresh new system. [This GitHub Doc Page](https://docs.github.com/en/github/authenticating-to-github/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent) contains detailed instructions on how to set a new SSH key with the Ed25519 algorithm and add it to the SSH-agent.

If you are using GitHub, it's also a good moment to add the new key to your account (go to `Settings` -> `SSH and GPG Keys`).

## Git Setup
To use Git from the command line, you'll need to configure your Git name and email address in order to do commits and pushes.

```shell
git config --global user.name "Your Name"
git config --global user.email "email@example.com"
```

## Development Setup
Nowadays I typically  have only a basic `php-cli` installed on my system, and I use Docker + Docker Compose to run my full development environments. [This tutorial from my friend Brian explains in detail how to get Docker installed on Ubuntu 20.04](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04).

With Docker installed you can follow [my tutorial on How to Install Docker Compose](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04) to get Docker Compose also set up.

If you'd like a basic PHP env for the command-line as well, you can install `php-cli` and a few basic extensions from your terminal:

```shell
sudo apt install php-cli php-mbstring php-gd php-curl
```


### Setting Up Jetbrains PhpStorm (IDE)

I've been using [Jetbrains PhpStorm](https://www.jetbrains.com/phpstorm/) for many years, it is my favorite IDE (all from Jetbrains actually, since I've used RubyMine in the past too). Downloads are available in AppImage format, which is really helpful.

You can [download PhpStorm](https://www.jetbrains.com/phpstorm/download/#section=linux) as a trial too, if you'd like to try it out before buying a license. Once you've downloaded the package, just unpack it to somewhere in your home dir and run it with:

```shell
./PhpStorm-211.7142.44/bin/phpstorm.sh
```

You can now install a desktop entry to PhpStorm by going to `Tools` -> `Create Desktop Entry`.

Now the fun starts, with theme choosing etc.
![Installing plugins on PHPStorm](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/oacovdugy055gl6xqaqe.png)

The editor font size is always too small for me, so I like to adjust it to a bigger size. I've been using JetBrains mono size `20`, and I also like to enable ligatures, I think it gives a nice look to some portions of code.

![Adjusting font size](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/zuqxroo7s5w5rz08hp4e.png)

## Other Software Installs
Because this is a personal laptop and I am a person of many hobbies, I will have a great mix of software here including video editing, graphics design, 3D design, and development (IDEs) software.

Nowadays, most desktop applications for Ubuntu/Debian are being distributed as AppImage files, which are quite easy to work with. I usually create an `Apps` folder in my home dir to save these applications.

```shell
mkdir ~/Apps
```

Some of them still use more traditional distribution methods, like Gimp which can be installed via `apt`.

So here is a list of other applications that I got installed right away, organized by category:

### Graphic Design
- [Inkscape](https://inkscape.org/release/1.0.2/platforms/) - Vector Graphics. Available as AppImage.
- [MyPaint](http://mypaint.org/downloads/) - Drawing and Painting. Available as AppImage.
- [Gimp](https://www.gimp.org/) - Graphic Design, photo manipulation. Installed via `apt`.

### Video and Streaming
- [Peek](https://github.com/phw/peek) - Simple screen recording, records in gif or mp4. Installed via `apt`.
- [OBS Studio](https://obsproject.com/download) - Screen recording and streaming. Installed via `apt`
- [OpenShot](https://www.openshot.org/download/) - Video Edition. Available as AppImage.

### Audio
- [Audacity](https://www.audacityteam.org/download/) - Audio recording. Installed via `apt`.
- [Spotify](https://www.spotify.com/us/download/linux/) - On-demand music, installed via `snap`.
- [LMMS](https://lmms.io/download#linux) - Music making (loops / midi etc). Available as AppImage.

### 3D Design & Printing
- [FreeCAD](https://www.freecadweb.org/downloads.php) - 3D Design. Available as AppImage.
- [OpenScad](https://openscad.org/downloads.html) - Programatic 3D Design. Installed via `apt`.
- [Blender](https://www.blender.org/download/) - 3D Design and modeling. Available as tar file that you just need to unpack to your home folder.
- [Prusa Slicer](https://www.prusa3d.com/prusaslicer/) - 3D Printing Software for Slicing Models. Available as AppImage.

You can download all the AppImages and then do the following:

```shell
mv ~/Downloads/*.AppImage ~/Apps
chmod +x ~/Apps/*.AppImage
```

## UPDATE: Disabling Wayland on Ubuntu 21.04
_updated on May 7_

Yesterday I was just about to record some screencasts with OBS when I noticed there was something strange going on. The screen capture was coming all black, only the cursor would show up; not only that, but also the window capture was not working at all, not even listing the currently open windows.

I also tried Peek, another screen recording application, to the same results.

I've been tracking down the problem since yesterday and finally found the reason and the solution. [Wayland](https://en.wikipedia.org/wiki/Wayland_(display_server_protocol)), a new display server protocol, is now enabled by default to replace X11 on Ubuntu 21.04. I didn't know anything about this, but after [some Googling](https://obsproject.com/forum/threads/ubuntu-20-04-black-screen-issue-not-even-cursor-for-window-capture.135087/) I found out other people having similar issues with OBS on Ubuntu and finally I was able to fix it!

To disable Wayland on Ubuntu 21.04, go to your terminal and open the file `/etc/gdm3/custom.conf` using your command-line editor of choice:

```shell
sudo vim /etc/gdm3/custom.conf
```
Look for the line saying `#WaylandEnable=false` and uncomment it by removing the `#` character from the beginning of the line. Save and close the file - with `vim`, you can do that by typing `ESC` then `wq` and `ENTER`.

Then you just need to restart your window manager with:

```shell
sudo service gdm3 restart
```

You should now be all set!

## Conclusion
Setting up a new system is a neverending task, but I am pretty happy now with the current state of my new laptop :) Can't wait to try out some of this software with this machine, since it's a big upgrade from my previous one.

Anything important I missed? Tell me in the comments (:

![Current State](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/7sdhhyi6uvpcl0lzr99t.png)