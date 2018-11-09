# VTLUUG's collection of docker-compose manifests

In this repo 'app' refers to a collection of containers

We manage some images using docker hub. PM the sysadmin if you want to get added to our org there (or here on GH for that matter).


## How to use this repo

* Read each app's specific instructions for configuring and running the app
* Read about the structure below


## Structure of VTLUUG's Docker things

* `/nfs/cistern/docker/data/$app`: Where persistent data for a given app should go. Folder/file permissions inside this folder are either set manually during configuration or in the container itself.
    * Permissions are `root:docker`, `775`
* `/nfs/cistern/docker/apps`: Location of all app configs. Aka this repo.
* Some apps also reference other directories, for example funkwhale uses the NFS share for importing music. See the app-specific README for details
* The `vtluug-network` docker network is used for nginx reverse proxying.

### Ports

#### External Ports

The `nginx` container exposes ports 80 and 443 and acts as a reverse-proxy for all other sites.

For non-webapps, ports 9000-9999 are used to expose (most) apps externally.
* 9000: gitolite

#### Internal container ports

Containers proxied through nginx:
* vtluug-site: 1313¹ 
* wiki: 80
* dex: ??? TODO
* linx: 8080
* funkwhale: ???

We also run some static servies directly served through nginx.


¹May be converted to a static site instead.

### Apps to be implemented after main apps (in order of priority)
wadsworth, funkwhale, bash, minecraft, jitsi, map, syncthing-relay, caddy (for QUIC), some monitoring things (elk, prometheous, portainer, watchtower, ???)
