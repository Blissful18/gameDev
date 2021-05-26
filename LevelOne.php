<?php
	session_start();
    include('connect.php');
    $id = $_SESSION['id'];
    $query = "SELECT * FROM player WHERE player_id = '$id'";
    $result = mysqli_query($con,$query);
    $rows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if($rows == 1){
        $_SESSION['id'] = $row['player_id'];
        $_SESSION['playername'] = $row['playername'];
        $_SESSION['score'] = $row['score']+100;
        $_SESSION['life'] = $row['life'];
        $_SESSION['diamonds'] = $row['diamonds']+10;
        $_SESSION['level'] += 1;
    }
    $playername = $_SESSION['playername'];
    $score = $_SESSION['score'];
    $life= $_SESSION['life'];
    $diamonds = $_SESSION['diamonds'];
    $level = $_SESSION['level'];
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <title>Gametest</title>
    </head>
    <body>

        <div align="center" id="top">
            <span> <?php echo $ok; ?></span>
            <img src="images/diamond.gif" alt="Diamond" width="15" height="15" background="none"><span id="small">  <?php echo $diamonds; ?></span>
            <span>Score: <?php echo $score; ?></span>
            <span>Lives left: <?php echo $life; ?></span>
        </div>
        <canvas id='game' width="1350" height="540"></canvas>

        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Subscribe our Newsletter</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Subscribe to our mailing list to get the latest updates straight in your inbox.</p>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email Address">
                            </div>
                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type='module' src='index.js'></script>

        <?php
        $query3 = "SELECT * FROM player WHERE player_id = '$id'";
        $result3 = mysqli_query($con,$query3);
        $rows1 = mysqli_num_rows($result3);
        $row1 = mysqli_fetch_assoc($result3);
        if($rows1 == 1){
            $score_up = $row1['score'] + 100;
            $diamonds_up = $row1['diamonds'] + 10;

            $query1 = "UPDATE player SET score = '$score_up', diamonds = '$diamonds_up' WHERE player_id = '$id'";
            $result1 = mysqli_query($con,$query1);
            if($result1){
                $_SESSION['ok'] = "Updated successfully.";
            }
        }

        $query2 = "SELECT * FROM player WHERE player_id = '$id'";
			        $result2 = mysqli_query($con,$query2);
                    $rows2 = mysqli_num_rows($result2);
			        $row2 = mysqli_fetch_assoc($result2);
			        if($rows2 == 1){
                        $_SESSION['id'] = $row2['player_id'];
                        $_SESSION['playername'] = $row2['playername'];
                        $_SESSION['score'] = $row2['score'];
                        $_SESSION['life'] = $row2['life'];
                        $_SESSION['diamonds'] = $row2['diamonds'];
                        $_SESSION['level'] += 1;
                    }
        
    ?>
    </body>
    
</html>
