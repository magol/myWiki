FROM node:10.10.0-stretch

ENV PARSOID_BASE=/usr/lib/parsoid                                                                                    \
    PARSOID_HOME=/usr/lib/parsoid/src                                                                                \
    NODE_PATH=/usr/lib/parsoid/node_modules:/usr/lib/parsoid/src                                                     \
    PARSOID_USER=parsoid

# ------------------------
# Install Parsoid
# See https://www.mediawiki.org/wiki/Parsoid/Setup#Ubuntu_/_Debian
# ------------------------
RUN apt-get update                                                                                                && \
    apt-get install -y --no-install-recommends dirmngr apt-transport-https gnupg curl iputils-ping                && \
    useradd -U -r --no-create-home --home-dir $PARSOID_BASE --shell /bin/bash $PARSOID_USER                       && \
    NGINX_GPGKEY=90E9F83F22250DD7;                                                                                   \
    found='';                                                                                                        \
    for server in                                                                                                    \
        hkp://keys.gnupg.net:80                                                                                      \
        hkp://ha.pool.sks-keyservers.net:80                                                                          \
        hkp://keyserver.ubuntu.com:80                                                                                \
        hkp://p80.pool.sks-keyservers.net:80                                                                         \
        hkp://pgp.mit.edu:80                                                                                         \
    ; do                                                                                                             \
        echo "Fetching GPG key $NGINX_GPGKEY from $server";                                                          \
        apt-key adv --keyserver "$server" --keyserver-options timeout=10 --recv-keys "$NGINX_GPGKEY" && found=yes && break; \
    done;                                                                                                            \
    test -z "$found" && echo >&2 "error: failed to fetch GPG key $NGINX_GPGKEY" && exit 1;                           \
    echo "deb https://releases.wikimedia.org/debian jessie-mediawiki main" > /etc/apt/sources.list.d/parsoid.list && \
    apt-get update                                                                                                && \
    apt-get install -y --no-install-recommends                                                                       \
        # Required by Extension:VirtualEditor
        parsoid                                                                                                   && \
    rm -r /var/lib/apt/lists/*

COPY run-parsoid.sh /run-parsoid.sh
RUN chmod -v +x /run-parsoid.sh

EXPOSE 8000
CMD ["/run-parsoid.sh"]
