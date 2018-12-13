# hokieprivacy

**Requires gitolite**

Base image: https://hub.docker.com/r/monachus/hugo/

The site content is stored on sczi's gitolite instance.



## Configuration

Make sure you have access to the hokieprivacy repo on sczi.


Clone `/nfs/cistern/docker/data/gitolite/git/repositories/hokieprivacy.git` to `./site` as root.


## Running it

Run `docker-compose up -d`. This generates static files in `/nfs/cisntern/docker/data/hokieprivacy/html` and updates with any content changes to `./site`.
