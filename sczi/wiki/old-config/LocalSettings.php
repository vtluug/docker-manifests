<?php
# Nginx compresses everything by default, so disable PHP compression and use etags
$wgDisableOutputCompression = true;
$wgUseETag = true;

#$wgReadOnly = '';
#$wgSiteNotice = '';

# Shared memory settings {{{
#$wgMainCacheType = CACHE_NONE;
#$wgParserCacheType = CACHE_MEMCACHED; # optional
#$wgMessageCacheType = CACHE_MEMCACHED; # optional
#$wgMemCachedServers = array( "127.0.0.1:11211" );
#$wgSessionsInMemcached = true;
# }}}

wfLoadSkin('Vector');


# Wiki-specific settings {{{
    switch ($_SERVER["SERVER_NAME"])
    {
        case "gobblerpedia.org":
        #case "gobblerpedia.oss":
            require_once "LocalSettings_gobblerpedia.php";
            break;

        case "uniluug.org":
        #case "uniluug.oss":
            require_once "LocalSettings_uniluug.php";
            break;

        #case "vt.uniluug.org":
        #case "vt.uniluug.oss":
            require_once "LocalSettings_vt.php";
            break;

        #case "virginia.uniluug.org":
        #case "virginia.uniluug.oss":
            require_once "LocalSettings_virginia.php";
            break;

        #case "vtluug.ing":
        case "vtluug.org":
        #case "vtluug.oss":
            require_once "LocalSettings_vtluug.php";
            break;

        default:
            require_once "LocalSettings_gobblerpedia.php";
            break;
            #MJH echo "This wiki is not available. Check configuration.";
            #MJH exit(0);
    }
# }}}


#$wgUsePrivateIPs = true;
$wgSquidServersNoPurge = array( '10.99.0.150' );
    
# ReCAPTCHA {{{
#require_once( "$IP/extensions/ConfirmEdit/ConfirmEdit.php" );
#require_once( "$IP/extensions/ConfirmEdit/ReCaptcha.php");
#$wgCaptchaClass			= 'ReCaptcha';
#$wgReCaptchaPublicKey	= '6LfaIAkAAAAAAO2s3ccrlonNr6fyvWjdyLPtC-gT';
#$wgReCaptchaPrivateKey	= '6LfaIAkAAAAAAFmukcXgPnXfNfhUQu6wYZtNYphu';
#
## Fix CAPTCHA behavior
#$wgGroupPermissions['*'            ]['skipcaptcha'] = false;
#$wgGroupPermissions['vtluug'       ]['skipcaptcha'] = true;
#$wgGroupPermissions['bot'          ]['skipcaptcha'] = true; // registered bots
#$wgGroupPermissions['sysop'        ]['skipcaptcha'] = true;
#
#$wgCaptchaTriggers['edit']          = true;
#$wgCaptchaTriggers['create']        = true;
#$wgCaptchaTriggers['createaccount'] = true;
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['autocreateaccount'] = true;

# Whitelist local IP ranges
$wgCaptchaWhitelistIP = array(
    # Citizens
    '66.37.64.0/19',
    '216.222.128.0/20',
    '2001:4828::/32',

    # Comcast
    # 24.127.21.67
    '70.89.236.240/29',
    '71.62.0.0/16',
    '71.63.0.0/17',
    '98.249.0.0/18',

    # NTC
    '204.111.128.0/19',
    '204.111.160.0/21',
    '204.111.168.0/22',

    # Shentel
    '24.49.0.0/19',         # jetbroadband

    # Verizon
    '72.66.160.0/19',
    '72.66.192.0/18',

    # Virginia Tech NCR
    '8.15.250.0/24',        # 1001/1021 Prince Street and 205 S. Patrick Street
    '8.15.252.0/24',        # Equine Medical Center (WARNING: Zmuda)
    '8.18.53.0/24',         # Occoquan Lab
    '8.18.56.0/24',         # 901 Prince Street, Alexandria
    '8.30.64.0/20',         # Virginia Tech Research Center, Arlington
    '208.22.18.0/24',       # Northern Virginia Center
    '208.29.54.0/24',       # Northern Virginia Center
    '204.248.204.0/24',     # Northern Virginia Center wifi

    # Virginia Tech Outreach
    '63.164.28.0/24',       # VTACS
    '63.164.29.0/24',       # Inn at Virginia Tech
    '63.164.30.0/23',       # Inn at Virginia Tech
    '195.176.186.64/28',    # CESA, Switzerland
    '198.69.172.0/24',      # Roanoke Education Center
    '208.16.73.0/24',       # Richmond Outreach Office
    '206.105.198.0/24',     # Richmond Graduate Center
    '208.22.128.0/19',      # Virginia Cooperative Extension
    '208.22.130.0/24',      # Hampton Roads Higher Ed and Extension Center

    # Virginia Tech
    '128.173.0.0/16',
    '198.82.0.0/16',
    '2001:468:c80::/48',
    '2607:b400::/32',
);
# }}}

# Require valid email addresses at signup
#$wgEmailConfirmToEdit = true;

# Autoconfirm users after 1 day
$wgAutoConfirmAge = 86400;

$wgGroupPermissions['*'             ]['move'      ] = false;
$wgGroupPermissions['*'             ]['edit'      ] = false;
$wgGroupPermissions['*'             ]['createpage'] = false;
$wgGroupPermissions['*'             ]['createtalk'] = false;
$wgGroupPermissions['autoconfirmed' ]['move'      ] = true;
$wgGroupPermissions['autoconfirmed' ]['edit'      ] = true;
$wgGroupPermissions['autoconfirmed' ]['createpage'] = true;
$wgGroupPermissions['autoconfirmed' ]['createtalk'] = true;

# Block and nuke extension
require_once "$IP/extensions/BlockAndNuke/BlockandNuke.php";
$wgWhitelist = ("$IP/extensions/BlockAndNuke/whitelist.txt");


/*require_once('includes/GlobalFunctions.php');
require_once('includes/IP.php');
function allowIP($ip, $ranges)
{
	foreach($ranges as $range)
	{
		if(IP::isInRange($ip, $range))
			return true;
	}

	return false;
}

$wgGroupPermissions['*']['edit'] = allowIP($_SERVER['REMOTE_ADDR'], $wgCaptchaWhitelistIP);
$wgGroupPermissions['user']['edit'] = allowIP($_SERVER['REMOTE_ADDR'], $wgCaptchaWhitelistIP);
$wgGroupPermissions['autoconfirmed']['edit'] = allowIP($_SERVER['REMOTE_ADDR'], $wgCaptchaWhitelistIP);*/

/*$wgAutopromote                  = array();
$wgAutopromote['autoconfirmed'] = array('&');

$wgAutopromote['autoconfirmed'][2] = array(
	APCOD_INGROUP, '

$wgAutopromote['autoconfirmed'][1] = array('|');
foreach($wgCaptchaWhitelistIP as $range)
{
	$wgAutopromote['autoconfirmed'][1][] = array(
		APCOND_IPINRANGE,
		$range,
	);
}*/

/*$wgSpamRegex = "/\<.*style.*?(display|position|overflow|visibility|height)\s*:.*?>/i";*/

# SpamBlacklist extension (https://www.mediawiki.org/wiki/Extension:SpamBlacklist)
#require_once( "$IP/extensions/SpamBlacklist/SpamBlacklist.php" );
#$wgSpamBlacklistFiles = array(
#    "$IP/extensions/SpamBlacklist/wikimedia_blacklist",
#);

# Nuke extension (https://www.mediawiki.org/wiki/Extension:Nuke)
wfLoadExtension("Nuke");

# SimpleAntiSpam extension (https://www.mediawiki.org/wiki/Extension:SimpleAntiSpam)
require_once("$IP/extensions/SimpleAntiSpam/SimpleAntiSpam.php");

# AntiBot extension (https://www.mediawiki.org/wiki/Extension:AntiBot)
require_once("$IP/extensions/AntiBot/AntiBot.php");

# AntiSpoof extension (https://www.mediawiki.org/wiki/Extension:AntiSpoof)
wfLoadExtension("AntiSpoof");

# AbuseFilter extension (https://www.mediawiki.org/wiki/Extension:AbuseFilter) {{{
wfLoadExtension("AbuseFilter");

$wgGroupPermissions['sysop']['abusefilter-modify'] = true;
$wgGroupPermissions['*']['abusefilter-log-detail'] = true;
$wgGroupPermissions['*']['abusefilter-view'] = true;
$wgGroupPermissions['*']['abusefilter-log'] = true;
$wgGroupPermissions['sysop']['abusefilter-private'] = true;
$wgGroupPermissions['sysop']['abusefilter-modify-restricted'] = true;
$wgGroupPermissions['sysop']['abusefilter-revert'] = true;

$wgAbuseFilterEmergencyDisableThreshold = array('default' => 1.00);
# }}}

# EmailDomainCheck (http://www.mediawiki.org/wiki/Extension:EmailDomainCheck) {{{
#require_once( "$IP/extensions/EmailDomainCheck/EmailDomainCheck.php" );
#$wgEmailDomain = 'vt.edu';
# }}}
# XXX: EmailDomainCheck is disabled because it was causing errors; we should
# encourage more widespread editing anyway.

# CategoryTree extension {{{
$wgUseAjax = true;
require_once( "$IP/extensions/CategoryTree/CategoryTree.php" );
$wgEnableMWSuggest = true;
# }}}

# Don't use rel='nofollow' as it doesn't actually prevent spam
$wgNoFollowLinks = false;

$wgDebugLogFile = "/var/log/nginx/mediawiki.log";
#$wgShowSQLErrors = true;
#$wgDebugDumpSql = true;
$wgDebugLogGroups = array(
    'AntiBot' => "/var/log/nginx/antibot.log",
    'SimpleAntiSpam' => "/var/log/nginx/antibot.log",
    'SpamBlacklistHit' => "/var/log/nginx/antibot.log",
    'ldap' => "/tmp/wikildap.log",
);

$wgEnableAPI = true;
$wgEnableWriteAPI = true;

