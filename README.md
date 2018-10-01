## VTLUUG's collection of docker-compose manifests

In this repo 'app' refers to a collection of containers


### How to use this repo

* Read each app's specific instructions for configuring and running the app
* Read about the structure below


### Structure of VTLUUG's Docker things

* /nfs/cistern/docker/data/<app>: Where persistent data for a given app should go
    * Permissions are root:docker
* /nfs/cistern/docker/images: Location all download docker images
    * You probably shouldn't touch this; the main reason for being on NFS is to make the VM as small as possible
* /nfs/cistern/docker/apps: Location of all app configs. Aka this repo
* Some apps also reference other directories, for example funkwhale uses /share for importing music. See the app-specific README for details


#### Internal ports

Format is a 7 followed by a 2 digit app id

* 701: wiki
* 702: linx
* 703: hokieprivacy
* 704: funkwhale

#### Apps to be implemented after main apps (in order of priority)
wadsworth, funkwhale, bash, minecraft, jitsi, map, syncthing-relay, some monitoring things (elk, prometheous, portainer, watchtower, ???)
