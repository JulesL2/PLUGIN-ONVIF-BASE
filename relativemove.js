
var CAMERA_HOST = 'adresseip',
	USERNAME = 'username',
	PASSWORD = 'password',
	PORT = 'port';
	X = 'xrelative',
	Y = 'yrelative',
	Z = 'zrelative',
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

this.relativeMove({x:X,y:Y,zoom:Z,speed:{x:Xspeed, y:Yspeed , zoom:Zspeed}},function(err, relmove) {console.log(relmove)});
});
