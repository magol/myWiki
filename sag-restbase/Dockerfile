FROM node:latest

ENV RB_HOME=/var/lib/restbase \
    RB_DATA=/data             \
    RB_USER=restbase

# restbase setup
RUN set -x; \
    apt-get update                                                 && \
    apt-get install -y --no-install-recommends  curl iputils-ping  && \
    # Core
    mkdir -p $RB_HOME \
    && git clone \
        --single-branch \
        --depth 1 \
        --quiet \
        https://github.com/wikimedia/restbase.git \
        $RB_HOME \
    && cd $RB_HOME \
    && npm install \
    && useradd -U -r -s /bin/bash $RB_USER \
    && mkdir -p $RB_DATA \
    && chown -R $RB_USER:$RB_USER $RB_DATA

COPY run-restbase.sh /run-restbase.sh
RUN chmod -v +x /run-restbase.sh

COPY config.yaml $RB_HOME/config.yaml

EXPOSE 7231
CMD ["/run-restbase.sh"]
VOLUME $RB_DATA
