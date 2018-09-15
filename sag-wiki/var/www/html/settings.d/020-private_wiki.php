<?php

/**
 * Set up access restrictions
 */

# Stop unknown users to edit pages
$wgGroupPermissions['*']['createaccount']     = false;
$wgGroupPermissions['*']['edit']              = false;
$wgGroupPermissions['*']['read']              = true;

# All loged in users can edit MediaWiki:Sidebar
$wgGroupPermissions['user']['editinterface '] = true;

# Stop search engines (e.g. Google) to index the wiki.
$wgDefaultRobotPolicy                         = 'noindex,nofollow';

# To make Virtual Editor to work, Parsoid must have read and write access
# See https://www.mediawiki.org/wiki/User:Andru~mediawikiwiki/Allow_Parsoid_Server
if ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ) {
 $wgGroupPermissions['*']['read']             = true;
 $wgGroupPermissions['*']['edit']             = true;
}
