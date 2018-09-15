#!/bin/bash

set -e
cd $RB_HOME


OPTS="-n 1"

su -c 'node server -c config.yaml $OPTS' $RB_USER
