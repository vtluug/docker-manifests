# element

Base image: https://hub.docker.com/r/vectorim/element-web/

An instance of the Riot/Element Matrix web client.

runs on host port `7331`.

## Configuration

The local `./element-config.json` is mapped to `/app/config.json` -- any changes made should be reflected.

## Running it

Run `docker-compose up -d`.
