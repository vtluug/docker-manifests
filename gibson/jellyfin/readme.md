# jellyfin

jellyfin with the appropriate render device (gibson's Arc a770) selected.

# config

getting the render group id:
```
rsk@gibson:~$ getent group render
render:x:993:
rsk@gibson:~$ 
```

getting the correct gpu device:
```
rsk@gibson:~$ ls -l /sys/class/drm/renderD*/device/driver
lrwxrwxrwx 1 root root 0 Jan 27 09:36 /sys/class/drm/renderD128/device/driver -> ../../../../../../bus/pci/drivers/i915
lrwxrwxrwx 1 root root 0 Jan 27 09:36 /sys/class/drm/renderD129/device/driver -> ../../../../bus/pci/drivers/nouveau
rsk@gibson:~$ 
```

which is the Arc and the Quadro, respectively

# running

`docker compose up -d`