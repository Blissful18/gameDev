<?php
	session_start();
	$_SESSION['player_id'] = '';
    include('connect.php');
	include('newPlayer.php');
	$error = '';
	$error1 = '';
	$ok = '';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Gametest</title>
    </head>
    <body>
    <?php    
        if(isset($_POST['submit'])){
            
        }
    ?>
        <div align="center">
        <form method="POST" action="">
			<div class="form-group">
			<label>Player Name: </label>
			<input type="text" name="name" class="form-control" required><br>

			<button type="submit" name="submit" class="btn btn-primary">Start Game</button>
			<span style ="color:red; padding: 5px;"><?php echo $error;?></span>
			</div>
		</form>
        <!-- <script type='module' src='index.js'></script> -->
    </body> 
</html>
