<html>
	<head>
		<meta charset="UTF-8">
		<title>Database and Login</title>
		<script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript" src="actions.js"></script>
	</head>
	<body>
		<?php
			require('connection.php');
			$sql = "SELECT * FROM information_schema.tables WHERE table_schema = `mysql` AND table_name = `users`;";
			if(mysqli_query($link, $sql)){
				echo '
				<form method="post" action="db.php">
					<input type="text" name="username" placeholder="Username">
					<input type="password" name="password" placeholder="Password">
					<input type="text" name="email" placeholder="E-Mail">
					<input type="submit" name="submit" value="Submit">
				</form>
				';
			}else{
				echo '
					<form method ="post" action="install.php">
						<input type="submit" name="create" value="Create Table">
					</form>
				';
			}
		?>
	</body>
</html>