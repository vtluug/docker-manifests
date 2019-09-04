<?php
$wgSitename = 'Gobblerpedia';
$wgMetaNamespace = 'Gobblerpedia';

## The protocol and server name to use in fully-qualified URLs
$wgServer = 'https://gobblerpedia.org';

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "{$wgUploadPath}/gobblerpedia.png";
$wgFavicon = "{$wgUploadPath}/favicon.png";

# Google => Gobblerpedia only
$wgPluggableAuth_ButtonLabelMessage = 'VTLUUG/Google SSO';
$wgOpenIDConnect_Config['https://accounts.google.com'] = [
    'clientID'     => getenv('ODIC_GOOGLE_ID'),
    'clientsecret' => getenv('ODIC_GOOGLE_SECRET'),
    'name'         => 'Google SSO',
    'scope'        => ['openid', 'profile', 'email']
];

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ''; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = 'http://creativecommons.org/licenses/by-sa/3.0/us/';
$wgRightsText = 'Attribution-ShareAlike 3.0 United States';
$wgRightsIcon = "{$wgResourceBasePath}/images/cc-by-sa-88x31.png";
