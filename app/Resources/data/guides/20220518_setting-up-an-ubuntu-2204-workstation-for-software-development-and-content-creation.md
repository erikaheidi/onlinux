---
title: Setting Up an Ubuntu 22.04 workstation for Software Development and Content Creation
published: false
description: In this guide I share how I set up my Linux Ubuntu 22.04 workstation for software development and content creation.
tags: ubuntu, guides, software, setup
cover_image: https://dev-to-uploads.s3.amazonaws.com/uploads/articles/eviog1crz5jh764sibkt.png
---

Ubuntu 22.04 a.k.a. Jammy Jellyfish is the latest LTS (long-term support) Ubuntu release, which means it will continue being actively updated and supported until the next LTS release in two years.

This release brings some exciting improvements, such as the new screenshot tool and custom theme accents. Upgrading is also important to make sure you are getting the most up-to-date packages and applications for your system.

In this step-by-step practical guide I will share how I set up my Ubuntu 22.04 workstation for software development and content creation.

If you need help installing Ubuntu 22.04 on your machine, check out [this step by step guide on how to make a fresh Ubuntu install with full disk encryption](https://onlinux.systems/guides/20220502_how-to-install-and-set-up-ubuntu-2204-as-main-system-on-a-desktop-computer).


## Basic Setup

First things first. Start by updating the package manager cache:

```shell
sudo apt update
```

To keep things organized, I like to create a directory in my home folder to store AppImage applications. We'll download some of them later.

```shell
mkdir ~/Apps
```

Make sure you have your SSH keys set up. If you don't have backup keys to restore, follow [this GitHub guide on how to create and set up a new SSH key](https://docs.github.com/en/authentication/connecting-to-github-with-ssh/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent).

If you're restoring existing SSH keys, you can follow the next section.

### Restoring SSH keys (if your keys are backed up)
If you haven't done it yet, copy the SSH keypair you have registered with your code host of choice to a `.ssh` folder in your home directory. If you have your keys in a removable storage, you should make sure to copy them over and set correct permissions, otherwise they won't work and you won't be able to push code to GitHub / GitLab / etc.

The following command is an **example** of how to copy a `.ssh` folder from a removable media device into your home dir:

```shell
cp -R /media/user/HD-PCTU3/backups/.ssh .
```
Then, change the permissions of the SSH directory and key files:

```shell
chmod 700 ~/.ssh
chmod 644 ~/.ssh/id_ed25519.pub
chmod 600 ~/.ssh/id_ed25519
```

Finally, add the key to the SSH agent:

```shell
eval "$(ssh-agent -s)"
ssh-add ~/.ssh/id_ed25519
```


## Power up your CLI: Terminator + Oh My ZSH
To keep going with your setup on a much nicer terminal, you will now install [Terminator](https://terminator-gtk3.readthedocs.io/en/latest/) and Oh My Zsh. Terminator is a terminal emulator that allows you to arrange multiple terminals in a grid-like structure. [Oh My Zsh](https://ohmyz.sh/) is a layer of configurations on top of zsh that makes your terminal look super cool, with several themes and plugins to improve your productivity.

Start by installing Terminator and Zsh:

```shell
sudo apt install terminator zsh
```

Next, install Oh my Zsh:

```shell
sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)"
```
When prompted, confirm that you want to set Zsh as your default shell. This will require you to provide your `sudo` password.

In order to use some of the best themes, you'll need to first install [Powerline fonts](https://github.com/powerline/fonts) on your system. I prefer to run the install script directly from their official repository like so:

```shell
git clone https://github.com/powerline/fonts.git --depth=1
cd fonts
./install.sh
cd ..
rm -rf fonts
```

Next, it's time to configure Oh my Zsh. Open `.zshrc` and look for the `ZSH_THEME` variable:

```shell
nano ~/.zshrc
```

There are [several themes](https://github.com/ohmyzsh/ohmyzsh/wiki/Themes), but my favorite is **agnoster**:

```shell
# Set name of the theme to load --- if set to "random", it will
# load a random theme each time oh-my-zsh is loaded, in which case,
# to know which specific one was loaded, run: echo $RANDOM_THEME
# See https://github.com/ohmyzsh/ohmyzsh/wiki/Themes
ZSH_THEME="agnoster"

```
After changing `ZSH_THEME` to your theme of choice, save the file and exit.

_With `nano`, you can save and exit by typing `CTRL+X` than confirming with `y` and `ENTER`._

### Setting Up Terminator

Next, we'll set up Terminator. This is how it should look now when you open it (type `Windows` then search for `terminator` to find it in your system):

![Terminator before configuration](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/lyakjkkcthfwe3jjxg5n.png)

You'll notice that the prompt is already changed to use Oh My Zsh, but it is broken. This is because we still need to configure the terminal program (in this case, Terminator) to use a proper Powerline font, a requirement for using the `agnoster` theme. This brings icons and other niceties to the terminal.

Right-click and access the menu **Preferences**, then go to the **Profiles** tab and select the **default** profile on the left sidebar. Uncheck the  option **Use system fixed font**. To disable that ~~annoying~~ red top title bar, uncheck "Show titlebar".

Change the font to any of the Powerline fonts (you can search for "mono powerline" to facilitate choosing your favorite). I chose **Noto mono for powerline bold**, size **16**.

Still on the Terminator profile preferences, I set the background to "Transparent background" at **80%** and the Color scheme to "Solarized". Here's the final result:

![Finished terminal configuration - Terminator + Zsh + Oh my Zsh with Powerline fonts](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/6sar9c1yeydhh9u5i9zy.png)

## Git
Git should already be installed on your system. To confirm, type `git --version` on your terminal, and you should see something like this:

```shell
git version 2.34.1
```

If for some reason you don't have Git installed, you can do so with the following command:

```shell
sudo apt install git
```


### Git Config
With everything set, you should now configure your username and email within Git:

```shell
git config --global user.name "Your Name"
git config --global user.email your@email.com
```

## Software Development
Development environments and other configurations related to software development.

### PHP (CLI only) + Composer

I typically have PHP-cli on my systems because it's just a lot easier to run small scripts directly with it. Anything that requires extra dependencies runs on Docker. I also find it useful to have Composer to facilitate bootstrapping new projects with `composer create-project`. Usually after the initial project bootstrap I migrate to using Docker.

To install PHP-cli (8.1+), run:
```shell
sudo apt install php-cli
```
For Composer, you should follow [the official instructions](https://getcomposer.org/download/) since the hash checking portion of the installation script will change often.

## Docker + Docker Compose
Next, install the Docker Engine and Docker Compose. The following commands are based on the [official instructions from the Docker documentation](https://docs.docker.com/engine/install/ubuntu/#install-using-the-repository).

Download Docker's deb repository key:

```shell
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
```

Add Docker's deb repository:

```shell
 echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
```

Install Docker and Docker Compose:

```shell
sudo apt update

sudo apt-get install docker-ce docker-ce-cli containerd.io docker-compose-plugin
```

You can check that it was successfully installed with:

```shell
docker --version
Docker version 20.10.16, build aa7e414
```
Don't forget to add your user to the `docker` group so that you can run Docker without sudo.

```shell
sudo usermod -aG docker $USER
```

You may need to log out and log in again for this change to take effect.

## IDEs

Next, it's time to install your IDE of choice. This is more personal and depends a lot on which programming language you work with, what you are studying, etc.

Generally speaking, [VSCode](https://code.visualstudio.com) is an excellent choice for all languages, but if you are willing to invest in a paid IDE you will be very happy with any flavor of [JetBrains](https://www.jetbrains.com/).

### Installing VSCode

VSCode offers a `.deb` file for Ubuntu/Debian users and that is my preferred way to install it. Once you download the file from [the VSCode downloads page](https://code.visualstudio.com/download), you can install it with:

```shell
sudo dpkg -i ~/Downloads/code_1.67.1-1651841865_amd64.deb
```

Replace the name of the file with the version you downloaded. After installation, you can type `window` and search for "vscode" to find it in your system.

_VSCode with Material Theme (Pale Night)_
![VSCode with Material Theme](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/i209px52q88hf019l27u.png)

### Installing PHPStorm

[PHPStorm](https://www.jetbrains.com/phpstorm/), as well as other editors from JetBrains, is offered as AppImage. I do not use Snap, so that's my method of choice for installing it on my system.

Once you download the appropriate package from [the PHPStorm download page](https://www.jetbrains.com/phpstorm/download/#section=linux), you should unpack it somewhere in your home folder (I'm using `~/Apps` for AppImages).

```shell
mv PhpStorm-2022.1.1.tar.gz ~/Apps
cd ~/Apps
tar -zxvf PhpStorm-2022.1.1.tar.gz
rm -rfv PhpStorm-2022.1.1.tar.gz
```

Then, run the executable script on `bin/phpstorm.sh`:

```shell
cd PhpStorm-221.5591.58/
./bin/phpstorm.sh
``` 

You'll be greeted by a configuration wizard, and you will be asked to choose between activating an existing account or starting a 30-day trial.

Once you get to the main window, go to **Tools -> Create command line launcher** to create a PHPStorm executable on `/usr/bin/phpstorm`. This executable allows you to open files on PHPStorm directly from your CLI, and also to access PHPStorm from shortcuts on Ubuntu.

_PHPStorm with Material Theme (Synth Wave '84)_
![PHPStorm with Material Theme](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/lao4fgeuxhg10yvm20gb.png)

### Software for Content Creation on Linux

I big part of my work is to create content, using different media and content types. I will list here the software I like to have installed for dealing with image editing, illustration, video editing, audio editing, video and audio capture, live streaming...

I won't cover these in detail, but the installation method won't vary from the 3 methods we've already seen in this guide (`apt`, downloaded `.deb` with `dpkg`, or downloaded AppImage).

- **Live streaming and video recording**
    - [OBS Studio](https://obsproject.com/)
- **Simple video/audio conversion in the command line**
    - [ffmpeg](https://ffmpeg.org/)
- **Video Editing**
    - [OpenShot](https://www.openshot.org/)
- **Vectorized illustration, logos**
    - [Inkscape](https://inkscape.org/)
- **"Free style" illustration**
    - [MyPaint](http://mypaint.org/)
- **Audio recording and editing**
    - [Audacity](https://www.audacityteam.org/)

## Additional Resources

A few related tutorials that might interest you:

{% guide 20220502_how-to-install-and-set-up-ubuntu-2204-as-main-system-on-a-desktop-computer %}

{% guide 20220406_how-to-edit-videos-with-openshot-on-ubuntu-linux %}