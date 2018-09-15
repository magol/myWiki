<?php

/**
 * Add my own namespace
 */

define("NS_PARM", 4000);
define("NS_PARM_TALK", 4001);

// Set name on namespace
$wgExtraNamespaces[NS_PARM] = "Pärm";
$wgExtraNamespaces[NS_PARM_TALK] = "Pärmdiskussion";

# Allow suppages under the namespace
$wgNamespacesWithSubpages[NS_PARM] = true;

# The new namespace is a normal article, and the count over number of articles is counting pages under this namespace
$wgContentNamespaces[] = NS_PARM;
