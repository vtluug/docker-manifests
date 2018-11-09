# hokieprivacy

**Requires gitolite**

Base image: https://hub.docker.com/r/monachus/hugo/

The site content is stored on sczi's gitolite instance.



## Configuration

Make sure you have access to the hokieprivacy repo on sczi.


Clone `/nfs/cistern/docker/data/gitolite/git/repositories/hokieprivacy.git` to `./site` as root.


## Running it

Run `docker-compose up` and stop it once it finishes. This generates static files in `/nfs/cisntern/docker/data/hokieprivacy/html`.


### Site content changes

Pull changes into `./site` and run `docker-compose build && docker-compose up --force-recreate`.
