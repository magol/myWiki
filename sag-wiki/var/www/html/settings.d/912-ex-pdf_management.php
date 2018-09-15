<?php

/**
 * PdfHandler
 */
wfLoadExtension( 'PdfHandler' );

/**
 * LabeledSectionTransclusion
 * 
 * Required by Extension:Proofread Page
 */
wfLoadExtension( 'LabeledSectionTransclusion' );

/**
 * ProofreadPage
 */
wfLoadExtension( 'ProofreadPage' );

define( 'NS_PROOFREAD_PAGE', 250);
define( 'NS_PROOFREAD_PAGE_TALK', 251);
define( 'NS_PROOFREAD_INDEX', 252);
define( 'NS_PROOFREAD_INDEX_TALK', 253);

$wgFileExtensions = array_merge(
    $wgFileExtensions, array(
        'pdf', 'djvu'
    )
);
$wgDjvuDump                                   = "djvudump";
$wgDjvuRenderer                               = "ddjvu";
$wgDjvuTxt                                    = "djvutxt";
$wgDjvuPostProcessor                          = "ppmtojpeg";
$wgDjvuOutputExtension                        = 'jpg';

/**
 * Cite
 * Handling references
 * https://www.mediawiki.org/wiki/Extension:Cite
 */
wfLoadExtension( 'Cite' );
