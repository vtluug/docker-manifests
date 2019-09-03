# linx


Base image: https://quay.io/repository/dexidp/dex



## Configuration

Create the directory `/nfs/cistern/docker/data/dex` with permissions 1001:1001.

Create the file 'dex.env' with 'DEX_LDAP_PASSWORD' set to dex's password (found in vtluug-admin repo)


## Running it

Run `docker-compose up -d`.
