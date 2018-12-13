# vtluug-site

Base image: https://hub.docker.com/r/monachus/hugo/

The site content is stored in `./site`.

This folder is currently has no purpose since the website is proxied to https://vtluug.github.io. We may switch to hosting it ourself eventually but no promises.


## Configuration

Nothing to see here :)


## Running it



Pull changes into `./site` and run `docker-compose build && docker-compose up --force-recreate -d`.
