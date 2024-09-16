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

$sqlii="SELECT * FROM `chedue` WHERE `regno`='$id'";
$resi=mysqli_query($con,$sqlii);
$rowi=mysqli_fetch_assoc($resi);
$co=$rowi['collection'];
$ree=$rowi['remark'];

$sqliy="SELECT * FROM `gptc_che` where `regno`='$id'";
$resy=mysqli_query($con,$sqliy);
$rowy=mysqli_fetch_assoc($resy);
$s1=$rowy['swlab'];
$s2=$rowy['hwlab'];
$s3=$rowy['nwlab'];
$t=$rowy['Total'];
if($dep=="cheswlab")
{
  $tt=$t-$f;
  $p=$s1-$f;
    $sql = "UPDATE `gptc_che` SET Total='$tt',swlab='$p' WHERE regno = '$id'";
    if($co=="0")
    {
      $nr=$ree."Software Lab (".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `chedue` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM cheswlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Software Lab (".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `chedue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM cheswlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($dep=="chehwlab")
{
  $tt=$t-$f;
  $p=$s2-$f;
    $sql = "UPDATE gptc_che SET Total='$tt',hwlab='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."Hardware Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `chedue` SET `collection`='$f',`remark`='$rn' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM chehwlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Hardware Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `chedue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM chehwlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($dep=="chenwlab")
{
  $tt=$t-$f;
  $p=$s3-$f;
    $sql = "UPDATE gptc_che SET Total='$tt',nwlab='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."Network Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `chedue` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM chenwlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Network Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `chedue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM chenwlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
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