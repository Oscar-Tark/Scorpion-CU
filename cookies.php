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
	$trackuser = new TrackUser;
	$sql->create_settings("root", "", "localhost", "3306", "scorpioncu", "user_ids_privacy_consent", "token_surface");
	$cookie_name = "scu_uid";
	$subproject = "Scorpion-CU";
	$prefix_cookie_accepted = "scu";
	$uid = null;
	$trackuser->check_uid();
	
	echo "Just a second..";
	
	$id = $cookies->check_cookie("/" . $subproject . "/", $prefix_cookie_accepted . '_uid');
	$cookies->set_cookie_($prefix_cookie_accepted . "_cookies_accepted", "true", $subproject);
	$cookies->set_cookie_($prefix_cookie_accepted . "_cookies_accepted_uid", $uid, $subproject);
	
	//Set acceptance to SQL
	$sql->sql_set("user_ids_privacy_consent", "DEFAULT, '".$uid."','" . $subproject . "_cookies_accepted', true, DEFAULT");
	echo "<script>window.close();</script>";
?>
