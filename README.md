# VTLUUG's collection of docker-compose manifests

In this repo, 'app' refers to a collection of containers. App directories are organized based on the host where the app is run, then directories for each app. All critical and nginx proxied services go through sczi, other than that it doesn't matter which host containers are on.

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
* `/opt/docker` replaces `/nfs/cistern/docker` on acidburn


### Ports

#### External Ports

* sczi
    * The `nginx` container exposes ports 80 and 443 and acts as a reverse-proxy for all other sites.
    * 113: thelounge (IRC identd)
* gibson
    * 8001: openwebui
    * 8002: jellyfin


### Apps to be implemented after main apps (in order of priority)
gopher, jitsi, map, syncthing-relay, QUIC, some monitoring things (elk, prometheous, portainer, ???)
