<?php

session_start();

function json_validate($test)
{
    // Decode pour test erreur
    $result = json_decode($test);

    // Test erreur
	
	if(json_last_error() != JSON_ERROR_NONE) 
	{
        throw new Exception(JSONErrorMap::get(json_last_error()));
		 // Exit sur exeption
		echo "Erreur \n";
		echo $error;
	}
	// Fin sans erreur
    $test2 = json_decode($test);
	if ($test2 =='null' || $test2 =='')
	{
	throw new Exception('Fichier Vide');
	}

	echo "Aucune erreur \n";  
    
}

// IMAGE GET FILE
$image = shell_exec('node Dgetimage.js');


// TEST DE LA VALIDITE DE LA SORTIE
$sortieimage = json_validate($image);
print_r($sortieimage);

// SI LE FICHIER EST VALIDE ALORS
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


/*===========================================*/

// NODES GET FILE
$node = shell_exec('node Dgetnodes.js');


// TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
$sortienode = json_validate($node);
print_r($sortienode);

// SI LE FICHIER EST VALIDE ALORS
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

/*===========================================*/

// GET INFO FILE
$info = shell_exec('node Dgetdeviceinfo.js');

// TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
$sortienode = json_validate($info);
print_r($sortienode);

//SI LE FICHIER EST VALIDE ALORS
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

/*===========================================*/

// GET STREAM FILE
$stream = shell_exec('node Dgetstream.js');

// TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
$sortiestream = json_validate($stream);
print_r($sortiestream);

// SI LE FICHIER EST VALIDE ALORS
$streamjson = json_decode($stream, true);

// STREAM URL
$StreamUri = $streamjson['stream']['uri'];


// DISPLAY STREAM URL
echo "STREAM \n";
echo "Stream URL ",$StreamUri,"\n";
echo "\n";


/*===========================================*/

// GET SNAP FILE
$snap = shell_exec('node Dgetsnapshot.js');

// TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
$sortiesnap = json_validate($snap);
print_r($sortiesnap);

// SI LE FICHIER EST VALIDE ALORS
$snapjson = json_decode($snap, true);

// SNAP URL
$SnapUri = $snapjson['snap']['uri'];

// DISPLAY SNAP URL
echo "SNAP \n";
echo "Snap URL ",$SnapUri,"\n";
echo "\n";

/*===========================================*/

// GET STATUS FILE
$statuscam = shell_exec('node DgetStatus.js');

// TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
$sortiestatuscam = json_validate($statuscam);
print_r($sortiesnap);

// SI LE FICHIER EST VALIDE ALORS
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

/*===========================================*/

// GET Host FILE
$host = shell_exec('node Dgethost.js');

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

/*===========================================*/

// GET PROFILE FILE 
$profile = shell_exec('node Dgetprofile.js');

// TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
$sortieprofile = json_validate($profile);
print_r($sortieprofile);

// SI LE FICHIER EST VALIDE ALORS
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

/*===========================================*/

// GET Preset FILE
$presets = shell_exec('node DgetPresets.js');

// TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
$sortiepresets = json_validate($presets);
print_r($sortiepresets);

// SI LE FICHIER EST VALIDE ALORS
$presetsjson = json_decode($presets, true);

// FOREACH PRESETS

// DISPLAY JSON PRESET
echo "Presets \n";
echo "Liste ",$presets,"\n";
echo "\n";
/*===========================================*/
?>


