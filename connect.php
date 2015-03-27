<?php
	$conn = new mysqli("localhost","root","","payment_system");
		if ($conn->connect_error) {
			die("connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO 'user'('Name', 'Dept', 'Session', 'Current Semester', 'E-mail', 'Mobile', 'is_valid') 
		VALUES ('$name', '$dept', '$session', '$currseme', '$email', '$mobile', '0')";
		if ($conn->query($sql) === TRUE ) {
			header("Location: complete.php");
		}
		$conn->close();

?>
