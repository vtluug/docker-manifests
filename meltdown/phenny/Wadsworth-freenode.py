import os

nick = 'Wadsworth'
host = 'chat.freenode.net'
port = 6697
ssl = True
ipv6 = False
channels = ['#ipv6','#vtara', '#vtcsec', '#sys51']
owner = 'pew'
helpurl = "https://vtluug.org/wiki/Wadsworth"

password = os.environ['WADSWORTH_FREENODE']

# linx-enabled features (.linx, .posted, .lines, snarfuri with special capabilities)
# leave the api key blank to not use them and be sure to add the 'linx' module to the ignore list.
linx_api_key = os.environ['LINX_API_KEY']

# These are people who will be able to use admin.py's functions...
admins = [owner, 'mhazinsk', 'echarlie', 'pew']
# But admin.py is disabled by default, as follows:
exclude = ['mylife', 'logger', 'foodforus']

ignore = ['Came_To_Say']

# If you want to enumerate a list of modules rather than disabling
# some, use "enable = ['example']", which takes precedent over exclude
#
# enable = []

# Directories to load user modules from
# e.g. /path/to/my/modules
extra = []

# Services to load: maps channel names to white or black lists
external = {
   '*': ['!'] # default whitelist
}

# EOF

