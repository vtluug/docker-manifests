# Phenny

Base image: `https://hub.docker.com/r/mutantmonkey/phenny`



## Configuration

Create the directory `/nfs/cistern/docker/data/phenny/` with permissions 200:200. Phenny's configuration files are stored in this directory

Create `phenny.env` in this directory and enter the following environmental variables:
* `WADSWORTH_FREENODE`: Wadsworth's nick password for freenode, found in vtluug-admin repo
* `WADSWORTH_OFTC`: Wadsworth's nick password for oftc, found in vtluug-admin repo



## Running it

Run `docker-compose up -d`.
