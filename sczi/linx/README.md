# linx

Base image: https://hub.docker.com/r/andreimarcu/linx-server/

Our instance of linx for linx.vtluug.org and linx.li.



## Configuration

Create the folders `/nfs/cistern/docker/data/linx/{files,meta}` with `775 nobody:root` for persistent data.


## Running it

Run `docker-compose up -d`.
