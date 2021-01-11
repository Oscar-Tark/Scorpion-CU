<?php
	//ERROR REPORTING
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	include_once("../scorpion-php-api/core/includer.php");
    includes(87, 'PHP');
	$instantiator = new Instantiator;
	$instantiator->instantiate_classes();
	$cookie_name = "scu_uid";
	$project = "dbanalytica";
	$subproject = "Scorpion-CU";
	$prefix_cookie_accepted = "scu";
	$subproject = $project;
	$services->load_modules($project);
        
	$trackuser = new TrackUser;
	$tgui = new TGUI;
	$tgui->loadcss("default");
	$tgui->loadcss("proj");
	$tgui->loadcss("privacy");
	$tgui->loadcss("default_responsive");
	$tgui->loadcss("responsive");
	$uid = $trackuser->get_uid();
	$sql->create_settings("root", "", "localhost", "3306", $subproject, "user_ids_privacy_consent", "token_surface");
	$privacy = new PrivacyDialog($uid, "cookies.php","nocookies.php", null, "privacypolicy.html", "cookiepolicy.html");
?>

<html>
    <head>
		<meta http-equiv="Content-Security-Policy" content="script-src 'self'; default-src 'self'; img-src https://*; child-src 'none';">
        <meta name="description" content="Scorpion CU">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Scorpion CU</title>
    </head>
    <body>
    </body>
</html>
