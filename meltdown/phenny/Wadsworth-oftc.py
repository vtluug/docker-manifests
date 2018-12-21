import os

nick = 'Wadsworth'
host = 'irc.oftc.net'
port = 6697
ssl = True
ipv6 = False
channels = ['#pew']#['#vtcsec', '#vtluug', '#vtluug-infra', '#vtwug', '#pew', '#gobblerpedia', '#wuvt-nsfw', '#phenny-issues']
owner ='pew'
helpurl = "https://vtluug.org/wiki/Wadsworth"

password = os.environ['WADSWORTH_OFTC']

# linx-enabled features (.linx, .posted, .lines, snarfuri with special capabilities)
# leave the api key blank to not use them and be sure to add the 'linx' module to the ignore list.
linx_api_key = os.environ['LINX_API_KEY']
#foodforus_api_key = "Eru,+Llkf5hL|p>9Pr;LW::si" #it doesn't work anyway

# These are people who will be able to use admin.py's functions...
admins = [owner, 'ackthet', 'telnoratti', 'mhazinsk', 'mutantmonkey', 'aam', 'johnv', 'echarlie', 'pew']
# But admin.py is disabled by default, as follows:
exclude = ['logger', 'foodforus', 'seen', 'posted' ]

#you may want to ignore quone. I've decided not to
ignore = ["News", "Robocop", "luugmonit", "wuvtmonit", "wuvt-github", "truncatedcone", "amnoid"] 

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

