# nginx

Base image: https://hub.docker.com/linuxserver/letsencrypt

Our reverse-proxy https server.



## Configuration

Create the folder `/nfs/cistern/docker/data/nginx/config` for persistent data.


The `default` file in this folder is the main nginx configuration and is required for running.

Specific site files are in the `sites` folder in this folder and are enabled by appending `.enabled` to a configuration file, for example `gobblerpedia.org.enabled`. These files are included from `default`.


This image includes support for fail2ban with a few jails. See the base image link for how to add more.


## Running it

Run `docker-compose up -d`.
