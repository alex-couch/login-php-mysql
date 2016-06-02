<html>
	<head>
		<meta charset="UTF-8">
		<title>Database and Login</title>
	</head>
	<body>
		<?php
			require('connection.php');
			$sql = "SHOW TABLES LIKE 'users';";
			if(mysqli_query($link, $sql)){
				echo '
				<form method="post" action="db.php">
					<input type="text" name="username" placeholder="Username">
					<input type="password" name="password" placeholder="Password">
					<input type="text" name="email" placeholder="E-Mail">
					<input type="submit" name="submit" value="Submit">
					<input type="button" name="delete" onclick="deleteQueries()" value="Delete All Queries">
				</form>
				';
			}else{
				echo mysqli_error($link);
			}
		?>
	</body>
</html>