<?php
	//ERROR REPORTING
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	include_once("../scorpion-php-api/core/includer.php");
    includes(87, 'PHP');
	$instantiator = new Instantiator;
	$instantiator->instantiate_classes();
    include_once("../scorpion_dbanalytica/modules/module_sessions.php");
	$sql->create_settings("root", "", "localhost", "3306", "dbanalytica", "user_ids_privacy_consent", "token_surface");
	$trackuser = new TrackUser;
	$cookie_name = "scu_uid";
	$subproject = "Scorpion-CU";
	$prefix_cookie_accepted = "scu";
	
	echo "Just a second..";
	
	$uid = "null";
	$uid = $trackuser->get_uid();
	
	$cookies->set_cookie_($prefix_cookie_accepted."_uid", "null", $subproject);
	$cookies->set_cookie_($prefix_cookie_accepted."dba_cookies_accepted", "false", $subproject);
	$cookies->set_cookie_($prefix_cookie_accepted."dba_cookies_accepted_uid", "null", $subproject);
	
	$sql->sql_set("user_ids_privacy_consent", "DEFAULT, '".$uid."', 'dba_cookies_accepted', false, DEFAULT");
	echo "<script>window.close();</script>";
	/*if(isset($_SERVER['HTTP_REFERER']))
		header("Location: " . $_SERVER['HTTP_REFERER']);
	else
		header("Location: http://localhost/dbanalytica/index.php");
	die();*/
?>

