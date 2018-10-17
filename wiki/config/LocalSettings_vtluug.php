<?php
$wgSitename = "Linux and Unix Users Group at Virginia Teck Wiki";
$wgMetaNamespace = "vtluug";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = '/w';
$wgArticlePath = "/wiki/$1";
$wgUsePathInfo = true;

## The protocol and server name to use in fully-qualified URLs
$wgServer = 'https://wiki.vtluug.org';

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/images/vtluug.org/VTLUUG_Wiki.png";
$wgAppleTouchIcon = "$wgResourceBasePath/images/vtluug.org/apple-icon.png";
$wgFavicon = "$wgResourceBasePath/images/vtluug.org/favicon.png";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = 'Linux_and_Unix_Users_Group_at_Virginia_Tech_Wiki:License';
$wgRightsUrl = 'http://creativecommons.org/licenses/by-sa/3.0/us/';
$wgRightsText = 'Attribution-Share Alike 3.0 United States';
$wgRightsIcon = "$wgResourceBasePath/images/cc-by-sa.png";
