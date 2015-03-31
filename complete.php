<!DOCTYPE html>
<head>
	<title>Complete Your Registration</title>
</head>
<body>
	<form method="post" action="action.php">
		<label for="email">Give Your Email Address once you Provided</label><br><br>
		<input type="email" name="email" id="email" required><br><br>
		<label for="ukey" >Provide Your Unique Key & Complete Registation Process</label><br><br>

		<input type="text" id="ukey" name="ukey" required>
		<span class="error"></span>
		<br><br>
		<input type="submit" name="submit" value="Complete Registration">
	</form>
</body>
</html>