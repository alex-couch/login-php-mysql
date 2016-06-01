<?php
	$host = 'localhost';
	$user = 'root';
	$psswrd = '';
	$link = new mysqli($host, $user, $psswrd);
	$dbexists = 'CREATE DATABASE IF NOT EXISTS demo';
	// $username = mysqli_real_escape_string($_POST['username']);
	// $lastname = mysqli_real_escape_string($_POST['password']);
	// $email = mysqli_real_escape_string($_POST['email']);
	$username = mysqli_real_escape_string($link, 'username');
	$lastname = mysqli_real_escape_string($link,'password');
	$email = mysqli_real_escape_string($link,'email');

	if($link->query($dbexists)){
		if($link->connect_error){
			die("Connection failed: ".$link->connect_error);
		}else{
			echo "Connected successfully!";
			$create = createDb();
			if($create === FALSE){
				echo "Could not create database! :/ Error: ".$link->error;
			}else{
				echo "Database created successfully!";
				$table = createTable();
				if($table === FALSE){
					echo "Could not create data table: ".$link->error;
				}else{
					echo "Table created successfully.";
					
					insertToTable($username, $password, $email);
				}
			}
		}
	}else{
		insertToTable($username, $lastname, $email);
	}

	function createDb(){
		$sql = "CREATE DATABASE myDB";
		global $link;
		if($link->query($sql) === TRUE){
			return true;
		}else{
			return false;
		}
	}

	function createTable(){
		$sql = "CREATE TABLE myGuests (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50), reg_data TIMESTAMP
		);";
		global $link;
		if($link->query($sql) === TRUE){
			return true;
		}else{
			return false;
		}
	}

	function insertToTable($firstname, $lastname, $email){
		$sql = "INSERT INTO myGuests (firstname, lastname, email) VALUES ('$username', '$lastname', '$email');";
		global $link;
		if($link->query($sql) === TRUE){
			echo "Records added successfully!";
			$data = "SELECT * FROM myGuests;";
			displayData($data);
		}else{
			echo "Could not add records to query: ".$link->error;
		}
	}

	function displayData($data){
		$result = mysqli_query($link, $data);

	}

	$conn->close();
?>
