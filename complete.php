<!DOCTYPE html>
<html>
<head>
	<title>Complete Your Registration</title>
</head>
<body>
	<?php
	$ukeyErr = $ukey = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["ukey"])) {
			$ukeyErr = "Key is reuired";
		} else {
			$ukey = test_input($_POST["ukey"]);
		}
	}
	?>
	<form method="post" action="<?php ($_SERVER["PHP_SELF"]);?>">
		<label for="ukey" >Provide Your Unique Key & Complete Registation Process</label><br><br>

		<input type="text" id="ukey" name="ukey" required>
		<span class="error">* <?php echo $ukeyErr;?></span>
		<br>
		<input type="submit" name="submit" value="Complete Registration">
	</form>
	<?php 
		$conn = mysqli_connect("localhost","root","","payment_system");
		if ($conn->connect_error) {
			die("connection failed: " . $conn->connect_error);
		}

		$sql = SELECT * FROM information_schema.COLUMNS 
					WHERE 
					    TABLE_SCHEMA = 'payment_system' 
					AND TABLE_NAME = 'str_key' 
					AND COLUMN_NAME = 'key_uniq'
		
		} else {
			echo "Error: " . $sql. "<br>". $conn->error;
		}
		$conn->close();
	?>
</body>
</html>