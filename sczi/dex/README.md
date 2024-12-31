# dex


Used as an OIDC bridge between the wiki and FreeIPA (LDAP) accounts.

Base image: https://quay.io/repository/dexidp/dex



## Configuration

Create the directory `/nfs/cistern/docker/data/dex` with permissions 1001:1001.

Create the file 'dex.env' with 'DEX_LDAP_PASSWORD' set to dex's password (found in vtluug-admin repo)

add secrets for all registered static services, e.g.
```
DEX_LDAP_PASSWORD=hunter2
WIKI_SECRET=topsecret
GITEA_SECRET=tercespot
SLSKD_SECRET=aids
```

## Running it

Run `docker-compose up -d`.
