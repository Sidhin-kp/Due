<?php
include '../db/db_con.php';
$id = $_GET['data1'];
$no = $_GET['data2'];
$sqli="SELECT * FROM `gptc_el` where `regno`='$id'";
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$s=$row['culab'];
$h=$row['dglab'];
$c=$row['swlab'];
$t=$row['Total'];

$sqli="SELECT * FROM `$no` where `regno`='$id'";
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$o=$row['due'];
$oo=$row['remark'];
$da=$row['date'];
if($no=="elcircuitlab")
{
    $tt=$t-$s;
    $p=$s-$o;
    $sql = "UPDATE gptc_el SET Total='$tt',culab='$p' WHERE regno = '$id'";
    $s="DELETE FROM `elcircuitlab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="eldigitallab")
{
    $tt=$t-$h;
    $p=$h-$o;
    $sql = "UPDATE gptc_el SET Total='$tt',`dglab`='$p' WHERE regno = '$id'";
    $s="DELETE FROM `eldigitallab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="elswlab")
{
    $tt=$t-$c;
    $p=$c-$o;
    $sql = "UPDATE gptc_el SET Total='$tt',swlab='$p' WHERE regno = '$id'";
    $s="DELETE FROM `elswlab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}

// Execute SQL statement
if ($con->query($sql) === TRUE) {
  echo "Record wave done successfully";
} else {
  echo "Error ";
}
?>