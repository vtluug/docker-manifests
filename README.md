# VTLUUG's collection of docker-compose manifests

In this repo 'app' refers to a collection of containers

We manage some images using docker hub. PM the sysadmin if you want to get added to our org there (or here on GH for that matter).


## How to use this repo

* Read each app's specific instructions for configuring and running the app
* Read about the structure below


## Structure of VTLUUG's Docker things

* `/nfs/cistern/docker/data/$app`: Where persistent data for a given app should go
    * Permissions are `root:docker`, `775`
* `/nfs/cistern/docker/images`: Location all download docker images
    * You probably shouldn't touch this; the main reason for this being on NFS is to make the VM as small as possible
* `/nfs/cistern/docker/apps`: Location of all app configs. Aka this repo
* Some apps also reference other directories, for example funkwhale uses the NFS share for importing music. See the app-specific README for details


### Ports

#### External Ports

For webapps, ports 80 and 443 are used along with a service specific subdomain.

For non-webapps, ports 9000-9999 are used to expose (most) apps externally.
* 9000: gitolite
* dex: ???

#### Internal Ports

All of these apps are reverse-proxied through nginx:
* 7000: vtluug-site
* 7001: wiki
* 7002: linx
* 7003: hokieprivacy
* 7004: funkwhale
* dex: ???

Other apps also use internal ports for communication:
* 6000: mariadb for wiki


### Apps to be implemented after main apps (in order of priority)
dex, wadsworth, funkwhale, bash, minecraft, jitsi, map, syncthing-relay, caddy (for QUIC), some monitoring things (elk, prometheous, portainer, watchtower, ???)
