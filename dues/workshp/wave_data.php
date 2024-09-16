<?php
include '../../db/db_con.php';
$id = $_GET['data1'];
$no=$_GET['data2'];
$d=$_GET['data3'];
$sqli="SELECT * FROM ".$d." where `regno`=".$id;
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$c1=$row['wks_carpentry'];
$c2=$row['wks_foundary'];
$c3=$row['wks_welding'];
$c4=$row['wks_fitting'];
$c5=$row['wks_smithy'];
$c6=$row['wks_sheetmetal'];
$t=$row['Total'];

$sqlk="SELECT * FROM `$no` where `regno`='$id'";
$resk=mysqli_query($con,$sqlk);
$rowk=mysqli_fetch_assoc($resk);
$o=$rowk['due'];
$oo=$rowk['remark'];
$da=$rowk['date'];


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
if($no=="wks_carpentry")
{
    $tt=$t-$c1;
    $p=$c1-$o;
    $sql = "UPDATE $d SET Total='$tt',wks_carpentry='$p' WHERE regno = '$id'";
    $s="DELETE FROM `wks_carpentry` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="wks_foundary")
{
    $tt=$t-$c2;
    $p=$c2-$o;
    $sql = "UPDATE $d SET Total='$tt',`wks_foundary`='$p' WHERE regno = '$id'";
    $s="DELETE FROM `wks_foundary` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="wks_welding")
{
    $tt=$t-$c3;
    $p=$c3-$o;
    $sql = "UPDATE $d SET Total='$tt',wks_welding='$p' WHERE regno = '$id'";
    $s="DELETE FROM `wks_welding` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="wks_fitting")
{
    $tt=$t-$c4;
    $p=$c4-$o;
    $sql = "UPDATE $d SET Total='$tt',wks_fitting='$p' WHERE regno = '$id'";
    $s="DELETE FROM `wks_fitting` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="wks_smithy")
{
    $tt=$t-$c5;
    $p=$c5-$o;
    $sql = "UPDATE $d SET Total='$tt',wks_smithy='$p' WHERE regno = '$id'";
    $s="DELETE FROM `wks_smithy` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="wks_sheetmetal")
{
    $tt=$t-$c6;
    $p=$c6-$o;
    $sql = "UPDATE $d SET Total='$tt',wks_sheetmetal='$p' WHERE regno = '$id'";
    $s="DELETE FROM `wks_sheetmetal` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}

// Execute SQL statement
if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error ";
}
?>