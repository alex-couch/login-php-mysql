<?php
require('connection.php');

$create = "CREATE TABLE users(person_id INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT, username CHAR(30) NOT NULL, password CHAR(20) NOT NULL, email_address VARCHAR(30) NOT NULL)";
if(mysqli_query($link, $create)){
	echo 'Created table successfully.';
	echo '
		<form method="post" action="db.php">
			<input type="submit" name="redirect" value="Go To Main Page">
		</form>
	';
}else{
	echo 'Was not able to create table.';
}