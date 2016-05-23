#!/bin/bash

echo "Installing SASS..."
gem install sass

echo "Installing Browserify..."
sudo npm install -g browserify

echo "Installing UglifyJS..."
sudo npm install uglify-js -g