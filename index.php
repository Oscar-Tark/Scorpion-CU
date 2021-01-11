<?php
	//ERROR REPORTING
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
    include_once("../scorpion-php-api/core/includer.php");
    
    includes(87, 'PHP');
	$instantiator = new Instantiator;
	$instantiator->instantiate_classes();
    includes(87, 'JS');
   
	$service = "scu_execute";
	$project = "dbanalytica";
	$subproject = "Scorpion-CU";
	$user = "test";
	$pwd = "test";
	$request = "";
	$cookie_name = "scu_uid";
	$prefix_cookie_accepted = "scu";
	$referer = null;
	$uid = null;
	$session = null;
    $today = $dates->date_today();
    
	$mdb = new Mongodb("localhost", 27017);
	$services->load_modules($project);
	$trackuser = new TrackUser;
	
    function js_out()
    {
		global $service, $project, $request, $user, $pwd, $referer, $uid, $session;
		echo ('<script>c_local.set_local("service", "'.$service.'");c_local.set_local("project", "'.$project.'");c_local.set_local("request", "'.$request.'");c_local.set_local("user", "'.$user.'");c_local.set_local("pwd", "'.$pwd.'");c_local.set_local("referer", "'.$referer.'");c_local.set_local("id", "'.$uid.'");c_local.set_local("session", "'.$session.'");</script>');
		return;
	}
    
	$sql->create_settings("root", "", "localhost", "3306", "scorpioncu", "user_ids", "token_surface");
    $trackuser->check_tables($subproject);
    harvest();
    __init();
    function __init()
    {
		global $project, $request, $services, $tgui, $tgui_elements;
		
		//Load external modules
		$services->load_modules($project);
		$services->load_service_js($project, "d");
		
		js_out();
		$tgui = new TGUI;
		$tgui_elements = new TGUI_elements;
		
		$tgui->draw_module($project, 'scu_0');
		$template = new gui_template();
		return;
	}
	
	function harvest()
	{
		global $cookies, $cookie_name, $project, $sql, $referer, $encryptor, $uid, $session, $dates, $today, $trackuser, $subproject;
		
		if(isset($_SERVER['HTTP_REFERER']))
			$referer = $_SERVER['HTTP_REFERER'];
		$uid = $trackuser->get_uid();
		$trackuser->track_session($subproject, "init_data_".$today);
	}
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

