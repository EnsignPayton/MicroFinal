#!/bin/bash

if [[ $# -eq 0 ]] ; then
	echo 'No arguments specified'
	exit 1
fi

# Action argument should be available in $1
echo $1
