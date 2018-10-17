<?php
$wgSitename = 'gobblerpedia';
$wgMetaNamespace = 'Gobblerpedia';

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = '/w';

## The protocol and server name to use in fully-qualified URLs
$wgServer = 'https://gobblerpedia.org';

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/images/gobblerpedia.org/gobblerpedia.png";
$wgFavicon = "$wgResourceBasePath/images/gobblerpedia.org/favicon.png";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ''; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = 'http://creativecommons.org/licenses/by-sa/3.0/us/';
$wgRightsText = 'Attribution-ShareAlike 3.0 United States';
$wgRightsIcon = "$wgResourceBasePath/images/cc-by-sa-88x31.png";
