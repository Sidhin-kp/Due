<?php
    include '../db/db_con.php';
    if(isset($_POST['out'])){
        header("Location: ../home.html");
    }
?>

<html>
    <head>
        <style>
            .sl{
                text-align: center;
                padding-top: 10%;
            }
            .out{
            float:right;
           }
        </style>
        <link rel="stylesheet" href="../resource/des.css">
        <link rel="stylesheet" href="../resource/style1.css">
    </head>
    <body>
        <div class="out">
            <form action="" method="post">
                <input type="submit" value="Logout" name="out" style="width:80px;">
            </form>
        </div>
        <div class="form">
            <div class="sl">
                <br>
                <a href="reset.php" class="mlink" style="width: 300px;">Reset user password</a>
                <br><br>
                <a href="usercrt.php" class="mlink" style="width: 300px;">Create user</a><br>
            </div>
        </div>
    </body>
</html>