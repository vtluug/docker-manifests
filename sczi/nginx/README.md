# nginx

Base image: https://hub.docker.com/linuxserver/letsencrypt

Our reverse-proxy https server.



## Configuration

Create the folder `/nfs/cistern/docker/data/nginx/config` for persistent data.

The TLS certs are stored in the container itself because 1) usually containers last long enough to maintain enough state for this to not be an issue and 2) the container doesn't play nice when `/etc/letsencrypt` can't be removed.

Specific site files are in `site-confs` and are enabled by appending `.enabled` to a configuration file, for example `gobblerpedia.org.enabled`. These files are included from `nginx.conf`.


This image includes support for fail2ban with a few jails. See the base image link for how to add more.



## Running it

Run `docker-compose up -d`.
