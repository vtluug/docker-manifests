# mediawiki

Base image: https://hub.docker.com/_/mediawiki/

Our instance of mediawiki for wiki.vtluug.org and gobblerpedia.org.

**Requires dex**



## Configuration

Read the base image link.

Create the folders `/nfs/cistern/docker/data/wiki/images/{vtluug,gobblerpedia}` and `/nfs/cistern/docker/data/wiki/mysql` for persistent data.

Create `.env` in the current directory with the following variable defined:
* `MYSQL_PASSWORD`: database password, found in vtluug-admin repo

Create `./config/secrets.php` similarly structured to the one in this link https://www.mediawiki.org/wiki/Manual:Securing_database_passwords but with the following variables defined; all can be found in vtluug-admin repo:
* `$wgDBpassword`: user password for mariadb
* `$wgSecretKey_vtluug`: vtluug secret key
* `$wgUpgradeKey_vtluug`: vtluug upgrade key
* `$wgSecretKey_gobblerpedia`: gobblerpedia secret key
* `$wgUpgradeKey_gobblerpedia`: gobblerpedia upgrade key


## Running it

Run `docker-compose up -d`.
