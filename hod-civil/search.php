<?php
    include '../db/db_con.php';
    $no=" ";
    if(isset($_POST['submit']))
    {
        $no=$_POST['reg'];
        if($no=="")
        {
            echo "<script>alert('enter register number')</script>";
        }
        else
        {
            $sql="select COUNT(*) AS usercount from `gptc_civil` WHERE `regno`='$no'";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($res);
            $count=$row['usercount'];
            if($count==1)
            {
                header('Location: res.php?data=' . $no );
            }
            else
            {
                echo "<script>alert('invalid register number')</script>";
            }
        }
        
    }
?>
<html>
    <head>
    <style>
            .sl{
                text-align: center;
                padding-top: 10%;
            }
        </style>
   <link rel="stylesheet" href="../resource/des.css">
<link rel="stylesheet" href="../resource/style1.css">
    </head>
    <body>
        <div class="form">
            <div class="sl">
                Search student details
            <form name="fm1" method="post" action="">
                <input type="text" name="reg" placeholder="Enter register number " style="width:250px; height:30px;">
                <br><br>
                <input type="submit" name="submit" value="search" style="width:250px; height:30px;">      
            </form>
        </div>
        </div>
        <a href="hod.php" class="back"style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
    </body>
</html>