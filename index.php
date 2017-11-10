<?php
//error_reporting(E_ALL ^ E_NOTICE);

$filename = "C:/xampp/tmp/" .basename($_FILES['uploadfile']['tmp_name']);
$emptyArray = array();
$normal = array();
$vertex1 = array();
$vertex2 = array();
$vertex3 = array();
$count = 3;
$sum = 0.00;
$handle = fopen($filename, "rb");
fseek($handle,84);
while (feof($handle)==false) {
	for ($j = 1; $j <= 3; $j++){
			$contents = fread($handle, 4);
			$normal[] = unpack('f', $contents);
	}
	
	var_dump($normal);
	print("<br>");
	
	for ($e = 1; $e <= 3; $e++){
			$contents = fread($handle, 4);
			$vertex1[] = unpack('f', $contents);
	}
	
	var_dump($vertex1);
	print("<br>");
	
	for ($d = 1; $d <= 3; $d++){
			$contents = fread($handle, 4);
			$vertex2[] = unpack('f', $contents);
	}
	
	var_dump($vertex2);
	print("<br>");
	
	for ($f = 1; $f <= 3; $f++){
			$contents = fread($handle, 4);
			$vertex3[] = unpack('f', $contents);
	}
	print("<br>");
	var_dump($vertex3);
	print("<br>");
	//print(current($vertex3));
	
	fseek($handle,2);
	//$sum += ((((-1) * current($vertex3) * next($vertex2) * end($vertex1)) + prev($vertex2) * next($vertex3) * prev($vertex1) + prev($vertex3) * current($vertex1) * end($vertex2) - prev($vertex1) * next($vertex3) * current($vertex2) - reset($vertex2) * next($vertex1) * next($vertex3) + prev($vertex1) * next($vertex2) * current($vertex3)) / 6);
	$normal = array();
	$vertex1 = array();
	$vertex2 = array();
	$vertex3 = array();
} 
fclose($handle);
print($sum);
?>