<!DOCTYPE html>
<head>
	<title>Complete Your Registration</title>
</head>
<body>
	<?php

	$ukeyErr = $ukey = $email = $emailErr = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST['email'])) {
			$emailErr = "Email is required";
		} else {
			$email = test_input($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr= "Please, Provide a Valid Email Address";
			}
		}

		if (empty($_POST["ukey"])) {
			$ukeyErr = "Key is reuired";
		} else {
			$ukey = test_input($_POST["ukey"]);
		}
	}
	function test_input($data) {
		$data = trim($data);
		return $data;
	}

	?>
	<form method="post" action="<?php ($_SERVER["PHP_SELF"]);?>">
		<label for="email">Give Your Email Address once you Provided</label>
		<input type="email" name="email" id="email" required>
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

		$sql = "UPDATE str_key
				SET is_used = '1'
				WHERE key_uniq = '$ukey', is_used ='0'";
		
		} else {
			echo "Error: " . $sql. "<br>". $conn->error;
		}
		$conn->close();
	?>
</body>
</html>