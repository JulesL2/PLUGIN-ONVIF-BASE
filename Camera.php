<?php

require_once __DIR__ . '/../../../script/core/ressources/HostONVIF.php';

require_once "HostONVIF.php";

$camera_un = new HostONVIF();

$_data = 
    [
// VALEURS PAR DEFAUT
// A CHANGER AVEC LES GET DE JEEDOM
  'Username' => 'admin',

  'Password' => 'admin',

  'IPadress' => '192.168.1.X',

  'Port' => '1234',
    ];


$camera_un->hydrate($_data);

$camera_un->gethost();

