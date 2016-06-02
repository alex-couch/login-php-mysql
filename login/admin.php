<html>
	<head>
		<title>Admin Page</title>
	</head>
	<body>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="button" value="Delete" onclick="deleteAllQueries();">
		</form>
		<br>
		<br>
		<?php
			$create = "CREATE TABLE users(person_id INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT, username CHAR(30) NOT NULL, password CHAR(20) NOT NULL)";
			$select = "SELECT * FROM `users`";
			if(mysqli_query($link, $create)){
				echo 'Created table successfully.';
				if($result = mysqli_query($link, $select)){
					if(mysqli_num_rows($result)>0){
						echo '<table>';
						echo '<tr>';
						echo '<th>person_id</th>';
						echo '<th>username</th>';
						echo '<th>password</th>';
						echo '<th>email_address</th>';
						echo '</tr>';
						while($row = mysqli_fetch_array($result)){
							echo '<tr>';
							echo '<td>'.$row['person_id'].'</td>';
							echo '<td>'.$row['username'].'</td>';
							echo '<td>'.$row['password'].'</td>';
							echo '<td>'.$row['email_address'].'</td>';
							echo '</tr>';
						}
						echo '</table>';
						mysqli_free_result($result);
					}else{
						echo 'No records matchng your query were found.';
					}
				}else{
					echo 'ERROR: Was not able to execute $select. '.mysqli_error($link);
				}
			}else{
				echo 'Was not able to create table.';
			}
		?>
	</body>
</html>