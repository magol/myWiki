<?php


/**
 * ImageMap
 * Required by GraphViz
 */
wfLoadExtension( 'ImageMap' );

/**
 * GraphViz
 * Generating graphical images
 * https://www.mediawiki.org/wiki/Extension:GraphViz
 */
wfLoadExtension( 'GraphViz' );

$wgGraphVizSettings->createCategoryPages      = "yes";

/**
 * MultimediaViewer
 * Interface for viewing full-size images
 * https://www.mediawiki.org/wiki/Extension:MultimediaViewer
 */
wfLoadExtension( 'MultimediaViewer' );
