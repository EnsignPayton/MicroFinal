<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Final Project</title>

		<!-- Style Includes -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="css/project.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h1>Remote Remote</h1>
				<p><em>Control your TV from anywhere</em></p>
			</div>
			<div class="row justify-content-md-center">
				<div class="col-md-8">
					<video id="video"></video>
				</div>
				<div class="col-md-4">
					<!-- Remote Here -->
					<div class="row">
						<div class="col-xs-4">
							<div class="btn-group-vertical btn-block" role="group">
								<button type="button" class="btn btn-primary" id="channelUp">Channel +</button>
								<button type="button" class="btn btn-primary" id="channelDown">Channel -</button>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="btn-group-vertical btn-block" role="group">
								<button type="button" class="btn btn-primary" id="volumeUp">Volume +</button>
								<button type="button" class="btn btn-primary" id="volumeDown">Volume -</button>
							</div>
						</div>
						<div class="col-xs-4">
							<button type="button" class="btn btn-primary btn-block" id="power">Power</button>
						</div>
					</div>
					<div class="row spacer"></div>
					<div class="row">
						<div class="col-xs-4">
							<div class="btn-group-vertical btn-block" role="group">
								<button type="button" class="btn btn-secondary disabled">&nbsp;</button>
								<button type="button" class="btn btn-primary" id="left">Left</button>
								<button type="button" class="btn btn-secondary disabled">&nbsp;</button>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="btn-group-vertical btn-block" role="group">
								<button type="button" class="btn btn-primary" id="up">Up</button>
								<button type="button" class="btn btn-primary" id="select">Select</button>
								<button type="button" class="btn btn-primary" id="down">Down</button>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="btn-group-vertical btn-block" role="group">
								<button type="button" class="btn btn-secondary disabled">&nbsp;</button>
								<button type="button" class="btn btn-primary" id="right">Right</button>
								<button type="button" class="btn btn-secondary disabled">&nbsp;</button>
							</div>
						</div>
					</div>
					<div class="row spacer"></div>
					<div class="row">
						<div class="col-xs-4">
							<div class="btn-group-vertical btn-block" role="group">
								<button type="button" class="btn btn-primary" id="channel1">1</button>
								<button type="button" class="btn btn-primary" id="channel4">4</button>
								<button type="button" class="btn btn-primary" id="channel7">7</button>
								<button type="button" class="btn btn-secondary disabled">&nbsp;</button>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="btn-group-vertical btn-block" role="group">
								<button type="button" class="btn btn-primary" id="channel2">2</button>
								<button type="button" class="btn btn-primary" id="channel5">5</button>
								<button type="button" class="btn btn-primary" id="channel8">8</button>
								<button type="button" class="btn btn-primary" id="channel0">0</button>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="btn-group-vertical btn-block" role="group">
								<button type="button" class="btn btn-primary" id="channel3">3</button>
								<button type="button" class="btn btn-primary" id="channel6">6</button>
								<button type="button" class="btn btn-primary" id="channel9">9</button>
								<button type="button" class="btn btn-secondary disabled">&nbsp;</button>
							</div>
						</div>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Script Includes -->
		<script src="js/jquery-3.2.1.min.js"></script>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
		<script src="js/project.js"></script>
	</body>
</html>

