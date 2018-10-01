## Funkwhale



### Configuration

Create the folder /nfs/cistern/docker/data/funkwhale to use for persistent data

Follow https://docs.funkwhale.audio/installation/docker.html

* We used the linked docker-compose.yml with the following modifications:
    * TODO
* We use the linked .env file with the following modifications:
    * TODO


#### Importing music

Read https://docs.funkwhale.audio/importing-music.html first

VTLUUG's main (MEDIA_ROOT in .env) music folder is /nfs/cistern/share/media/music/songs 

We use in-place importing and symlink all other folders to this directory: TODO explain more



### Running it

RTFM (Seriously! There's a total of 5 commands to run)
