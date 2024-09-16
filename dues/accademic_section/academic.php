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
         
    <h1><center>ACADEMIC SECTION
            <br>Government Polytechnic College Chelakkara</center></h1>          
            <div class="menu" style="height:500px">
           <center>            
            <br><br><br>
            <a href="due1.php" class="mlink" style="width:400px;">Due for 1 student</a><br><br>
            <a href="da.php" class="mlink" style="width:400px;">Due for a class of students</a><br><br>
            <a href="view.php" class="mlink" style="width:400px;">View a class of students data</a><br><br>
            <a href="disone.php" class="mlink" style="width:400px;">View a student data</a><br><br>
            <a href="det.php" class="mlink" style="width:400px;">Detailed view</a><br><br>
        <!--    <a href="move.php" class="mlink" style="width:400px;">Remove Data</a><br><br>  -->
         <!--   <a href="viewprev.php" class="mlink" style="width:400px;">View Previous Records</a> -->
        </center>
        </div> 
    </body>
</html>