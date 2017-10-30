# Functional testing made easy with PHPUnit & Selenium

[PhpCE 2017](https://2017.phpce.eu/) workshop on November 3, 2017.

This hands-on training will show you how to start writing functional (aka end-to-end) tests for web applications and how 
to execute them in real browsers, leveraging:
 - [Selenium](https://github.com/SeleniumHQ/selenium) - a cross-browser automation framework,
 - [php-webdriver](https://github.com/facebook/php-webdriver) - PHP adapter for Selenium protocol,
 - [PHPUnit](https://github.com/sebastianbergmann/phpunit) testing framework and
 - [Steward](https://github.com/lmc-eu/steward) - test runner.
 
## Prerequisites for participants

Please have your environment prepared **in advance** of the workshop.
 
You can choose either *Docker setup* (recommended and simpler) or if you are unable to do so, you can try a *"classic" setup*.

### Common prerequisites (for both Docker and Classic setup)
- own laptop
- locally installed shell like bash/zsh/etc. (on Windows use [Git BASH](https://git-for-windows.github.io/), cmd.exe is not enough)
- locally installed Git
- locally installed PHP 5.6 / 7.0 / 7.1 for command line (no need of Apache, nginx etc.)
    - the command `php` must be available from the shell
    - on Windows you may have to add the path to the php executable to the system PATH variable, see [more info here](https://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash)
    - the [xdebug](https://xdebug.org/download.php) extension is recommended 
- locally installed [composer](https://getcomposer.org/)
    - the command `composer` should be available from the shell
- IDE (like PhpStorm) will help you a lot (code-completion etc.)

- Try cloning the example repository:

```sh
$ git clone git@github.com:lmc-eu/steward-example.git
# or if you don't have set up SSH key on GitHub run:
$ git clone https://github.com/lmc-eu/steward-example.git
```

- Install dependencies of the example repository using Composer:
```sh
$ cd steward-example
$ composer install
```

### A. Docker-only steps 🐳

This will allow you to start Selenium and the browser inside Docker container. You will need:

- Docker daemon up & running
- VNC client to connect to the desktop inside Docker - eg. `vncviewer` (part of `TightVNC`) or [Remmina](https://www.remmina.org/) on Linux, on Mac OS the builtin client should be ok
- pull and start the [standalone-chrome-debug](https://hub.docker.com/r/selenium/standalone-chrome-debug/) image:

```sh
$ docker run -p 4444:4444 -p 5900:5900 selenium/standalone-chrome-debug:3.6.0
```
**⚠ The Docker image is almost 400 MB download, so definitely do this ⤴ in advance!**

The previous command will make Selenium listening on `localhost` port `4444` and on port 5900 the browser GUI is exposed for VNC.
So to see the GUI, you just need to use your favorite remote desktop VNC viewer and connect to host `127.0.0.1:5900`.

For example on Linux with `vncviewer`:

```sh
$ vncviewer 127.0.0.1:5900 # if asked, enter password 'secret'
```

If you see an empty desktop with Ubuntu logo on black background, the environment is prepared to execute the Selenium tests. 🎉

If you wan't to stop the running Docker image, hit `Ctrl+C` in the shell where it was started.

### B. Classic setup-only steps 💻

Using this setup, the tests will be started on you local browser. While this may have some advantages,
 it may be a bit mote complicated to set it up, so if you can, please use the Docker way. Otherwise, you will need:

- Java 8+, executable from command line (try command `java -version`)
- Latest Chrome/Chromium browser (version 62)
- Latest [ChromeDriver](https://sites.google.com/a/chromium.org/chromedriver/downloads) (version 2.33)
    - On Linux you may use a package from your distribution, like `chromium-chromedriver` on Ubuntu, aur/chromedriver on Arch etc.
    - The `chromedriver` or `chromedriver.exe` command must be executable from the shell

- When inside the `steward-example` directory, run this to download Selenium server `jar` file:

```sh
$ ./vendor/bin/steward install 3.4.0
```

- Now you can start the Selenium server:
```sh
$ java -jar ./vendor/bin/selenium-server-standalone-3.4.0.jar
```

If you didn't place the `chromedriver` binary to the system PATH and thus Selenium cannot find it, you will need to 
specify the path to is using parameters passed to the command like this:

```sh
$ java -Dwebdriver.chrome.driver="/opt/chromium-browser/chromedriver" -jar vendor/bin/selenium-server-standalone-3.4.0.jar
```
 
### Try it 🚀

Having Selenium server listening (either inside Docker or locally) you can try running some example tests.
 
```sh
# make sure you are in steward-example directory (see above)
$ ./vendor/bin/steward run production chrome -vv
```

If you used Docker, open the VNC client window to see browser being controlled by Selenium inside the Docker container.

If you started Selenium locally, Chrome windows should start popping-up right in front of you.

### Troubles?

If you encounter any trouble while preparing your environment for the workshop, please
[fill an issue](https://github.com/OndraM/selenium-workshop-phpce/issues/new) in this repository.
I will do my best to help you as soon as possible.
