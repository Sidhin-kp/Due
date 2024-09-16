<?php
include '../db/db_con.php';

if(isset($_POST['insert']))
{
                    $tot=$_POST['t1'];
                    $day=$_POST['t2'];
                    $lday=$_POST['attent'];
                    $ch=$_POST['char'];


$no=$_GET['data'];
if($tot=="" || $day=="" || $lday=="" || $ch=="")
{
    echo "<script>alert('please fill the fields')</script>";                          
}
else
{
    $sq="UPDATE `gptc_ct` SET `total_days`='$tot',`attendence`='$day',`last_date`='$lday',`character`='$ch' WHERE `regno`='$no'";
    $qu=mysqli_query($con,$sq);
    if($qu)
    {
        echo "<script>alert('record added')</script>";                
    } 
    else
    {
        echo "<script>alert('ERROR!!!')</script>";
    }
}
} 

?>
<html>
<head>
    <link rel="stylesheet" href="../resource/des.css">
<link rel="stylesheet" href="../resource/style1.css">
    </head>
    <body>
    <?php
            
            $no=$_GET['data'];
            $sql="SELECT `name` from `gptc_ct` WHERE `regno`='$no'";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($res);
            $n=$row['name'];
                    echo "<br><h4><center>Name : ".$n."</center></h4>";
            
                ?>
        <form method="post" action="">
            <div class="form">
    <table>
                <tr>
                        <td>Total number of working days</td>
                        <td><input type="text" name="t1" style="width:250px;"></td>
                    </tr>
                    <tr>
                        <td>Total number of days attendand</td>
                        <td><input type="text" name="t2" style="width:250px;"></td>
                    </tr>
                    <tr>
                        <td>Last date of attendance</td>
                        <td><input type="date" name="attent" style="width:250px;"></td>
                    </tr>
                    <tr>
                        <td>Character</td>
                        <td><input type="text" name="char" style="width:250px;"></td>
                    </tr>                   
                    <tr>
                        <td colspan="2"><input type="submit" name="insert" style="width: 100%;"></td>
                    </tr>
                </table>
</div>
</form>
<div class="bak">
<a href="hod.php" class="back"style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a></div>
</body>
</html>