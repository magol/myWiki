#!/bin/bash

mkdir -p /home/LogFiles/apache2    \
         /home/LogFiles/supervisor \
         /home/LogFiles/mediawiki \
         /home/mediawiki/images

chown -R www-data:www-data /home/mediawiki/images

cat <<EOT >> /etc/apache2/envvars
: \${MEDIAWIKI_RESTBASE_URL:=$MEDIAWIKI_RESTBASE_URL}
export MEDIAWIKI_RESTBASE_URL
EOT

touch /var/log/apache2/access.log
echo "$(date) Container started" >> /var/log/apache2/access.log
