# matrix (synapse)

Base image: https://hub.docker.com/r/matrixdotorg/synapse/

A matrix homeserver for the luug, listens to http on post 8008 internally.

## Configuration

[synapse requires you to generate a config](https://hub.docker.com/r/matrixdotorg/synapse).

This amounts, more or less, to running
```
docker run -it --rm \
    -v /nfs/cistern/docker/data/synapse:/data \
    -e SYNAPSE_SERVER_NAME=matrix.vtluug.org \
    -e SYNAPSE_REPORT_STATS=yes \
    matrixdotorg/synapse:latest generate
```
## Running it

`docker-compose up -d`. reverse proxy through sczi/nginx.