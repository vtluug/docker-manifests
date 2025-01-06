# qbit + gluetun

## config

write something like the following to `gluetun.env` 

```
OPENVPN_USER=13371337
```

with the key from the luug's vpn sub (should probably maybe be in https://git.vtluug.org/officers/vtluug-admin/, `accounts.yml`). relies entirely on the vpn bill getting paid somehow.


create an qbittorrent-sso.env that looks something like
```
OAUTH2_PROXY_HTTP_ADDRESS=0.0.0.0:4180
OAUTH2_PROXY_PROVIDER=oidc
OAUTH2_PROXY_OIDC_ISSUER_URL=https://id.vtluug.org
OAUTH2_PROXY_CLIENT_ID=qbittorrent-sso
OAUTH2_PROXY_CLIENT_SECRET=<insert client secret from/for dex here>
OAUTH2_PROXY_COOKIE_SECRET=<some random b64>
OAUTH2_PROXY_REDIRECT_URL=https://seed.vtluug.org/oauth2/callback
OAUTH2_PROXY_UPSTREAM=http://qbittorrent-gtun:8080
OAUTH2_PROXY_EMAIL_DOMAINS=vtluug.org
OAUTH2_PROXY_SCOPE=openid email profile
OAUTH2_PROXY_COOKIE_DOMAIN=seed.vtluug.org
```

## run

`docker compose up -d`