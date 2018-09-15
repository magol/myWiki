FROM mediawiki:latest

RUN apt-get update                          && \
    apt-get install -y --no-install-recommends \
        # Required by Extension:PdfHandler
        ghostscript                            \
        # Required for Extension:GraphViz
        graphviz                               \
        # Required by ImageMagic to handle SVG files
        librsvg2-bin                           \
        # Required for LC_ALL=sv_SE
        locales                                \
        # Required for Extension:GraphViz
        mscgen                                 \
        # For mysqldump (not required for wiki)
        mysql-client                           \
        # Required by Extension:PdfHandler
        poppler-utils                          \
        # For autostart of processers
        supervisor                             \
        # Not required, but great to have
        vim                                 && \
    rm -r /var/lib/apt/lists/*              && \
    a2enmod rewrite                            \
            proxy                              \
            proxy_http

ENV TZ=Europe/Stockholm

# Configure timezone and locale
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime                           && \
    echo $TZ                                           > /etc/timezone       && \
    dpkg-reconfigure -f noninteractive tzdata                                && \
    sed -i -e 's/# en_US.UTF-8 UTF-8/en_US.UTF-8 UTF-8/' /etc/locale.gen     && \
    sed -i -e 's/# sv_SE.UTF-8 UTF-8/sv_SE.UTF-8 UTF-8/' /etc/locale.gen     && \
    dpkg-reconfigure --frontend=noninteractive locales                       && \
    update-locale LANG=sv_SE.UTF-8

ENV LANG sv_SE.UTF-8 

#Extensions
WORKDIR /var/www/html/extensions/
RUN rm -rf /var/www/html/extensions/*                                                                                        && \
    printf "%s\n"                                                                                                               \
           "CategoryTree"                                                                                                       \
           "Cite"                                                                                                               \
           "CodeEditor"                                                                                                         \
           "DebugTemplates"                                                                                                     \
           "Disambiguator"                                                                                                      \
           "Gadgets"                                                                                                            \
           "GraphViz"                                                                                                           \
           "ImageMap"                                                                                                           \
           "Interwiki"                                                                                                          \
           "LabeledSectionTransclusion"                                                                                         \
           "Linter"                                                                                                             \
           "Math"                                                                                                               \
           "MultimediaViewer"                                                                                                   \
           "ParserFunctions"                                                                                                    \
           "PdfHandler"                                                                                                         \
           "Poem"                                                                                                               \
           "ProofreadPage"                                                                                                      \
           "ReplaceText"                                                                                                        \
           "Scribunto"                                                                                                          \
           "SyntaxHighlight_GeSHi"                                                                                              \
           "TemplateData"                                                                                                       \
           "TemplateSandbox"                                                                                                    \
           "TemplateStyles"                                                                                                     \
           "VisualEditor"                                                                                                       \
           "WikiEditor"                                                                                                       | \
    xargs -n1 -P0 -I{} git clone --depth 1 -b $MEDIAWIKI_BRANCH https://gerrit.wikimedia.org/r/p/mediawiki/extensions/{}.git && \
    cd VisualEditor && git submodule update --init && cd ..                                                                  && \
    sed -i -e "s/static \$validNamespaces = \[/static \$validNamespaces = \[\'http:\/\/www.w3.org\/1999\/xhtml\',/" /var/www/html/includes/upload/UploadBase.php

# ------------------------
# Use the /home directory for persistent storage
# ------------------------
RUN rm -rf   /var/log/apache2                                     \
             /var/log/supervisor                                  \
             /var/log/mediawiki                                   \
             /var/www/html/images                              && \
    mkdir -p /home/LogFiles/apache2                               \
             /var/log/supervisor                                  \
             /home/LogFiles/mediawiki                             \
             /home/mediawiki/images                               \
             /var/www/data/cache                               && \
    chown -R www-data:www-data            /var/www/data/cache  && \
    ln -s /home/LogFiles/apache2          /var/log/apache2     && \
    ln -s /home/LogFiles/mediawiki        /var/log/mediawiki   && \
    ln -s /home/mediawiki/images          /var/www/html/images && \
    ln -s /home/LogFiles/bash_history     /root/.bash_history

COPY .                                    /

RUN  echo "Include /etc/apache2/mediawiki.conf" >> /etc/apache2/apache2.conf && \
     sed -e '2i\\tsu root root' -i /etc/logrotate.d/apache2                  && \
     chmod 755 /init_container.sh                                            && \
     chmod 755 /cron_mediawiki.sh                                            && \
     chmod 755 /cron_backup.sh                                               && \
     chmod 755 /root/*.sh                                                    && \
     chmod 777 /var/log/supervisor                                           && \
     chmod 700 /var/www/data/cache

ENV PATH ${PATH}:/var/www/html

WORKDIR /var/www/html

CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]
