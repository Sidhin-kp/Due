<?php
    include '../db/db_con.php';
    $err=" ";
    if(isset($_POST['submit']))
    {
        $no=$_POST['reg'];
        if($no!="")
        {
            $sql_query="select count(*) AS usercount from `gptc_el` WHERE `regno`='$no';";
            $res=mysqli_query($con,$sql_query);
            $row=mysqli_fetch_array($res);
            $count=$row['usercount'];
            if($count==1)
            {

                header('Location: apply.php?data=' . $no);
            }
            else
            {
                echo "<script>alert('Invalid register number')</script>";
            }
        }
        else
        {
            echo "<script>alert('Enter the register number')</script>";
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
            <form  method="post" action="">
                <input type="text" name="reg" placeholder="Enter register number " style="width:250px; height:30px;">
                <input type="submit" name="submit" value="search" style="width:50px; height:30px;">
                <br><br><br>               
            </form>
        </div>
        </div>
        <a href="hod.php" class="back" style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
    </body>
</html>