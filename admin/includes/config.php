<?php
date_default_timezone_set("Asia/Colombo");

$title = "Admin";
	DEFINE("DB_SERVER",""); 
	DEFINE("DB_USER",""); 
	DEFINE("DB_PASS",""); 
	DEFINE("DB_NAME",""); 
include("class.mysql.php");
$db = new MySQL();
	
if (! $db->Open("jobs", "localhost", "root", "")) {
    $db->Kill();
}
