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
        echo "get bien effectue";
    }
    
    public function getPassword()
    {
        return $this->_Password;
        echo "get bien effectue"; 
    }
    
    public function getIPadress()
    {
        return $this->_IPadress;
        echo "get bien effectue";
    }
    
    public function getPort()
    {
        return $this->_Port;
        echo "get bien effectue";
    }
    
// LISTE DES SETTERS
    public function setUsername($Username)
    {
      $this->_Username = $Username;
      echo "Username Bien Effectue\n";
    }


    public function setPassword($Password)
    {
      $this->_Password = $Password;
      echo "Password Bien Effectue\n";
    }
    
    
    public function setIPadress($IPadress)
    {
      $this->_IPadress = $IPadress;
      echo "IP Bien Effectue\n";
    }
    
    
    public function setPort($Port)
    {
  
      $this->_Port = $Port;
      echo "Port Bien Effectue\n";
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
