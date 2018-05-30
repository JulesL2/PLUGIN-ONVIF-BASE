var CAMERA_HOST = 'adresseip',
	USERNAME = 'username',
	PASSWORD = 'password',
	PORT = 'port';


var http = require('http'),
  	Cam = require('./onvif').Cam;

new Cam({
	hostname: CAMERA_HOST,
	username: USERNAME,
	password: PASSWORD,
	port: PORT
}, function(err) {
	if (err) {
		console.log('Connection Failed for ' + CAMERA_HOST + ' Port: ' + PORT + ' Username: ' + USERNAME + ' Password: ' + PASSWORD);
		return;
	}

this.systemReboot(function(err, reboot) {
console.log(reboot);
});
});
