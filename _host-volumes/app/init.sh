#!/bin/sh

echo [YII_ENTRYPOINT]: started
./yii migrate --interactive=0

echo [YII_ENTRYPOINT]: done
