<?php
include '../db/db_con.php';
$id = $_GET['data1'];
$no = $_GET['data2'];
$sqli="SELECT * FROM `gptc_che` where `regno`='$id'";
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$s=$row['swlab'];
$h=$row['hwlab'];
$c=$row['nwlab'];
$t=$row['Total'];

$sqli="SELECT * FROM `$no` where `regno`='$id'";
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$o=$row['due'];
$oo=$row['remark'];
$da=$row['date'];
if($no=="cheswlab")
{
    $tt=$t-$s;
    $p=$s-$o;
    $sql = "UPDATE gptc_che SET Total='$tt',swlab='$p' WHERE regno = '$id'";
    $s="DELETE FROM `cheswlab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="chehwlab")
{
    $tt=$t-$h;
    $p=$h-$o;
    $sql = "UPDATE gptc_che SET Total='$tt',`hwlab`='$p' WHERE regno = '$id'";
    $s="DELETE FROM `chehwlab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="chenwlab")
{
    $tt=$t-$c;
    $p=$c-$o;
    $sql = "UPDATE gptc_che SET Total='$tt',nwlab='$p' WHERE regno = '$id'";
    $s="DELETE FROM `chenwlab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}

// Execute SQL statement
if ($con->query($sql) === TRUE) {
  echo "Record wave done successfully";
} else {
  echo "Error ";
}
?>