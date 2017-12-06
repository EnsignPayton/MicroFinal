// Final project script

// Starts a local stream on element 'video'
function startStream() {
	if (Hls.isSupported()) {
		var video = document.getElementById('video');
		var hls = new Hls();
		hls.loadSource('hls/mystream.m3u8');
		hls.attachMedia(video);
		hls.on(Hls.Events.MANIFEST_PARSED, function() {
			video.play();
		});
	}
	return true;
}

function ajaxSuccess(data, textStatus, xhr) {
	console.log("AJAX call was successful. Result: ");
	console.log(data);
}

function doAjaxCall(action) {
	console.log("Calling " + action);
	$.get('run.php', "action=" + action, ajaxSuccess);
}

function addEventHandlers() {
	$("#power").click(() => { doAjaxCall("power"); });
	$("#channelUp").click(() => { doAjaxCall("channelUp"); });
	$("#channelDown").click(() => { doAjaxCall("channelDown"); });
	$("#volumeUp").click(() => { doAjaxCall("volumeUp"); });
	$("#volumeDown").click(() => { doAjaxCall("volumeDown"); });
	$("#up").click(() => { doAjaxCall("up"); });
	$("#down").click(() => { doAjaxCall("down"); });
	$("#left").click(() => { doAjaxCall("left"); });
	$("#right").click(() => { doAjaxCall("right"); });
	$("#select").click(() => { doAjaxCall("select"); });
	$("#channel0").click(() => { doAjaxCall("channel0"); });
	$("#channel1").click(() => { doAjaxCall("channel1"); });
	$("#channel2").click(() => { doAjaxCall("channel2"); });
	$("#channel3").click(() => { doAjaxCall("channel3"); });
	$("#channel4").click(() => { doAjaxCall("channel4"); });
	$("#channel5").click(() => { doAjaxCall("channel5"); });
	$("#channel6").click(() => { doAjaxCall("channel6"); });
	$("#channel7").click(() => { doAjaxCall("channel7"); });
	$("#channel8").click(() => { doAjaxCall("channel8"); });
	$("#channel9").click(() => { doAjaxCall("channel9"); });
}

// Run startup code
$(function() {
	addEventHandlers();
	startStream();
});
