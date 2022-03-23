---
title: How to Set Up Elgato's Stream Deck on Ubuntu Linux 21.10
published: true
description: In this post I'll share how I got my Elgato StreamDeck set up on Ubuntu 21.10 and how I use it to switch windows and run commands on my system
tags: tutorial, streaming, livecoding, linux
cover_image: https://dev-to-uploads.s3.amazonaws.com/uploads/articles/2w7n17f0v3ubqogpbn85.png
---

Popular with streamers everywhere in the world, the [Elgato Stream Deck](https://www.elgato.com/en/stream-deck) is a customizable device that works as an external input, and can be configured to trigger commands and shortcuts at the press of a button. And although the device is super popular with live streamers, it is also very useful for anyone who works with several different applications on a desktop setting, since it greatly facilitates switching windows and running commands on your computer.

While this looks like a very useful device, the official website says the device is only supported on MacOS and Windows systems. A bummer, for sure! That's what kept me from buying one for quite some time.

Turns out I got a [really nice package from the GitHub Stars program](https://twitter.com/erikaheidi/status/1439919049136353284) including a 15-button Stream Deck. I have heard rumors that it was possible to run it on Linux, and that's what brought me to this article! As you can see from the video, I got it working here:

{% tweet 1466024623108153347 %}

In this post I'll share how I set up my Stream Deck on an **Ubuntu 21.10** system and which commands / tools I configured so far.

_Note: this was tested on Ubuntu 21.04 and Ubuntu 21.10, but it might work with other versions as well._

## Step 1: Install `streamdeck-ui`

The [streamdeck-ui program](https://timothycrosley.github.io/streamdeck-ui/) provides a Linux-compatible graphical user interface to control your Stream Deck, running on top of the [Python Stream Deck Library](https://github.com/abcminiuser/python-elgato-streamdeck#python-elgato-stream-deck-library). With this software you can set up each individual key by providing an icon, a command or a shortcut, and an optional title. It supports multiple pages, which means you are not limited to the physical slots in the device. As long as you use one or more keys to paginate through your icon pages, you can have as many buttons as you need.

![Screenshot of streamdeck-ui already configured](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/bgv7t5a6brb3920n0nus.png)

To get started, install the dependencies with the following command:

```shell
sudo apt install python3-pip libhidapi-libusb0 libxcb-xinerama0
```

Then, you'll need to set up special permissions that will allow you to use the application with a regular system user.

```shell
sudoedit /etc/udev/rules.d/70-streamdeck.rules
```
Paste the following content into this file:

```
SUBSYSTEM=="usb", ATTRS{idVendor}=="0fd9", ATTRS{idProduct}=="0060", TAG+="uaccess"
SUBSYSTEM=="usb", ATTRS{idVendor}=="0fd9", ATTRS{idProduct}=="0063", TAG+="uaccess"
SUBSYSTEM=="usb", ATTRS{idVendor}=="0fd9", ATTRS{idProduct}=="006c", TAG+="uaccess"
SUBSYSTEM=="usb", ATTRS{idVendor}=="0fd9", ATTRS{idProduct}=="006d", TAG+="uaccess"
```

Save and close the file. Then, reload udev rules with:

```shell
sudo udevadm control --reload-rules
```

The installation instructions advise you to unplug and plug again your device before continuing. Once you do that, run the following command to install `streamdeck-ui`:

```shell
pip3 install --user streamdeck_ui
```

Next, you'll need to make sure you have `$HOME/.local/bin` in your `$PATH`. If you are using regular bash, you should have a `.bashrc` file where your `$PATH` is defined. If you are using zsh, this should be `.zshrc` instead. For instance, I use zsh and this is how my `$PATH` is defined within my `~/.zshrc`:

```shell
export PATH=$HOME/bin:$HOME/.local/bin:/usr/local/bin:$PATH
```

After updating your $PATH, you can run `streamdeck-ui` from your terminal in background mode with:

```shell
streamdeck &
```
You should see a screen like that:

![screenshot of streamdeck-ui with blank configuration](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/lz34vsue79s9emw48mip.png)

You can now start setting up each button.

Keep in mind that the program must be running all times for the buttons to be actually functional. It will be visible as a system tray icon on the top right of your screen.

It is recommended that you include the `streamdeck` command in your startup commands - on Ubuntu you can set this on the `Startup Applications Preferences` utility. Hint: type `window` and then `Startup` to find this program on Ubuntu:

![Setting up streamdeck to start on login](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/262plmsqfwxz27bbl4jm.png)

## Setting up command buttons

Setting up a button to run a command is pretty straightforward with streamdeck-ui. Having an icon is optional, since you can also use a simple text (just needs to keep it very short, as it doesn't support linebreaks). To try it out, configure your first button to open your file browser, called as `nautilus`:

![Setting up a command button on streamdeck-ui](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/p098k9m5vy087c00umha.png)

The update is effective immediately, so you can click on the button and you should see a new Nautilus window opening up.

## Setting up shortcut buttons

You can also set up shortcuts to run when you click a button, although this may work inconsistently depending on which application is currently on focus. I use shortcuts to switch scenes on OBS, but then I have to first make sure I focus the OBS window and only then I hit the shortcut button.

To configure shortcuts, use the **Press Keys** text field to define the sequence of keys. To make it work with OBS, you'll first need to configure your OBS shortcuts on **Settings -> Hotkeys** (inside OBS).

![Setting up a shortcut button](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/5qes8areo4eekflmxk51.png)

It is also possible to use commands to change which window is currently on focus, that's what we'll see next.

## Manipulating windows with `xdotool`

To switch between windows, you'll need to install a tool called `xdotool`. On Ubuntu you can install it with the following command:

```shell
sudo apt install xdotool
```

This tool allows you to search for a window by title or class, which is an internal name used by each application. This information can be found with the built-in command `xprop`, which obtains information about active windows on your graphical interface.

To find out which class an application uses for its main window, you can run:

```shell
xprop | grep 'CLASS'
```

Then, you'll have to click on the window you want to obtain more information about. Make sure you click somewhere inside the window, not at the title bar.

For instance, if you want to find out the class name for your Firefox browser, after clicking somewhere in the Firefox window you'll get output like this:

```
WM_CLASS(STRING) = "Navigator", "Firefox"
```

The **second** string in the output is what we need. Once you know the class name for an application, you can move it to active / focused with the following command (in this case, we're activating the Firefox window):

```shell
xdotool search --desktop 0 --class Firefox windowactivate
```

So this is the command you'll have to set up within streamdeck-ui to be able to easily switch applications using your Stream Deck.

Here is a list with my own buttons that you can probably reuse on your setup in case you want similar functionality:

### Firefox
`xdotool search --desktop 0 --class Firefox windowactivate`

### Terminal (Terminator)
```
xdotool search --desktop 0 --class 'Terminator' windowactivate
```

### PhpStorm
```
xdotool search --desktop 0 --class jetbrains-phpstorm windowactivate
```

### OBS
```
xdotool search --desktop 0 --class obs windowactivate
```

### Zoom
```
xdotool search --desktop 0 --class Zoom windowactivate
```

### Slack
```
xdotool search --desktop 0 --class slack windowactivate
```

This is what my current setup looks like:

![Screenshot of streamdeck-ui already configured](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/bgv7t5a6brb3920n0nus.png)

And this is how it looks like on the device:

![photo shows how this configuration looks like on the device itself](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/e03kevdqp6egkpeyrhmz.png)

## Finding icons

You can find default icons from the Ubuntu system and applications spread through several directories on `/usr/share`. Have a look at `/usr/share/icons` and you should find several subdirectories with icons - this might work but it can be difficult to find just the icon you want.

I personally prefer to look for icons on google images, and have set a local folder in my home directory where I keep these icons and reference them from streamdeck-ui. Icons must be in `png` format.

## Conclusion

I hope you have enjoyed this article and that it can help you customize your Stream Deck up to the minimal details, for a perfect setup :) Worth noting that the Stream Deck device is pretty handy for anyone working on a desktop, since it can speed up switching windows and running commands on your system.