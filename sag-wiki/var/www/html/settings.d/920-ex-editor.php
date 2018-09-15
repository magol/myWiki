<?php

 /**
 * VisualEditor
 * https://www.mediawiki.org/wiki/Extension:VisualEditor
 */

wfLoadExtension( 'VisualEditor' );

####
# Visual mode
####
# Enable by default for everybody
$wgDefaultUserOptions['visualeditor-enable']              = true;

####
# Wikitext mode
####
# Whether to enable the wikitext source mode inside VisualEditor.
# Set to true when it is possible to preview the edits in wiki text
$wgVisualEditorEnableWikitext                             = false;
# Use VE as default for new wiki pages
# Doesn't work as expected. The page must reload when the wiki editor are loaded.'
#$wgDefaultUserOptions['visualeditor-newwikitext']         = true;

####
# Single edit tab
####
# Whether to use only one edit tab, switching back and forth, or add a dedicated VisualEditor edit tab next to the existing one.
# Note that the bi-directional switching functionality requires RESTbase installation rather than talking directly to Parsoid.
#
# TODO: Set to true when RESTbase works in private wikis
# See https://phabricator.wikimedia.org/T88016
$wgVisualEditorUseSingleEditTab                           = false;
# Set VisualEditor as the default when $wgVisualEditorUseSingleEditTab==true, otherwise they will have to switch to VE
$wgDefaultUserOptions['visualeditor-editor']              = "visualeditor";

####
# Visual diffs on history pages
####
# Visual diffs on history pages
$wgVisualEditorEnableDiffPage                             = true;

####
# Other settings
####
# OPTIONAL: Enable VisualEditor's experimental code features
$wgDefaultUserOptions['visualeditor-enable-experimental'] = true;

# Whether to put a change tag on every edit made with VisualEditor.
$wgVisualEditorUseChangeTagging                           = false;

# Whether to enable the (currently experimental) Table Of Contents widget
$wgVisualEditorEnableTocWidget                            = true;


$wgVirtualRestConfig['modules']['parsoid'] = array(
    # URL to the Parsoid instance
    # Use port 8142 if you use the Debian package
    'url'                   => getenv( 'MEDIAWIKI_PARSOID_URL' ),
    # Wiki domain to use (string)
    'domain'                => 'localhost',
    # Parsoid "prefix", see below (optional)
    'prefix'                => 'localhost'
);

$wgVirtualRestConfig['modules']['restbase'] = array(
    # RESTBase server URL (string)
	'url' => getenv( 'MEDIAWIKI_SERVER' ).'/api/rest_v1',
    # Wiki domain to use (string)
	'domain' => 'localhost', # matches the "domain" used above
    # Cookies to forward to RESTBase/Parsoid (string or false, optional)
	'forwardCookies' => true,
    # Wwhether to parse URL as if they were meant for Parsoid (boolean, optional)
	'parsoidCompat' => false
);
$wgVisualEditorRestbaseURL     = getenv( 'MEDIAWIKI_SERVER' ).'/api/rest_v1/page/html/';
$wgVisualEditorFullRestbaseURL = getenv( 'MEDIAWIKI_SERVER' ).'/api/rest_';


$wgVisualEditorAvailableNamespaces = [
    NS_MAIN                 => true,  # default
    NS_TALK                 => true,
    NS_USER                 => true,  # default
    NS_USER_TALK            => true,
    NS_PROJECT              => true,
    NS_PROJECT_TALK         => true,
    NS_FILE                 => true,  # default
    NS_FILE_TALK            => true,
    NS_MEDIAWIKI            => true,
    NS_MEDIAWIKI_TALK       => true,
    NS_TEMPLATE             => true,
    NS_TEMPLATE_TALK        => true,
    NS_HELP                 => true,
    NS_HELP_TALK            => true,
    NS_CATEGORY             => true,  # default
    NS_CATEGORY_TALK        => true,
    NS_PROOFREAD_PAGE       => true,  # default
    NS_PROOFREAD_PAGE_TALK  => true,
    NS_PARM                 => true,
    NS_PARM_TALK            => true,
    "_merge_strategy"       => "array_plus"
];

#######################################################################
/**
 * WikiEditor
 */

wfLoadExtension( 'WikiEditor' );

# Enables use of WikiEditor by default but still allows users to disable it in preferences
$wgDefaultUserOptions['usebetatoolbar']       = 1;

# Enables link and table wizards by default but still allows users to disable them in preferences
$wgDefaultUserOptions['usebetatoolbar-cgd']   = 1;

# Displays the Preview and Changes tabs
$wgDefaultUserOptions['wikieditor-preview']   = 1;

# Displays the Publish and Cancel buttons on the top right side
$wgDefaultUserOptions['wikieditor-publish']   = 1;

#######################################################################
/**
 * TemplateData
 */
wfLoadExtension( 'TemplateData' );
$wgTemplateDataUseGUI                         = true;

#######################################################################
/**
 * CodeEditor
 * Syntax color for CSS, JS and Lua
 * https://www.mediawiki.org/wiki/Extension:CodeEditor
 */
wfLoadExtension( 'CodeEditor' );

# User option provided by WikiEditor extension
$wgDefaultUserOptions['usebetatoolbar'] = 1;
# When Extension:Scribunto and Extension:SyntaxHighlight is installed,
# set this true to use CodeEditor when displaying Module pages.
$wgScribuntoUseGeSHi                          = true;
# When Extension:Scribunto is installed,
# set this true to use CodeEditor when editing Module pages.
$wgScribuntoUseCodeEditor                     = true;
