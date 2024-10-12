# The Lounge

The Lounge is a WebIRC server with persistence and push notifications.

This docker-compose is loosely informed by [the example found here](https://github.com/thelounge/thelounge-docker/blob/master/docker-compose.yml) and the docs on [this page](https://hub.docker.com/r/thelounge/thelounge).

## Configuration

Take a look at the .../data/thelounge directory.

The setup I envision doesn't use LDAP for the primary/sole source of auth. Ideally we'd hand out accounts to this as freely as possible (like, to people showing up their first meeting), encouraging IRC participation.

## Starting

`docker-compose up -d`