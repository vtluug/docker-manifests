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
#$wgUseInstantCommons = true;

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

# Debugging {{{
# Log everything to stdout to since we're using Docker
$wgDebugLogFile = 'php://stdout';
$wgDBerrorLog   = 'php://stderr';

# Show SQL errors to user instead of "(SQL query hidden)" message
#$wgShowSQLErrors = true;
#$wgDebugDumpSql = true;
# }}}

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = '/usr/bin/diff3';

# Extensions {{{
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

# Maps
wfLoadExtension('Maps');
require_once('extensions/Maps/Maps_Settings.php'); #TODO will change to DefaultSettings.php at next update
$GLOBALS['egMapsDefaultService'] = 'leaflet';

# TODO: OIDC (w/ dex)

# ParserFunctions
wfLoadExtension('ParserFunctions');
$wgPFEnableStringFunctions = true;

# Additional wiki-specific skins included in specific LocalSettings file
# }}}

# Skins
wfLoadSkin('Vector');
$wgDefaultSkin = 'vector';

# Load wiki specific settings
require_once("LocalSettings_{$wgDBprefix}.php");
