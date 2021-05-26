<?php
	$user = "root";
	$password = "";
	$server = "localhost";
	$db = "game";

	$con = mysqli_connect($server,$user,$password,$db);
	if(!$con){
		die("Connection Failed." .mysqli_connect_error());
	}

	$user_check = $_SESSION['id'];

	$query1 = "SELECT * FROM player WHERE player_id = '$user_check'";
	$result1 = mysqli_query($con,$query1);
	$rows = mysqli_num_rows($result1);
	$row = mysqli_fetch_assoc($result1);
	if($rows == 1){
		$_SESSION['id'] = $row['player_id'];
		$_SESSION['playername'] = $row['playername'];
		$_SESSION['score'] = $row['score'];
		$_SESSION['life'] = $row['life'];
		$_SESSION['diamonds'] = $row['diamonds'];
	}

	// // SQL Query To Fetch Complete Information Of User
	// $query = "SELECT * FROM Users where user_id = '$user_check'";
	// $result = mysqli_query($con,$query);

	// if(mysqli_num_rows($result)> 0){
	// 	$row = mysqli_fetch_array($result);
	// 	// $lname = $row['lname'];
	// 	// $fname = $row['fname'];
	// 	$_SESSION['user'] = $row['user_id'];
	// 	$_SESSION['lname'] = $row['lname'];
	// 	$_SESSION['fname'] = $row['fname'];
	// 	$_SESSION['middle'] = $row['middle'];
	// 	$_SESSION['user_id'] = $row['user_id'];
	// 	$_SESSION['password'] = $row['password'];
	// 	$_SESSION['email'] = $row['email'];
	// 	$_SESSION['contact_number'] = $row['contact_number'];
	// }
?>