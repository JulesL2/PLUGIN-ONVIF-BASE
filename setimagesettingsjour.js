

var CAMERA_HOST = 'adresseip',
	USERNAME = 'username',
	PASSWORD = 'password',
	PORT = 'port',
 	BRIGHTNESS = 'brightness',
	COLORSATURATION = 'colorsaturation',
	CONTRAST = 'constrast',
	SHARPNESS = 'sharpness',
	VIDEOSOURCETOKEN = 'videotoken';
	
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

this.setImagingSettings({
brightness: BRIGHTNESS,
colorSaturation: COLORSATURATION,
contrast: CONTRAST,
sharpness: SHARPNESS,
},function(err, image) {
console.log(image);
});

});
