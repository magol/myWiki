<?php
/* Gadgets
 *
 * https://www.mediawiki.org/wiki/Extension:Gadgets
 */
wfLoadExtension( 'Gadgets' );


/* ReplaceText
 *
 * Create Special:ReplaceText that make it possible to search and replace in all pages with RegExp
 *
 * https://www.mediawiki.org/wiki/Extension:Replace_Text
 */
wfLoadExtension( 'ReplaceText' );
$wgGroupPermissions['bureaucrat']['replacetext'] = true;
