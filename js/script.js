$(document).ready(function() {
	// Status of the raspberry pi
	$.serverObserver.enable({
		url: "http://192.168.1.13",
		frequency: 2000,
		onServerOnline: function() {
			$('.navbar-status').html('<span class="badge alert-success">online</span>');
		},
		onServerOffline: function() {
			$('.navbar-status').html('<span class="badge alert-important">offline</span>');
			console.log('OFFLINE');
		}
	});


	// Each button has a letter identifier
	$('.switchButton').each(function(index, button) {
		button = $(button);
		// Get letter, currently from range of a-g
		var regexSwitchID = /switch-([a-g])/;
		var switchID = regexSwitchID.exec(button.attr('class'))[1];
		
		if(button.hasClass('on')) {
			button.click(function() {
				turnOn(switchID);
			});
		}
		if(button.hasClass('off')) {
			button.click(function() {
				turnOff(switchID);
			});
		}
		if(button.hasClass('swag-on')){
			button.click(function() {
				turnOnSwag(switchID);
			});
		}
		if(button.hasClass('swag-off')){
			button.click(function() {
				turnOffSwag(switchID);
			});
		}
	});
});

function turnOn(switchID) {
	callSwitchControl(switchID, 1);
}

function turnOff(switchID) {
	callSwitchControl(switchID, 0);
}

function turnOnSwag(switchID) {
	callSwitchControl(switchID, 2);
}

function turnOffSwag(switchID) {
	callSwitchControl(switchID, 3);
}


function callSwitchControl(switchID, state) {
	$.get( 'switchcontrol.php', {
			'switch': switchID,
			state: state
		});
}

//Possible future feature
function callSwagControl(switchID1, switchID2, state) {
	$.get( 'switchcontrol.php', {
			'switch1': switchID1,
			'switch2': switchID2,
			state: state
		});
}
