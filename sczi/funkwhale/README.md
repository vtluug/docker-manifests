# Funkwhale

Guide: https://docs.funkwhale.audio/installation/docker.html


TODO, we're configuring important things first


## Configuration

Create the folder `/nfs/cistern/docker/data/funkwhale` to use for persistent data


* We used the linked `docker-compose.yml` with the following modifications:
    * TODO
Create `.env` in the current directory with the following variable defined:
    * TODO


### Importing music

Read https://docs.funkwhale.audio/importing-music.html first.

VTLUUG's main (`MEDIA_ROOT` in `.env`) music folder is `/nfs/cistern/share/media/music/songs`.

We use in-place importing and symlink all other folders to this directory: TODO explain more



## Running it

RTFM (Seriously! There's a total of 5 commands to run).