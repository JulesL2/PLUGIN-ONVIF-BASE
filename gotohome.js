var CAMERA_HOST = 'adresseip',
	USERNAME = 'username',
	PASSWORD = 'password',
	PORT = 'port',
	PROFILETOKEN = 'videotoken',
	Xspeed = 'xspeed',
	Yspeed = 'yspeed',
	Zspeed = 'zspeed';


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

this.gotoHomePosition({speed:{x:Xspeed, y:Yspeed , zoom:Zspeed}},function(err, home) {console.log(home)});
});