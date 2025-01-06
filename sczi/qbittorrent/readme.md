# qbit + gluetun

## config

write something like the following to `gluetun.env` 

```
OPENVPN_USER=13371337
```

with the key from the luug's vpn sub (should probably maybe be in https://git.vtluug.org/officers/vtluug-admin/, `accounts.yml`). relies entirely on the vpn bill getting paid somehow.

## run

`docker compose up -d`