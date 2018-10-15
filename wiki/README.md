# mediawiki

Base image: https://hub.docker.com/_/mediawiki/

Our instance of mediawiki for wiki.vtluug.org and gobblerpedia.org.

**Requires dex**



## Configuration

Read the base image link.

Create the folders `/nfs/cistern/docker/data/wiki/images/{vtluug,gobblerpedia}` and create `/nfs/cistern/docker/data/wiki/LocalSettings{_gobblerpedia,_vtluug}.php`.

If you don't have a LocalSettings fie, see the base image link for how to set it up.

Create `.env` in the current directory with the following variable defined:
* `MYSQL_PASSWORD`: database password, found in admin repo on sczi


## Running it

Run `docker-compose up -d`.
