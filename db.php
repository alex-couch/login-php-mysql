<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$username = mysqli_real_escape_string($link, $_POST['username']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$create = "CREATE TABLE users(person_id INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT, username CHAR(30) NOT NULL, password CHAR(20) NOT NULL, email_address VARCHAR(30) NOT NULL)";
$insert = "INSERT INTO `demo`.`users` (`person_id`, `username`, `password`, `email_address`) VALUES ('1', '$username', '$password', '$email');";
$select = "SELECT * FROM users";
if(mysqli_query($link, $insert)){
	echo 'Records added successfully!';
}else{
	echo 'Was not able to add records!';
}
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
		require('index.php');
	}else{
		echo 'No records matchng your query were found.';
	}
}else{
	echo 'ERROR: Was not able to execute $sql. '.mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>