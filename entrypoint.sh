#!/usr/bin/env bash

# Ensure /.composer exists and is writable
if [ ! -d /.composer ]; then
    mkdir /.composer
fi

chmod -R ugo+rw /.composer

/usr/bin/supervisord
