# hokieprivacy

Base image: https://github.com/oskapt/docker-hugo

This app uses that repo as a submodule, and the actual site content is also a separate repo.



## Configuration

Make sure you have access to the hokieprivacy repo on sczi

Run `git submodule init && git submodule update`

Clone `ssh://git@sczi.vtluug.org:8000/hokieprivacy` to `docker-hugo/site`


## Running it

Run `docker-compose up -d` as papatux
