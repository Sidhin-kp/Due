<?php
include '../../db/db_con.php';
$id = $_GET['data1'];
$d=$_GET['data2'];
$sqli="SELECT * FROM ".$d." where `regno`=".$id;
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$c=$row['co-op_socity'];
$t=$row['Total'];

$sqlk="SELECT * FROM `co-op` where `regno`='$id'";
$resk=mysqli_query($con,$sqlk);
$rowk=mysqli_fetch_assoc($resk);
$du=$rowk['due'];
$dur=$rowk['remark'];

if($d=="gptc_ct")
{
  $de="ctdue";
}
else if($d=="gptc_che")
{
  $de="chedue";
}
else if($d=="gptc_el")
{
  $de="eldue";
}
else if($d=="gptc_civil")
{
  $de="civildue";
}
else if($d=="gptc_mech")
{
  $de="mechdue";
}

  $tt=$t-$du;
  $p=$c-$du;
    $sql = "UPDATE `$d` SET Total='$tt',`co-op_socity`='$p' WHERE regno = '$id'";
    $s="DELETE  FROM `co-op` WHERE `due`='$du' && `remark`='$dur' && `regno`='$id'";
    $r=mysqli_query($con,$s);


// Execute SQL statement
if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error ";
}
?>