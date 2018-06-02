<?php

require_once __DIR__ . '/../../../script/core/ressources/HostONVIF.php';

require_once "HostONVIF.php";
function json_validate($_test)
    {
    // Decode pour test erreur
    $result = json_decode($_test);

    // Test erreur
	
	if(json_last_error() != JSON_ERROR_NONE) 
	{
        throw new Exception(JSONErrorMap::get(json_last_error()));
		 // Exit sur exeption
		echo "Erreur \n";
		echo $_error;
	}
	// Fin sans erreur
    $_test2 = json_decode($_test);
	if ($_test2 =='null' || $_test2 =='')
	{
	throw new Exception('Fichier Vide');
	}

	echo "Aucune erreur \n";  
    
    }


$hostid = new HostONVIF();


// LE TABLEAU DATA EST A REMPLACER AVEC LES VALEURS TROUVE DANS JEEDOM
$_data = 
    [

  'Username' => 'USER',

  'Password' => 'PASSWORD',

  'IPadress' => 'IP',

  'Port' => 'PORT',
    ];


$hostid->hydrate($_data);


echo "Le nom d'utilisateur est: ",$hostid->getUsername(),"\n";
echo "Le mot de passe est: ",$hostid->getPassword(),"\n";
echo "L'adresse ip de la camera est: ",$hostid->getIPadress(),"\n";
echo "Le port est: ",$hostid->getPort(),"\n";

$hostid -> Gethost();

echo "Passage a l'execution du node \n";

$host = shell_exec('node gethost.js');


// TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
$sortiehost = json_validate($host);
print_r($sortiehost);

// SI LE FICHIER EST VALIDE ALORS
$hostjson = json_decode($host, true);

// NOM SUR LE RESEAU
$name = $hostjson['host']['name'];

// DISPLAY NAME
echo "HOST \n";
echo "Nom ",$name,"\n";
echo "\n";
