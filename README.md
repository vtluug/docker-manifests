## VTLUUG's collection of Docker apps


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
