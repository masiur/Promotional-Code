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

		$conn = mysqli_connect("localhost","root","","payment_system");
		if ($conn->connect_error) {
			die("connection failed: " . $conn->connect_error);
		}

		$sql = "UPDATE str_key
				SET is_used = '1'
				WHERE key_uniq = '$ukey'
				AND is_used ='0'";
		if ($conn->query($sql)=== TRUE ) {
			echo " Record Successfully Updated";

		} else {
			echo "Error: " . $sql. "<br>". $conn->error;
		}
		$conn->close();	
?>