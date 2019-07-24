#!/usr/bin/env bash

cd ~/.composer/vendor/psr/log/Psr/Log/ || exit

for i in *.php ; do
    echo "$i"
done
