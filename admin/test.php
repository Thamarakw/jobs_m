<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
$categories=array(1=>"Cars", 2=>"Jeeps", 3=>"Busses", 4=>"Bysicles", 5=>"Tractors");
$selected=2;
foreach ($categories as $catid=>$catname){
	
	if($catid==$selected){
		echo "<p><strong>".$catid.":".$catname."</strong></p>";
	}else{
		echo "<p>".$catid.":".$catname."</p>";
	}
}

?>
</body>
</html>