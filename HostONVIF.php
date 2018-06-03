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
        //print_r($host);

        $hostjson = json_decode($host, true);

        // NOM SUR LE RESEAU
        $name = $hostjson['host']['name'];

        //DISPLAY NAME
        
        
        echo "HOST \n";
        echo "Nom ",$name,"\n";
        echo "\n";
              
    }

    public function getdeviceinfo()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getdeviceinfo.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;


        //Display final shell command
        //echo $commande,"\n";

        $info = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($info);

        // SI LE FICHIER EST VALIDE ALORS
        //print_r($info);

        
        $infojson = json_decode($info, true);
        

        // INFO VALUES
        $Manufacturer = $infojson['info']['manufacturer'];
        $Model = $infojson['info']['model'];
        $Firmware = $infojson['info']['firmwareVersion'];
        $Serial = $infojson['info']['serialNumber'];


        //DISPLAY
        echo "INFO \n";
        echo "Manufacturer ",$Manufacturer,"\n";
        echo "Modele ",$Model,"\n";
        echo "FM ",$Firmware,"\n";
        echo "SN ",$Serial,"\n";
        echo "\n";            
    }

        public function getimage()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getimage.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;


        //Display final shell command
        //echo $commande,"\n";

        $image = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($image);

        // SI LE FICHIER EST VALIDE ALORS
        //print_r($info);

        
        $imagejson = json_decode($image, true);


        // IMAGE SETTINGS
        $brightness = $imagejson['stream']['brightness'];
        $colorSaturation = $imagejson['stream']['colorSaturation'];
        $contrast = $imagejson['stream']['contrast'];
        $sharpness = $imagejson['stream']['sharpness'];


        // DISPLAY IMAGE SETTINGS
        echo "IMAGE \n";
        echo "Luminosite ",$brightness,"\n";
        echo "Saturation ",$colorSaturation,"\n";
        echo "Contraste ",$contrast,"\n";
        echo "Sharpness ",$sharpness,"\n";
        echo "\n";
    }

        public function getnodes()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getnodes.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;


        //Display final shell command
        //echo $commande,"\n";

        $node = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($node);

        // SI LE FICHIER EST VALIDE ALORS
        //print_r($info);


        $nodejson = json_decode($node, true);


        // NODES VALUES
        $XRangeMax = $nodejson['nodes']['000']['supportedPTZSpaces']['absolutePanTiltPositionSpace']['XRange']['max'];
        $XRangeMin = $nodejson['nodes']['000']['supportedPTZSpaces']['absolutePanTiltPositionSpace']['XRange']['min'];
        $YRangeMax = $nodejson['nodes']['000']['supportedPTZSpaces']['absolutePanTiltPositionSpace']['YRange']['max'];
        $YRangeMin = $nodejson['nodes']['000']['supportedPTZSpaces']['absolutePanTiltPositionSpace']['YRange']['min'];
        $ZRangeMax = $nodejson['nodes']['000']['supportedPTZSpaces']['absoluteZoomPositionSpace']['XRange']['max'];
        $ZRangeMin = $nodejson['nodes']['000']['supportedPTZSpaces']['absoluteZoomPositionSpace']['XRange']['max'];
        $PresetMax = $nodejson['nodes']['000']['maximumNumberOfPresets'];
        $HomeSupport = $nodejson['nodes']['000']['homeSupported'];
        $PatrolMax = $nodejson['nodes']['000']['extension']['supportedPresetTour']['maximumNumberOfPresetTours'];

        // DISPLAY NODES VALUES
        echo "NODES \n";
        echo "Xmax ",$XRangeMax,"\n";
        echo "Xmin ",$XRangeMin,"\n";
        echo "Ymax ",$YRangeMax,"\n";
        echo "Ymin ",$YRangeMin,"\n";
        echo "Zmax ",$ZRangeMax,"\n";
        echo "Zmin ",$ZRangeMin,"\n";
        echo "Nombre Max de Presets ",$PresetMax,"\n";
        echo "Nombre Max de Patrouille ",$PatrolMax,"\n";
        echo "Home Support ",$HomeSupport,"\n";
        echo "\n";
    }


        public function getstream()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getstream.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;


        //Display final shell command
        //echo $commande,"\n";

        $stream = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($stream);

        // SI LE FICHIER EST VALIDE ALORS
        //print_r($info);


        $streamjson = json_decode($stream, true);


        // STREAM URL
        $StreamUri = $streamjson['stream']['uri'];


        // DISPLAY STREAM URL
        echo "STREAM \n";
        echo "Stream URL ",$StreamUri,"\n";
        echo "\n";

    }
        public function getsnap()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getsnapshot.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;

        //Display final shell command
        //echo $commande,"\n";

        $snap = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($snap);

        // SI LE FICHIER EST VALIDE ALORS
        //print_r($info);


        $snapjson = json_decode($snap, true);


        // SNAP URL
        $SnapUri = $snapjson['snap']['uri'];

        // DISPLAY SNAP URL
        echo "SNAP \n";
        echo "Snap URL ",$SnapUri,"\n";
        echo "\n";
    }

        public function getstatus()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getstatus.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;

        //Display final shell command
        //echo $commande,"\n";

        $statuscam = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($statuscam);

        // SI LE FICHIER EST VALIDE ALORS
        //print_r($info);


        $statuscamjson = json_decode($statuscam, true);


        // STATUS X/Y/Z/MVT (IDLE/NOT)
        $PositionX = $statuscamjson['status']['position']['x'];
        $PositionY = $statuscamjson['status']['position']['y'];
        $PositionZ = $statuscamjson['status']['position']['zoom'];
        $MoveStatusPT = $statuscamjson['status']['moveStatus']['panTilt'];
        $MoveStatusZ = $statuscamjson['status']['moveStatus']['zoom'];

        // DISPLAY COORD + IDLE/NOT
        echo "STATUS \n";
        echo "Position X ",$PositionX,"\n";
        echo "Position Y ",$PositionY,"\n";
        echo "Position Z ",$PositionZ,"\n";
        echo "Status Pan Tilt ",$MoveStatusPT,"\n";
        echo "Status Zoom ",$MoveStatusZ,"\n";
        echo "\n";
    }

        public function getprofile()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getprofile.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;

        //Display final shell command
        //echo $commande,"\n";

        $profile = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($profile);

        // SI LE FICHIER EST VALIDE ALORS
        //print_r($info);


        $profilejson = json_decode($profile, true);

        // PROFILE NAME/TOKEN
        $profilename = $profilejson['Profile']['0']['name'];
        $VideoSourceToken = $profilejson['Profile']['0']['videoSourceConfiguration']['$']['token'];
        $VideoEncoderToken = $profilejson['Profile']['0']['videoEncoderConfiguration']['$']['token'];
        $VideoAnalyticsToken = $profilejson['Profile']['0']['videoAnalyticsConfiguration']['$']['token'];
        $MetadataToken = $profilejson['Profile']['0']['metadataConfiguration']['$']['token'];
        $PTZToken = $profilejson['Profile']['0']['PTZConfiguration']['$']['token'];
        $PTZdefaultspeedX = $profilejson['Profile']['0']['PTZConfiguration']['defaultPTZSpeed']['panTilt']['$']['x'];
        $PTZdefaultspeedY = $profilejson['Profile']['0']['PTZConfiguration']['defaultPTZSpeed']['panTilt']['$']['y'];
        $PTZdefaultspeedZ = $profilejson['Profile']['0']['PTZConfiguration']['defaultPTZSpeed']['zoom']['$']['x'];

        // DISPLAY TOKEN
        echo "TOKEN \n";
        echo "Nom du profil ",$profilename,"\n";
        echo "Video Source Token ",$VideoSourceToken,"\n";
        echo "Video Encoder Token ",$VideoEncoderToken,"\n";
        echo "Video Analytics Token ",$VideoAnalyticsToken,"\n";
        echo "Metadata Token ",$MetadataToken,"\n";
        echo "PTZ Token ",$PTZToken,"\n";
        echo "Vitesse default X ",$PTZdefaultspeedX,"\n";
        echo "Vitesse default Y ",$PTZdefaultspeedY,"\n";
        echo "Vitesse default Z ",$PTZdefaultspeedZ,"\n";
        echo "\n";
    }

        public function getpresets()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getPresets.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;

        //Display final shell command
        //echo $commande,"\n";

        $presets = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($presets);

        // SI LE FICHIER EST VALIDE ALORS
        //print_r($info);


        // SI LE FICHIER EST VALIDE ALORS
        $presetsjson = json_decode($presets, true);

        // FOREACH PRESETS

        // DISPLAY JSON PRESET
        echo "Presets \n";
        echo "Liste ",$presets,"\n";
        echo "\n";
    } 
}

