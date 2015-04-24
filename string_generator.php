<?php

function random_string() {
	$character_set_array = array();
	$character_set_array[] = array('count' => 7, 'characters' => 'abcdefghijklmnopqrstuvwxyz');
	$character_set_array[] = array('count' => 7, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
	$character_set_array[] = array('count' => 6, 'characters' => '0123456789');

	$temp_array = array();
	foreach ($character_set_array as $character_set) {
		for ($i = 0;$i < $character_set['count']; $i++) {
			$temp_array[] = $character_set['characters'][rand(0,strlen($character_set['characters'])-1)];
		}
	}
	shuffle($temp_array);
	return implode('', $temp_array);
	
}
$val =random_string();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payment_system";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set PDO error mode to exeption 
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "INSERT INTO str_key (key_uniq, is_used)
	VALUES ('$val','0')";
	// use exec because no results are returned
	$conn->exec($sql);
	echo "New record created successfully";
	}
	
catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
	}
$conn = null;

?>