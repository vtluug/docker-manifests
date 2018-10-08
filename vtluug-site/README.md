# vtluug-site

Base image: https://hub.docker.com/r/monachus/hugo/

The site content is stored in `./site`.


## Configuration

Nothing to see here :)


## Running it

Run `docker-compose up -d` as papatux. (This automatically builds the image)


### Site content changes

The site needs to be rebuilt each time the content changes:
* Run `docker-compose build`
* Run `docker-compose up --force-recreate -d`
