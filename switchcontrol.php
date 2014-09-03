<?php
// Systemcode
$systemCode = "01110";

// Get parameter
$getSwitch = $_GET['switch'];
$getTargetState = $_GET['state'];
$livingRoomLights = 0;
$alvinRoomLights = 0;
$onstate = 1;
$getSwitch1 = $_GET['switch1'];
$getSwitch2 = $_GET['switch2'];

// Make it safe
switch($getSwitch) {
	case "a":
		$switch = 1;
		break;
	case "b":
		$switch = 2;
		break;
	case "c":
		$switch = 3;
		break;
	case "d":
		$switch = 4;
		break;
	case "e":
		$switch = 5;
		break;
	case"f":
		$switch1 = 1;
		$switch2 = 5;
		break;
	case"g":
		$switch1 =  2;
		$switch2 = 3;
		break;
	default:
		die("ERROR");
}

// Call rcswitch
if($getTargetState === '1') {
	shell_exec('sudo /home/pi/div/rcswitch-pi/send '.$switch.' 1');
	echo "SUCCESS";
} elseif ($getTargetState === '0') {
	shell_exec('sudo /home/pi/div/rcswitch-pi/send '.$switch.' 0');
	echo "SUCCESS";
} elseif ($getTargetState === '2') {
	for ($x=0; $x<=8; $x++) {
		$rand1 = rand(0,1);
		$rand2 = rand(0,1);
		shell_exec('sudo /home/pi/div/rcswitch-pi/send '.$switch1.' '.$rand1.'');
		shell_exec('sudo /home/pi/div/rcswitch-pi/send '.$switch2.' '.$rand2.'');

		//shell_exec('sudo /home/pi/div/rcswitch-pi/send '.$switch1.' 1');
		//shell_exec('sudo /home/pi/div/rcswitch-pi/send '.$switch2.' 1');
	}

	shell_exec('sudo /home/pi/div/rcswitch-pi/send '.$switch1.' 1');
	shell_exec('sudo /home/pi/div/rcswitch-pi/send '.$switch2.' 1');
} elseif ($getTargetState === '3') {
	for ($x=0; $x<=8; $x++) {
		$rand1 = rand(0,1);
		$rand2 = rand(0,1);
		shell_exec('sudo /home/pi/div/rcswitch-pi/send '.$switch1.' '.$rand1.'');
		shell_exec('sudo /home/pi/div/rcswitch-pi/send '.$switch2.' '.$rand2.'');
	}
	shell_exec('sudo /home/pi/div/rcswitch-pi/send '.$switch1.' 0');
	shell_exec('sudo /home/pi/div/rcswitch-pi/send '.$switch2.' 0');
	
} else {
	die("ERROR");
}


?>
