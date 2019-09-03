<?php
# Protect against web entry
if (!defined('MEDIAWIKI')) {
    exit;
}

# Nginx compresses everything by default, so disable PHP compression and use etags
$wgDisableOutputCompression = true;

# Database {{{
$wgDBtype     = 'mysql';
$wgDBserver   = 'wiki_database_1';
$wgDBname     = 'mw';
$wgDBuser     = 'mw_user';
$wgDBpassword = getenv('MYSQL_PASSWORD');
# wgDBprefix also set for each specific wiki

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";
# }}}

# Wiki-specific settings {{{
# Wiki specific files are loaded at end of file
if ($_SERVER['SERVER_NAME'] == 'gobblerpedia.org') {
    $wgDBprefix = 'gobblerpedia';
} else {
    $wgDBprefix = 'vtluug';
}
# }}}

# Disable random account creation
# FYI: sysop group = Administrators
## Member can be:
## - wiki-admin: both wikis, created at wiki creation but also in LDAP for mail, bureaucrat, creds found in vtluug-admin repo
## - ODIC via dex: both wikis, admins = LDAP officers group + manually selected for non-LDAP sources
## - Spam User: For merging & deleting spam accounts
## - Abuse Filter: For AbuseFilter plugin
## - Maintenance script: Default user for actions made via maintenance scripts
$wgGroupPermissions['*']['edit']              = false;
$wgGroupPermissions['*']['createaccount']     = false;
$wgGroupPermissions['*']['autocreateaccount'] = true;


# Mail {{{
$wgSMTP = array(
 'host'     => 'acidburn.vtluug.org',
 'IDHost'   => 'vtluug.org',
 'port'     => 25,
 'auth'     => true,
 'username' => 'wiki-admin',
 'password' => getenv('SMTP_PASSWORD')
);

## UPO = user preference option
$wgEnableEmail         = true;
$wgEnableUserEmail     = true; # UPO

$wgEmergencyContact    = 'wiki-admin@vtluug.org';
$wgPasswordSender      = 'wiki-admin@vtluug.org';

$wgEnotifUserTalk      = false; # UPO
$wgEnotifWatchlist     = false; # UPO
$wgEmailAuthentication = true;
# }}}

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath  = '/w';
$wgArticlePath = "/wiki/$1";
$wgUsePathInfo = true;

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## Shared memory settings
$wgMainCacheType    = CACHE_NONE;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads             = true;
$wgUploadPath                = "{$wgScriptPath}/images";
$wgUploadDirectory           = "{$IP}/images/{$wgDBprefix}";
$wgUseImageMagick            = true;
$wgImageMagickConvertCommand = '/usr/bin/convert';
$wgFileExtensions[]          = 'svg';
$wgSVGConverter              = 'rsvg';

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = true;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = true;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = 'C.UTF-8';

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
$wgCacheDirectory = "{$IP}/cache/{$wgDBprefix}";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = 'en';

# Secret & Upgrade keys
$wgSecretKey  = getenv('MW_SECRET_KEY');
$wgUpgradeKey = getenv('MW_UPGRADE_KEY');

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = '1';

# Don't use rel='nofollow' as it doesn't actually prevent spam
$wgNoFollowLinks = false;
# }}}

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = '/usr/bin/diff3';

# Extensions (A-Zish order) {{{
# AbuseFilter
wfLoadExtension('AbuseFilter');
$wgGroupPermissions['sysop']['abusefilter-modify']            = true;
$wgGroupPermissions['*']['abusefilter-log-detail']            = true;
$wgGroupPermissions['*']['abusefilter-view']                  = true;
$wgGroupPermissions['*']['abusefilter-log']                   = true;
$wgGroupPermissions['sysop']['abusefilter-private']           = true;
$wgGroupPermissions['sysop']['abusefilter-modify-restricted'] = true;
$wgGroupPermissions['sysop']['abusefilter-revert']            = true;
$wgAbuseFilterEmergencyDisableThreshold = array('default' => 1.00);

# AntiSpoof
wfLoadExtension('AntiSpoof');

# CategoryTree
$wgUseAjax = true;
wfLoadExtension('CategoryTree');

# Cite
wfLoadExtension('Cite');

# Interwiki
## Visit Special:Interwiki to configure
wfLoadExtension('Interwiki');
$wgGroupPermissions['sysop']['interwiki'] = true;

# Maps
wfLoadExtension('Maps');
require_once('extensions/Maps/Maps_Settings.php');
$GLOBALS['egMapsEnableCoordinateFunction'] = false;
$GLOBALS['egMapsDefaultService'] = 'leaflet';

# Mobile view & Nearby config
# Add lat/lon to articles as described in https://www.mediawiki.org/wiki/Extension:MobileFrontend#Setup_Nearby
wfLoadExtension('MobileFrontend');
$wgMFAutodetectMobileView = true;
wfLoadSkin('MinervaNeue');
$wgMFDefaultSkinClass = 'SkinMinerva';
wfLoadExtension('GeoData');
$wgMFNearby = true;

# Nuke
## Default: sysop has perms
wfLoadExtension('Nuke');

# OpenID Connect
wfLoadExtension('PluggableAuth');
wfLoadExtension('OpenIDConnect');
$wgPluggableAuth_EnableLocalLogin   = true;
$wgPluggableAuth_ButtonLabelMessage = 'VTLUUG SSO';
# LDAP & Google => both wikis
$wgOpenIDConnect_Config['https://id.vtluug.org'] = [
    'clientID'		 => 'vtluug-wiki',
    'clientsecret'	 => getenv('DEX_WIKI_SECRET'),
    'name'		 => 'VTLUUG SSO',
    'scope'		 => ['openid', 'profile', 'email'],
    'preferred_username' => 'name'
];
$wgOpenIDConnect_Config['https://accounts.google.com'] = [
    'clientID'     => getenv('ODIC_GOOGLE_ID'),
    'clientsecret' => getenv('ODIC_GOOGLE_SECRET'),
    'name'         => 'GOOGLE SSO',
    'scope'        => ['openid', 'profile', 'email']
];

# ParserFunctions
wfLoadExtension('ParserFunctions');
$wgPFEnableStringFunctions = true;

# Renameuser
## Default: bureaucrat has perms
wfLoadExtension('Renameuser');

# Rollback
$wgGroupPermissions['sysop']['rollback'] = true;

# UserMerge
## Default: nobody has perms
wfLoadExtension('UserMerge');
$wgGroupPermissions['sysop']['usermerge'] = true;

# Additional wiki-specific extensions included in specific LocalSettings file
# }}}

# Skins
wfLoadSkin('Vector');
$wgDefaultSkin = 'vector';

# Load wiki specific settings
require_once("LocalSettings_{$wgDBprefix}.php");

# Debugging {{{
# Log everything to stdout to since we're using Docker
#$wgDebugLogFile = 'php://stdout';
$wgDBerrorLog   = 'php://stderr';

# SQL
#$wgShowSQLErrors = true;
#$wgDebugDumpSql = true;

# Detailed debugging
#$wgShowExceptionDetails = true;
# }}}
