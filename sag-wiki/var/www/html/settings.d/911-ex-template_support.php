<?php

/**
 * Scribunto
 * Used for infoboxes
 */
wfLoadExtension( 'Scribunto' );

# Select the engine. 
$wgScribuntoDefaultEngine                     = 'luastandalone';
/**
 * ParserFunctions
 */
wfLoadExtension( 'ParserFunctions' );
$wgPFEnableStringFunctions                    = true;

/**
 * TemplateSandbox
 * Test of templates
 * https://www.mediawiki.org/wiki/Extension:TemplateSandbox
 */
wfLoadExtension( 'TemplateSandbox' );

/**
 * TemplateStyles
 * Make it possible to use CSS in templates
 * https://www.mediawiki.org/wiki/Extension:TemplateStyles
 */
wfLoadExtension( 'TemplateStyles' );

/**
 * DebugTemplates
 * Create Special:DebugTemplates that are used for debugging of templates
 * https://www.mediawiki.org/wiki/Extension:DebugTemplates
 */
wfLoadExtension( 'DebugTemplates' );
