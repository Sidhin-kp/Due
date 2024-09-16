<?php
include '../db/db_con.php';
$id = $_GET['data1'];
$dep = $_GET['data2'];
$sqli="SELECT * FROM `$dep` where `regno`='$id'";
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$f=$row['due'];
$r=$row['remark'];
$da=$row['date'];

$sqlii="SELECT * FROM `eldue` WHERE `regno`='$id'";
$resi=mysqli_query($con,$sqlii);
$rowi=mysqli_fetch_assoc($resi);
$co=$rowi['collection'];
$ree=$rowi['remark'];

$sqliy="SELECT * FROM `gptc_el` where `regno`='$id'";
$resy=mysqli_query($con,$sqliy);
$rowy=mysqli_fetch_assoc($resy);
$s1=$rowy['culab'];
$s2=$rowy['dglab'];
$s3=$rowy['swlab'];
$t=$rowy['Total'];
if($dep=="elcircuitlab")
{
  $tt=$t-$f;
  $p=$s1-$f;
    $sql = "UPDATE gptc_el SET Total='$tt',culab='$p' WHERE regno = '$id'";
    if($co=="0")
    {
      $nr=$ree."Circuit Lab (".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `eldue` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM elcircuitlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Circuit Lab (".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `eldue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM elcircuitlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($dep=="eldigitallab")
{
  $tt=$t-$f;
  $p=$s2-$f;
    $sql = "UPDATE gptc_el SET Total='$tt',dglab='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."Digital Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `eldue` SET `collection`='$f',`remark`='$rn' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM eldigitallab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Digital Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `eldue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM eldigitallab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($dep=="elswlab")
{
  $tt=$t-$f;
  $p=$s3-$f;
    $sql = "UPDATE gptc_el SET Total='$tt',swlab='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."Software Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `eldue` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM elswlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Software Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `eldue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM elswlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}

// Execute SQL statement
if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error ";
}
?>