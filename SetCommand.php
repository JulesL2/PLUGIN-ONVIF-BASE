<?php

require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';

class HostONVIF

{
	private $_Username;
	private $_Password;
	private $_IPadress;
	private $_Port;
	private $_VideoToken;
	private $_PTZToken;	

// LISTE DES GETTERS
    public function Username(){return $this->_Username;}
    
    public function Password(){return $this->_Password;}
    
    public function IPadress(){return $this->_IPadress;}
    
    public function Port(){return $this->_Port;}
    
// LISTE DES SETTERS
    public function setUsername($Username)
    {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($Username))
    {
      $this->_Username = $Username;
    }
    echo "ce n'est pas une chaine de caractère";
    }


    public function setPassword($Password)
    {
      $this->_Password = $Password;
    }
    
    
    public function setIPadress($IPadress)
    {
      $this->_IPadress = $IPadress;
    }
    
    
    public function setPort($Port)
    {
    // On vérifie qu'il s'agit bien d'un nombre
    if (is_int($Port))
    {
      $this->_Port = $Port;
    }
    echo "ce n'est pas un nombre";
    }
   
   
    public function Gethost() 
    {
        
		sendVarToJs('adressip', $_IPadress);
		sendVarToJs('username', $_Username);
		sendVarToJs('password', $_Password);
		sendVarToJs('port', $_Port);
        echo "Variable Transmises";
	}


    public function hydrate(array $donnees)

    {

        foreach ($donnees as $key => $value)

            {
            // On récupère le nom du setter correspondant à l'attribut.

            $method = 'set'.ucfirst($key);


            // Si le setter correspondant existe.

            if (method_exists($this, $method))

                {
                // On appelle le setter.
                $this->$method($value);
                }

            } 
    }

}
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

$data = [

  'Username' => 'admin',

  'Password' => 'chiquita20',

  'IPadress' => '192.168.1.26',

  'Port' => 8000,
];

$hostid->hydrate($data);

$host = shell_exe('node gethost.js');
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
