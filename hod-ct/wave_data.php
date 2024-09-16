<?php
include '../db/db_con.php';
$id = $_GET['data1'];
$no = $_GET['data2'];
$sqli="SELECT * FROM `gptc_ct` where `regno`='$id'";
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$s=$row['swlab'];
$h=$row['hwlab'];
$c=$row['ccf'];
$t=$row['Total'];

$sqli="SELECT * FROM `$no` where `regno`='$id'";
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$o=$row['due'];
$oo=$row['remark'];
$da=$row['date'];
if($no=="ctswlab")
{
    $tt=$t-$s;
    $p=$s-$o;
    $sql = "UPDATE gptc_ct SET Total='$tt',swlab='$p' WHERE regno = '$id'";
    $s="DELETE FROM `ctswlab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="cthwlab")
{
    $tt=$t-$h;
    $p=$h-$o;
    $sql = "UPDATE gptc_ct SET Total='$tt',`hwlab`='$p' WHERE regno = '$id'";
    $s="DELETE FROM `cthwlab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="ctccflab")
{
    $tt=$t-$c;
    $p=$c-$o;
    $sql = "UPDATE gptc_ct SET Total='$tt',ccf='$p' WHERE regno = '$id'";
    $s="DELETE FROM `ctccflab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}

// Execute SQL statement
if ($con->query($sql) === TRUE) {
  echo "Record wave done successfully";
} else {
  echo "Error ";
}
?>