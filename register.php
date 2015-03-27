<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style>
	.error { color: #FF0000;}
	</style>
</head>
<body>

	<?php
	$nameErr = $deptErr = $sessionErr = $currsemeErr = $emailErr = $mobileErr = "";
	$name = $dept = $session = $currseme = $email = $mobile = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr = "Name is reuired";
		} else {
			$name = test_input($_POST["name"]);
			 // check name 
			if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
				$nameErr = "Only letters and white space allowed";
			}
		}
		if (empty($_POST["dept"])) {
			$deptErr = "Department is required";
		} else {
			$dept = test_input($_POST["dept"]);
		}
		if (empty($_POST["session"])) {
			$sessionErr = "Seission is required";
		} else {
			$session = test_input($_POST["session"]);
		}
		if (empty($_POST["currseme"])) {
			$currSemeErr = "Please, Provide Current Semester";
		} else {
			$currseme = test_input($_POST["currseme"]); 
		}
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
	     	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	     		$emailErr = "Invalid email format";
			}
   		}
		if (empty($_POST["mobile"])) {
			$mobileErr = "Please, Provide Your Mobile Number";
		} else {
			$mobile = test_input($_POST["mobile"]);
		}

	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>
	<h2> Submit Your Data</h2>
	<p><span class="error">* required field.</span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="name">Full Name*</label>
		<input type="text" name="name" id="name" maxlength="50" required>
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>

		<label for="dept" id="dept">Your Department</label>
		<select name="dept">
		<option value=""></option>
		<option value="ANP">ANP</option>
		<option value="ARC">ARC</option>
		<option value="BAN">BAN</option>
		<option value="BMB">BMB</option>
		<option value="BNG">BNG</option>
		<option value="CEE">CEE</option>
		<option value="CEP">CEP</option>
		<option value="CHE">CHE</option>
		<option value="CSE">CSE</option>
		<option value="ECO">ECO</option>
		<option value="EEE">EEE</option>
		<option value="ENG">ENG</option>
		<option value="FES">FES</option>
		<option value="FET">FET</option>
		<option value="GEB">GEB</option>
		<option value="GEE">GEE</option>
		<option value="IPE">IPE</option>
		<option value="MAT">MAT</option>
		<option value="PAD">PAD</option>
		<option value="PHY">PHY</option>
		<option value="PME">PME</option>
		<option value="PSS">PSS</option>
		<option value="SOC">SOC</option>
		<option value="SCW">SCW</option>
		<option value="STA">STA</option>

		</select>
		<span class="error">* <?php echo $deptErr;?></span>
		<br><br>
		
		<label for="session">Your Session</label>
		<input type="text" placeholder="2012-1013" name="session" id="session" maxlength='12' required>
		<span class="error">* <?php echo $sessionErr;?></span>
		<br><br>

		<label for="currseme">Cureent Semester</label>
		<select name="currseme" required>
		<option value="1/1">1/1</option>
		<option value="1/2">1/2</option>
		<option value="2/1">2/1</option>
		<option value="2/2">2/2</option>
		<option value="3/1">3/1</option>
		<option value="3/2">3/2</option>
		<option value="4/1">4/1</option>
		<option value="4/2">4/2</option>
		<option value="5/1">5/1</option>
		<option value="5/2">5/2</option>
		</select>
		<span class="error">* <?php echo $currsemeErr;?></span>
		<br><br>

		<label for="email">Email</label>
		<input type="email" name="email" id="email" required>
		<span class="error">* <?php echo $emailErr;?></span>
		<br><br>

		<label for="mobile">Contact Number</label>
		<input type="text" name="mobile" id="mobile" required>
		<span class="error">* <?php echo $mobileErr;?></span>
		<br><br>
		<input id="button" type="submit" name="submit" value="submit">
	</form>
	<?php 
		$conn = new mysqli("localhost","root","","payment_system");
		if ($conn->connect_error) {
			die("connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO user_data1 (fname, dept, session, currentsemester, email, mobile, is_valid)
		VALUES ('$name', '$dept', '$session', '$currseme', '$email', '$mobile', '0')";
		if ($conn->query($sql) === TRUE ) {
			echo "";
		} else {
			echo "Error: " . $sql. "<br>". $conn->error;
		}
		$conn->close();
		if (isset($_POST['submit'])) {
			header("Location: complete.php");
		}
		
	?>



</body>
</html>