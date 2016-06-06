<?php
	session_start();
	if(isset($_POST['username']) && isset($_POST['budget'])){
		$_SESSION["username"] = $_POST["username"];
		$_SESSION["budget"] = $_POST["budget"];
	}
?>

<html>
	<head>
		<title>Register or Login</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<form id="register" action="login.php" method="post">
				<legend>Login</legend>
				<input type="hidden" name="submitted" id="submitted" value="1">
				<br>
				<label for="username">Username</label>
				<br>
				<input type="text" name="username" id="username" maxlength="30">
				<br>
				<label for="budget">Budget</label>
				<br>
				<input type="number" name="budget" step="0.01" min="0.00">
				<br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</body>
</html>