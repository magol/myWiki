<?php

## Shared memory settings
# Enable database caching
$wgMainCacheType                              = CACHE_ACCEL;
$wgMemCachedServers                           = array();
$wgInvalidateCacheOnLocalSettingsChange       = true;

# Set the history for latest changed pages to 13 weeks
$wgRCMaxAge                                   = 13 * 7 * 24 * 3600;
# Set parser cache to 14 days
$wgParserCacheExpireTime                      = 14 * 24 * 3600;

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
$wgCacheDirectory                             = "/var/www/data/cache";

# Set this to the date of today to reconstruct all thumbnails
$wgThumbnailEpoch                             = "20170919154000";

# Enable generated page cache
$wgUseFileCache                               = true;
$wgFileCacheDirectory                         = "/var/www/data/cache";

# Run database works only each 10 request
$wgJobRunRate                                 = 0.1;
