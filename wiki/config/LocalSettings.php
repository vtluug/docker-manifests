<?php
# SMTP, db, api passwords
require_once('/var/www/secrets.php');

# Protect against web entry
if (!defined('MEDIAWIKI') {
    exit;
}

# Nginx compresses everything by default, so disable PHP compression and use etags
$wgDisableOutputCompression = true;

# Database {{{
$wgDBtype = 'mysql';
$wgDBserver = 'wiki_database_1';
$wgDBname = 'mw';
$wgDBuser = 'mw_user';
$wgDBpassword = $secret_db_pw;
# wgDBprefix also set for each specific wiki

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";
# }}}

# Wiki-specific settings {{{
# Yes, I know we could included the secrets file multiple times but this way
#  all the secret variables are here in 1 place.
# Same things for wgDBprefix. Since all DB config is done in this file it's
#  better to have that info here.
if ($_SERVER['SERVER_NAME'] == 'gobblerpedia.org') {
    require_once('LocalSettings_gobblerpedia.php');
    $wgDBprefix = 'gobblerpedia';
    $wgSecretKey = $secret_gp_secretkey;
    $wgUpgradeKey = $secret_gp_upgradekey;
} else {
    $wgDBprefix = 'vtluug';
    require_once('LocalSettings_vtluug.php');
    $wgDBprefix = 'gobblerpedia';
    $wgSecretKey = $secret_gp_secretkey;
    $wgUpgradeKey = $secret_gp_upgradekey;
}
# }}}

# Mail {{{
$wgSMTP = array(
 'host'     => 'acidburn.vtluug.org',
 'IDHost'   => 'vtluug.org',
 'port'     => 25,
 'auth'     => true,
 'username' => 'wiki-admin',
 'password' => $secret_mail_pw
);

## UPO = user preference option
$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = 'wiki-admin@vtluug.org';
$wgPasswordSender = 'wiki-admin@vtluug.org';

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;
# }}}

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = false;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = true;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# AntiSpoof extension (https://www.mediawiki.org/wiki/Extension:AntiSpoof)
wfLoadExtension('AntiSpoof');

# AbuseFilter extension (https://www.mediawiki.org/wiki/Extension:AbuseFilter) {{{
wfLoadExtension('AbuseFilter');

$wgGroupPermissions['sysop']['abusefilter-modify'] = true;
$wgGroupPermissions['*']['abusefilter-log-detail'] = true;
$wgGroupPermissions['*']['abusefilter-view'] = true;
$wgGroupPermissions['*']['abusefilter-log'] = true;
$wgGroupPermissions['sysop']['abusefilter-private'] = true;
$wgGroupPermissions['sysop']['abusefilter-modify-restricted'] = true;
$wgGroupPermissions['sysop']['abusefilter-revert'] = true;

$wgAbuseFilterEmergencyDisableThreshold = array('default' => 1.00);
# }}}

# CategoryTree extension {{{
$wgUseAjax = true;
wfLoadExtension('CategoryTree');
# }}}

# Don't use rel='nofollow' as it doesn't actually prevent spam
$wgNoFollowLinks = false;

# Log everything to stdout to since we're using Docker
$wgDebugLogFile = fopen('php://stdout', 'w');

# SQL Debugging {{{
#$wgShowSQLErrors = true;
#$wgDebugDumpSql = true;
# }}}

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# Skins {{{
wfLoadSkin('Timeless');
$wgDefaultSkin('timeless');
# }}}
