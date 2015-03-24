<?php
$cars = array("Volvo", "BMW", "Toyota");
$arrlength = count($cars);
var_dump($cars);

for($x = 0; $x < $arrlength; $x++) {
    echo $cars[$x];
    echo "<br>";
}
?>