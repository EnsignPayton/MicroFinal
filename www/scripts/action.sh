#!/bin/bash

if [[ $# -eq 0 ]] ; then
	echo 'No arguments specified'
	exit 1
fi

# Action argument should be available in $1
action="$1"

case ${action} in
	"channelUp") echo ""
	;;
	"channelDown") echo ""
	;;
	"volumeUp") echo ""
	;;
	"volumeUp") echo ""
	;;
	"power") echo ""
	;;
	"up") echo ""
	;;
	"down") echo ""
	;;
	"left") echo ""
	;;
	"right") echo ""
	;;
	"select") echo ""
	;;
	"channel0") echo ""
	;;
	"channel1") echo ""
	;;
	"channel2") echo ""
	;;
	"channel3") echo ""
	;;
	"channel4") echo ""
	;;
	"channel5") echo ""
	;;
	"channel6") echo ""
	;;
	"channel7") echo ""
	;;
	"channel8") echo ""
	;;
	"channel9") echo ""
	;;
esac

