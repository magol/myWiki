<?php

/**
 * Interwiki
 * Create the Special:Interwiki page to make it possible to customize linking to other wikis
 * https://www.mediawiki.org/wiki/Extension:Interwiki
 */
wfLoadExtension( 'Interwiki' );
# To grant sysops permissions to edit interwiki data
$wgGroupPermissions['sysop']['interwiki']     = true;

/**
 * Disambiguator
 * Add extended support for disambiguate pages with the magic work __DISAMBIG__
 * https://www.mediawiki.org/wiki/Extension:Disambiguator
 */
wfLoadExtension( 'Disambiguator' );
