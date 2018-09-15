<?php

$wgSitename                                   = "SAG wiki";
$wgMetaNamespace                              = "Project";

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo                                       = "$wgScriptPath/logo.png";

# Set to true to have nicer highlighted text in search results. Off by default due to execution overhead.
$wgAdvancedSearchHighlighting                 = true;

# Show how many edits a user have done
$wgEdititis                                   = true;

# Active the new filter function in Special:Watchlist
$wgStructuredChangeFiltersOnWatchlist         = true;

# Use sagwiki as "meta namespace" instead of "project"
$wgMetaNamespace                              = 'sagwiki';

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage                                 = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl                                  = ""; 
$wgRightsText                                 = "";
$wgRightsIcon                                 = "";
$wgAjaxLicensePreview                         = false;
