<?php

/**
 * Activate and customize handling of e-mail
 *
 * UPO means: this is also a user preference option
 */

$wgEnableEmail                                = true;
$wgEnableUserEmail                            = true; # UPO

$wgEmergencyContact                           = "apache@getenv( 'MEDIAWIKI_SERVER' )";
$wgPasswordSender                             = "apache@getenv( 'MEDIAWIKI_SERVER' )";

$wgEnotifUserTalk                             = true; # UPO
$wgEnotifWatchlist                            = false; # UPO
$wgEmailAuthentication                        = true;
