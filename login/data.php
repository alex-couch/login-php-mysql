<?php
	require('../connection.php');

	$username = mysqli_real_escape_string($link, $_POST['username']);
	$password = mysqli_real_escape_string($link, $_POST['password']);

	if($username === "admin" && $password === "nimda"){
		header('Location: admin.php');
	}else{
		require('users.php');
	}

	$insert = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password');";
	if(mysqli_query($link, $insert)){
		echo 'Records added successfully!';
	}else{
		echo 'Was not able to add records!';
	}

	function deleteAllQueries(){
		$delete = "DELETE * FROM `login`.`users`";
		global $link;
		if(mysqli_query($link, $delete)){
			echo 'Deleted queries!';
		}
	}
?>