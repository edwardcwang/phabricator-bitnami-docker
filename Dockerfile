# TODO: incomplete

FROM ubuntu:20.04
MAINTAINER Edward Wang <edward.c.wang@compdigitec.com>

# Basic tools & Phabricator dependencies
RUN apt-get update && apt-get install -y vim wget unzip sendmail imagemagick  git apache2 libapache2-mod-php php php-mysql php-gd php-curl php-apcu php-cli php-json php-mbstring

# Grab Phabricator
# Current revision: Apr 2021
RUN wget https://github.com/phacility/phabricator/archive/95662ae8f1a76eca66b024a11a21f5c5e8a7e01e.zip
RUN unzip *.zip
RUN mv phabricator-* phabricator

RUN conf/custom/exampleconfig.conf.php

# Tell Phabricator to use the custom config.
RUN echo custom/dockerconfig > conf/local/ENVIRONMENT

WORKDIR /var/lib/buildbot
CMD ["dumb-init", "/usr/src/buildbot/docker/start_buildbot.sh"]
