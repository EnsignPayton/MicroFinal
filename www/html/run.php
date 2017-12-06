<?php
// Grab an action parameter
$action = "";
if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	exit("No action specified");
}

// Pipe the action to a shell script
$message=shell_exec("/var/www/scripts/action.sh {$action} 2>&1");
print_r($message);

?>
