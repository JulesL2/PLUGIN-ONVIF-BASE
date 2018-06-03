<?php

require_once __DIR__ . '/../../../../core/php/core.inc.php';

class HostONVIF

{
    private $_Username;
    private $_Password;
    private $_IPadress;
    private $_Port;
    private $_VideoToken;
    private $_PTZToken; 
    private $_data;

// LISTE DES GETTERS
    public function __get($att)
    {
         echo "Get:$att";
         return $this->att;
    } 
    public function getUsername()
    {
        
        return $this->_Username;
    }
    
    public function getPassword()
    {
        return $this->_Password; 
    }
    
    public function getIPadress()
    {
        return $this->_IPadress;
    }
    
    public function getPort()
    {
        return $this->_Port;
    }
    
// LISTE DES SETTERS
    public function setUsername($Username)
    {
      $this->_Username = $Username;
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
  
      $this->_Port = $Port;
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
    

    public function json_validate($_test)
    {
    // Decode pour test erreur
    $result = json_decode($_test);


    if(json_last_error() != JSON_ERROR_NONE) 
    {
        throw new Exception(json_last_error());
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


    public function gethost()

    {
        //THIS COMMAND GIVE TO $name THE NAME OF THE CAM


        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        
        $commande = "node gethost.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;

        //Display final shell command
        //echo $commande,"\n";

        $host = shell_exec($commande);


        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($host);

        // SI LE FICHIER EST VALIDE ALORS
        print_r($host);

        $hostjson = json_decode($host, true);

        // NOM SUR LE RESEAU
        $name = $hostjson['host']['name'];

        // DISPLAY NAME
        //echo "HOST \n";
        //echo "Nom ",$name,"\n";
        //echo "\n";      
    }
}
