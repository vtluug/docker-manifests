#!/bin/bash
docker run -p 8086:8086 -v /nfs/cistern/docker/data/installfest-counter/app:/app installfest-counter
