# Funkwhale

Guide: https://docs.funkwhale.audio/installation/docker.html



## Configuration

Follow the guide linked above, except our nginx config is done in the nginx app.
The `.env` file is a bit tricky, but basically just set the values manually for nginx, also this file is not in GH so you need to create it on the host server.

### Importing music

Read https://docs.funkwhale.audio/importing-music.html first.

VTLUUG's main (`MEDIA_DIRECTORY_SERVER_PATH` in `.env`) music folder is `/nfs/cistern/share/media/music`.



## Running it

RTFM (Seriously! It has very good documentation).
