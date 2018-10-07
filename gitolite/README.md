# gitolite

Once configured, repos are found at ssh://git@sczi.vtluug.org:8000/$repo

Base image: https://hub.docker.com/r/jgiannuzzi/gitolite/



## Configuration

Create the folders /nfs/cistern/docker/data/gitolite/{keys,git} for persistent data

Create an '.env' file with the following variables defined:
* SSH_KEY: ssh key to be used as an admin key
* SSH_KEY_NAME: identifier for the key


## Running it

Run 'docker-compose up -d' as papatux


## Post-Configuration

Clone ssh://git@sczi.vtluug.org:8000/gitolite-admin to configure things

See http://gitolite.com/gitolite/basic-admin/
