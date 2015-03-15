<?php 
	$array=array(
		"foo"=>"x",
		100=>1,
		"multi"=>array(
			"dimentioanal"=>array(
				"array"=>"value",
			)
		)
	);
	
	var_dump($array["foo"]);
	var_dump($array[100]);
	var_dump($array["multi"]["dimentioanal"]["array	"]);
?>

/*As of PHP 5.4 it is possible to array dereference the result of a function or method call directly. Before it was only possible using a temporary variable.

As of PHP 5.5 it is possible to array dereference an array literal.

Example #7 Array dereferencing*/

<?php
function getArray() {
    return array(1, 2, 3);
}

// on PHP 5.4
$secondElement = getArray()[1];

// previously
$tmp = getArray();
$secondElement = $tmp[1];

// or
list(, $secondElement) = getArray();
?>
Note:
Attempting to access an array key which has not been defined is the same as accessing any other undefined variable: an E_NOTICE-level error message will be issued, and the result will be NULL.