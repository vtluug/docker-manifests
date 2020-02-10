# mediawiki

Base image: https://hub.docker.com/_/mediawiki/

Our instance of mediawiki for wiki.vtluug.org and gobblerpedia.org.

**Requires dex**



## Configuration

Read the base image link.

Create the folders `/nfs/cistern/docker/data/wiki/images/{vtluug,gobblerpedia}` and `/nfs/cistern/docker/data/wiki/mysql` for persistent data.

Create `database.env` and `mediawiki.env` in the current directory with the following variable defined:
* `database.env`:
  * `MYSQL_PASSWORD`: database password, found in vtluug-admin repo
* `mediawiki.env`:
  * `MYSQL_PASSWORD`: see above
  * `MW_SECRET_KEY`: see https://www.mediawiki.org/wiki/Manual:$wgSecretKey, found in vtluug-admin repo
  * `MW_UPGRADE_KEY`: see https://www.mediawiki.org/wiki/Manual:$wgUpgradeKey, found in vtluug-admin repo
  * `SMTP_PASSWORD`: password for wiki-admin@vtluug, found in vtluug-admin repo
  * `ODIC_GOOGLE_ID`: ODIC id for authing with google accounts
  * `ODIC_GOOGLE_SECRET`: ODIC client secret for authing with google account

After an initial run to create the db tables, uncomment the command line in docker-compse.yml

See `config/LocalSettings*.php` for information about extensions such as interwiki, maps, etc.

## Running it

Run it once in non-detached mode (`docker-composer up`) because sometimes `sleep` in the `COMMAND` directive doesn't work (TODO fix). Then, ^C that instance and restarted it in detached mode: `docker-compose up -d`.
