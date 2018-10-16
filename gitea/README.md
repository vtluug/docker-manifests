# gitolite

Base image: https://hub.docker.com/r/gitea/gitea



## Configuration

Create the folders `/nfs/cistern/docker/data/gitea/data` for persistent data.

Create `.env` in the current directory with the following variable defined:
* `MYSQL_ROOT_PASSWORD`: Found in vtluug-admin repo; create if not present.
* `MYSQL_PASSWORD`: Found in vtluug-admin repo; create if not present.


## Running it

Run `docker-compose up -d`.


## Post-Configuration

Visit https://git.vtluug.org to configure things
