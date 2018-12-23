# linx

Out instance of pyqdb for bash.vtluug.org.



## Configuration

By default this listens on port 8080.

Put an already existing quote database at `/nfs/cistern/docker/data/pyqdb/quotes.db`.

Create the file `pyqdb.env` with `PYQDB_SECRET_KEY` defined (see vtluug-admin repo for PW).



## Running it

Run `docker-compose up -d`.
