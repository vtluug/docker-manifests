# vtluug-site

Base image: https://hub.docker.com/r/monachus/hugo/

The site content is stored in `./site`.


## Configuration

Nothing to see here :)


## Running it

Run `docker-compose up -d`. (This automatically builds the image)


### Site content changes

Pull changes into `./site` and run `docker-compose build && docker-compose up --force-recreate -d`.
