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


	function isEmailExist($email){
		$conn = mysqli_connect("localhost","root","","payment_system");
		if ($conn->connect_error) {
			die("connection failed: " . $conn->connect_error);  
		}
		$sql4 = "SELECT * FROM user_data1
				WHERE email ='$email'";
				
		if ($conn->query($sql4) === TRUE ) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	function isKeyExist($key_input){
		$conn = mysqli_connect("localhost","root","","payment_system");
		if ($conn->connect_error) {
			die("connection failed: " . $conn->connect_error);
		}
		$sql2 ="SLECT * FROM str_key
				WHERE key_uniq = '$key_input' AND is_used ='0'";
		if ($conn->query($sql2)=== TRUE )
			return TRUE;
		else {
			return FALSE;
			}
	}

	function updateFinal($email,$key_input){
		$conn = mysqli_connect("localhost","root","","payment_system");
		if ($conn->connect_error) {
			die("connection failed: " . $conn->connect_error);
		}
		$sql = "UPDATE str_key
				SET is_used = '1'
				WHERE key_uniq = '$ukey'
				AND is_used ='0'";
		if ($conn->query($sql)=== TRUE ) {
			$sql2 = "UPDATE 
					SET is_valid = '1'
					WHERE email = '$email'";
			if ($conn->query($sql2)=== TRUE ) {
				
				return true;
			} else {
				return false;
			}

		} else {
			return false;
		}
	}



	

		

		//call to checkemail
		if(isEmailExist($email)){
			if(isKeyExist($ukey)){
				if(updateFinal($email,$ukey)){
					echo "UpdateDone";
				}
				else{
					echo "Something went wrong";
				}
			}
			else{
				echo "Key Invalid or Used";
			}
		}
		else{
			echo "Emaailnotfound";
		}

		// $sql = "
		// UPDATE str_key
		// 		SET is_used = '1'
		// 		WHERE key_uniq = '$ukey'
		// 		AND is_used ='0'";
		// if ($conn->query($sql)=== TRUE ) {
		// 	echo " Record Successfully Updated";

		// } else {
		// 	echo "Error: " . $sql. "<br>". $conn->error;
		// }
		// $conn->close();	
?>