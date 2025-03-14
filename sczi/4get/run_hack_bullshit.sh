#!/bin/bash

docker compose pull
docker compose up -d
sleep 5

# make opensearch hallucinate that we're connecting thru https
#  otherwise, it'll add the search engine as http://[host], which 
#  inevitably resolves to http://search.vtluug.org:443, which obviously
#  just doesn't work
docker exec -it fourget sed -i '2i\$_SERVER[\"HTTPS\"] = \"on\";' opensearch.php
