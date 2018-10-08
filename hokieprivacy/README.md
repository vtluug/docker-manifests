# hokieprivacy

**Requires gitolite**

Base image: https://hub.docker.com/r/monachus/hugo/

The site content is stored on sczi's gitolite instance.



## Configuration

Make sure you have access to the hokieprivacy repo on sczi.

Clone `ssh://git@sczi.vtluug.org:9000/hokieprivacy` to the folder `site`.


## Running it

Run `docker-compose up -d`. (This automatically builds the image)


### Site content changes

Run `docker-compose build && docker-compose up --force-recreate -d`.
