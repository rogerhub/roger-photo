#!/bin/sh
if [ -e scss/style.scss ]
then
	sass --scss --style compressed scss/style.scss style.css
else
	echo "Could not find input scss/ryuc.scss."
fi
