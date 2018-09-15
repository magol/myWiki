<?php

/**
 * Activate and customize uploading of files and images
 */

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads                              = true;
$wgUseImageMagick                             = true;
$wgAllowTitlesInSVG                           = true;
$wgDisableUploadScriptChecks                  = true;
$wgSVGConverter                               = "ImageMagick";
$wgImageMagickConvertCommand                  = "/usr/bin/convert";
$wgMaxUploadSize                              = 209715200;
## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
#
# Due to a bug, sv_SE.utf8 cannot be used as srcset become wrongly formated.
# See https://phabricator.wikimedia.org/T181987
# TODO: Restore to sv_SE.utf8 when the bug is fixed.
#$wgShellLocale                                = "sv_SE.utf8";
$wgShellLocale                                = "C.UTF-8";

# Make it possible to upload svg files in addition to other allowed files.
$wgFileExtensions = array_merge(
    $wgFileExtensions, array(
        'svg'
    )
);

# Make it possible to link to local files on the local files server
$wgUrlProtocols[]                             = "file://";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons                          = true;
