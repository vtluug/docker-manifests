# 4get

Base image: https://hub.docker.com/r/luuul/4get/

An instance of the 4get metasearch engine. It's like searX, but with one search backend at a time.

runs on host port `7332`.

## Configuration

The environment variables FOURGET_xyz are reflected to the config.php value xyz.

[see further information here](https://git.lolcat.ca/lolcat/4get/src/branch/master/docs/docker.md)

`./banners` should contain any specialawesome banners to be reflected on the site homepage.

## Running it

Run `docker-compose up -d`.
