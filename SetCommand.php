<?php
class CommandsONVIF {
	private $Username;
	private $Password;
	public $IPadress;
	public $Port;
	public $VideoToken;
	public $PTZToken;	

	public function Gethost($Username, $Password, $IPadress, $Port) {
		sendVarToJs('adressip', $IPadress);
		sendVarToJs('username', $Username);
		sendVarToJs('password', $Password);
		sendVarToJs('port', $Port);
		$host = shell_exec('node gethost.js');
	}

}
class CommandsONVIF Exception extends Exception {}
