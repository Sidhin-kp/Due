<?php
    include '../../db/db_con.php';
     if(isset($_POST['out']))
     {
        header("Location: ../../home.html");
    }   
?>
<html>
    <head>
    <style>
            .sl{
                text-align: center;
                padding-top: 10%;
            }
            input[type="text"],select{
                width: 200px;
                height: 30px;
            }
            .out{
            float:right;
           }
        </style>
       <link rel="stylesheet" href="../../resource/style1.css">
    </head>
    <body>
    <div class="out">
                <form action="" method="post">
                    <input type="submit" value="Logout" name="out" style="width:80px;">
                </form>
            </div>
        <center> 
            
    <h1><center>WORKSHOP
            <br>Government Polytechnic College Chelakkara</center></h1>                  
            <br><br><br>
            
        <div class="menu">
            <a href="due1.php" style="width:300px;">Due for 1 student</a><br>
            <a href="da.php" style="width:300px;">Due for a class of students</a><br>
            <a href="view.php" style="width:300px;">View a class of students data</a><br>
            <a href="disone.php" style="width:300px;">View a student data</a><br>
            <a href="deta.php" style="width:300px;">Detailed view</a>
        </center>
        </div> 
    </body>
</html>