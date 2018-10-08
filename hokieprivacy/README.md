# hokieprivacy

**Requires gitolite**

Base image: https://hub.docker.com/r/monachus/hugo/

The site content is stored in sczi's gitolite repo.



## Configuration

Make sure you have access to the hokieprivacy repo on sczi.

Clone `ssh://git@sczi.vtluug.org:9000/hokieprivacy` to the folder `site`.


## Running it

Run `docker-compose up -d`. (This automatically builds the image)


### Site content changes

The site needs to be rebuilt each time the content changes:
Run `docker-compose build && docker-compose up --force-recreate -d`.
