<?php
include '../db/db_con.php';
$id = $_GET['data1'];
$no = $_GET['data2'];
$sqli="SELECT * FROM `gptc_mech` where `regno`='$id'";
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$s=$row['flulab'];
$h=$row['helab'];
$c=$row['imslab'];
$c1=$row['bmslab'];
$t=$row['Total'];

$sqli="SELECT * FROM `$no` where `regno`='$id'";
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$o=$row['due'];
$oo=$row['remark'];
$da=$row['date'];
if($no=="mechfluidlab")
{
    $tt=$t-$s;
    $p=$s-$o;
    $sql = "UPDATE gptc_mech SET Total='$tt',flulab='$p' WHERE regno = '$id'";
    $s="DELETE FROM `mechfluidlab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="mechhelab")
{
    $tt=$t-$h;
    $p=$h-$o;
    $sql = "UPDATE gptc_mech SET Total='$tt',`helab`='$p' WHERE regno = '$id'";
    $s="DELETE FROM `mechhelab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="mechimslab")
{
    $tt=$t-$c;
    $p=$c-$o;
    $sql = "UPDATE gptc_mech SET Total='$tt',imslab='$p' WHERE regno = '$id'";
    $s="DELETE FROM `mechimslab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="mechbmelab")
{
    $tt=$t-$c1;
    $p=$c1-$o;
    $sql = "UPDATE gptc_mech SET Total='$tt',bmslab='$p' WHERE regno = '$id'";
    $s="DELETE FROM `mechbmelab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}

// Execute SQL statement
if ($con->query($sql) === TRUE) {
  echo "Record wave done successfully";
} else {
  echo "Error ";
}
?>