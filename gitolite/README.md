# gitolite

Base image: https://hub.docker.com/r/jgiannuzzi/gitolite/

Once configured, repos are found at `ssh://git@sczi.vtluug.org:9000/$repo`.



## Configuration

Create the folders `/nfs/cistern/docker/data/gitolite/{keys,git}` for persistent data.

Create `.env` in the current directory with the following variable defined:
* `SSH_KEY`: admin ssh, **NOTE**: This file is parse by yaml, not bash, so quotes are interpreted literally.
* `SSH_KEY_NAME`: identifier for the key


## Running it

Run `docker-compose up -d`.


## Post-Configuration

Clone `ssh://git@sczi.vtluug.org:9000/gitolite-admin` to configure things.

See http://gitolite.com/gitolite/basic-admin/
