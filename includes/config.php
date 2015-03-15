<?php 
$title="Admin";

DEFINE("DB_SERVER","");
DEFINE("DB_USER","");
DEFINE("DB_PASS","");
DEFINE("DB_NAME","");

include('class.mysql.php');
$db1 = new MySQL();
$db2 = new MySQL();

if(!$db1->Open('jobs','localhost','root','')){
	$db1->Kill();
}
?>

