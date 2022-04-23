#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
CDIR=$( pwd )
cd $DIR
DIRNAME=$(dirname $DIR)
BASENAME=$(basename $DIRNAME)

docker-compose -f docker-compose.local.yml exec db psql -U postgres psql -d mapas

cd $CDIR