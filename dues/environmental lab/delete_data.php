<?php
include '../../db/db_con.php';
$id = $_GET['key'];
$d=$_GET['key2'];
$sqli="SELECT * FROM ".$d." where `regno`=".$id;
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$c=$row['environmental_lab'];
$t=$row['Total'];

$sqlk="SELECT * FROM `evn` where `regno`=".$id;
$resk=mysqli_query($con,$sqlk);
$rowk=mysqli_fetch_assoc($resk);
$du=$rowk['due'];
$dur=$rowk['remark'];
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
$sqlii="SELECT * FROM `$de` WHERE `regno`=".$id;
$resi=mysqli_query($con,$sqlii);
$rowi=mysqli_fetch_assoc($resi);
$co=$rowi['collection'];
$ree=$rowi['reason'];
  $tt=$t-$du;
  $p=$c-$du;
    $sql = "UPDATE `$d` SET Total='$tt',environmental_lab='$p' WHERE regno = '$id'";
    if($co=="0")
    {
      $nr=$ree."Environmental Lab (".$du."/-) : ".$dur."<br>";
      $sq = "UPDATE `$de` SET `collection`='$du',`reason`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM evn WHERE `due`='$du' &&`remark`='$dur' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$du;
      $nr=$ree."Environmental Lab (".$du."/-) : ".$dur."<br>";
      $sq = "UPDATE `$de` SET `collection`='$ct',`reason`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM evn WHERE `due`='$du' &&`remark`='$dur' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }


// Execute SQL statement
if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error ";
}
?>
