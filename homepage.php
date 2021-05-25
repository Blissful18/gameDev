<?php
	session_start();
	$_SESSION['player_id'] = '';
    include('connect.php');
//	include('newPlayer.php');
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>Gametest</title>
    </head>
    <body>
    <?php    
        if(isset($_POST['submit'])){
            if (empty($_POST['name'])) {
                $error = "Please input player name.";
            }else{
                $username = $_POST['name'];
    
                $query = "INSERT INTO player(playername,score,life,diamonds) 
                VALUES ('$username',0,3,0)";
                $result = mysqli_query($con,$query);
                if($result){
                    $query1 = "SELECT * FROM player WHERE playername = '$username'";
			        $result1 = mysqli_query($con,$query1);
                    $rows = mysqli_num_rows($result1);
			        $row = mysqli_fetch_assoc($result1);
			        if($rows == 1){
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['playername'] = $username;
                        $_SESSION['score'] = 0;
                        $_SESSION['life'] = 3;
                        $_SESSION['diamonds'] = 0;
                        header("location: LevelOne.php");
                    }
                }else{
                    $error = "Player name is invalid.";
                }
            }
        }
    ?>
        <div class="container" align="center">
            <div class="jumbotron">
                <form method="POST" action="">
                    <div class="form-group">
                    <label>Player Name: </label>
                    <input type="text" name="name" placeholder="Enter player name" class="form-control" required><br>

                    <button type="submit" name="submit" class="btn btn-primary">Start Game</button><br>
                    <span style ="color:red; padding: 5px;"><?php echo $error;?></span>
                    </div>
                </form>
            </div>
        </div>
        <!-- <script type='module' src='index.js'></script> -->
    </body> 
</html>
