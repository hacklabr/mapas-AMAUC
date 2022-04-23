#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
CDIR=$( pwd )
cd $DIR
DIRNAME=$(dirname $DIR)
BASENAME=$(basename $DIRNAME)

docker exec -it $BASENAME bash

cd $CDIR