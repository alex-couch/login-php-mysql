<?php
	session_start();
	ini_set('display_errors', '1');
	$name = $_SESSION["username"];
	$budget = $_SESSION["budget"];
	if(isset($_POST['submit'])){
		if(isset($_POST['check1'])){
			header('Content-Type: application/txt');
		header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
		readfile($filepath);
		}
		if(isset($_POST['check2'])){
			downloadFile("download/rct3.txt");
		}
		if(isset($_POST['check3'])){
			downloadFile("download/simcity.txt");
		}
		if(isset($_POST['check4'])){
			downloadFile("download/sims4.txt");
		}
	}

	function downloadFile($filepath){
		header('Content-Type: application/txt');
		header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
		readfile($filepath);
		exit;
	}
?>

<html>
	<head>
		<title>Buy Games!</title>
		<style type="text/css">
			table, th, td{
				padding-left: 30px;
			}

			input[name="buy"]{
				margin-left: 60px;
			}
		</style>
	</head>
	<body>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<table>
				<tr>
					<th>Game</th>
					<th>Price</th>
					<th>Selection</th>
				</tr>
				<tr>
					<td>Prison Architect</td>
					<td>$19.99</td>
					<td><input type="checkbox" name="check1"></td>
				</tr>
				<tr>
					<td>Roller Coaster Tycoon 3</td>
					<td>$49.99</td>
					<td><input type="checkbox" name="check2"></td>
				</tr>
				<tr>
					<td>Sim City</td>
					<td>$39.99</td>
					<td><input type="checkbox" name="check3"></td>
				</tr>
				<tr>
					<td>Sims 4</td>
					<td>$34.99</td>
					<td><input type="checkbox" name="check4"></td>
				</tr>
			</table>
			<input type="submit" name="buy" value="Buy">
		</form>
	</body>
</html>