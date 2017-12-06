#!/bin/bash

if [[ $# -eq 0 ]] ; then
	echo 'No arguments specified'
	exit 1
fi

# Action argument should be available in $1
ACTION="$1"
IRSEND="irsend SEND_ONCE SAMSUNG"


case ${ACTION} in
	"channelUp") $IRSEND KEY_CHANNELUP
	;;
	"channelDown") $IRSEND KEY_CHANNELDOWN
	;;
	"volumeUp") $IRSEND KEY_VOLUMEUP
	;;
	"volumeDown") $IRSEND KEY_VOLUMEDOWN
	;;
	"power") $IRSEND KEY_POWER
	;;
	"up") $IRSEND KEY_UP
	;;
	"down") $IRSEND KEY_DOWN
	;;
	"left") $IRSEND KEY_LEFT
	;;
	"right") $IRSEND KEY_RIGHT
	;;
	"select") $IRSEND KEY_SELECT
	;;
	"channel0") $IRSEND BTN_0
	;;
	"channel1") $IRSEND BTN_1
	;;
	"channel2") $IRSEND BTN_2
	;;
	"channel3") $IRSEND BTN_3
	;;
	"channel4") $IRSEND BTN_4
	;;
	"channel5") $IRSEND BTN_5
	;;
	"channel6") $IRSEND BTN_6
	;;
	"channel7") $IRSEND BTN_7
	;;
	"channel8") $IRSEND BTN_8
	;;
	"channel9") $IRSEND BTN_9
	;;
esac

