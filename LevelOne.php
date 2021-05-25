<?php
	session_start();
    include('connect.php');
	$id = $_SESSION['id'];
    $playername = $_SESSION['playername'];
    $score = $_SESSION['score'];
    $life= $_SESSION['life'];
    $diamonds = $_SESSION['diamonds'];
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
        <div align="center" id="top">
            <img src="images/diamond.gif" alt="Diamond" width="15" height="15" background="none"><span id="small">  <?php echo $diamonds; ?></span>
            <span>Score: <?php echo $score; ?></span>
            <span>Lives left: <?php echo $life; ?></span>
        </div>
        <canvas id='game' width="1350" height="540"></canvas>
        <script type='module' src='index.js'></script>
    </body>
    
</html>
