#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
CDIR=$( pwd )
cd $DIR
DIRNAME=$(dirname $DIR)
BASENAME=$(basename $DIRNAME)

docker exec -it $BASENAME sh /var/www/scripts/shell.sh

cd $CDIR