# mediawiki

Base image: https://hub.docker.com/_/mediawiki/

Our instance of mediawiki for wiki.vtluug.org and gobblerpedia.org.

**Requires dex**



## Configuration

Read the base image link.

Create the folders `/nfs/cistern/docker/data/wiki/images/{vtluug,gobblerpedia}` and `/nfs/cistern/docker/data/wiki/mysql` for persistent data.

Create `database.env` and `mediawiki.env` in the current directory with the following variable defined:
* `database.env`:
** `MYSQL_PASSWORD`: database password, found in vtluug-admin repo
* `mediawiki.env`:
** `MYSQL_PASSWORD`: see above
** `MW_SECRET_KEY`: see https://www.mediawiki.org/wiki/Manual:$wgSecretKey, found in vtluug-admin repo
** `MW_UPGRADE_KEY`: see https://www.mediawiki.org/wiki/Manual:$wgUpgradeKey, found in vtluug-admin repo
** `SMTP_PASSWORD`: password for wiki-admin@vtluug, found in vtluug-admin repo


## Running it

Run `docker-compose up -d`.
