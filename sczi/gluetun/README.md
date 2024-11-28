# gluetun (mullvad/openvpn)

gluetun instance for putting containers behind the luug's mullvad

# cfg

make sure `/nfs/cistern/docker/data/gluetun/mullvad.env` exists, with the contents

`OPENVPN_USER: our-mullvad-id` (check https://git.vtluug.org/officers/vtluug-admin, `accounts.yml`)

# deployment

`docker compose up -d`