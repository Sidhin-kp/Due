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

$sqlii="SELECT * FROM `mechdue` WHERE `regno`='$id'";
$resi=mysqli_query($con,$sqlii);
$rowi=mysqli_fetch_assoc($resi);
$co=$rowi['collection'];
$ree=$rowi['remark'];

$sqliy="SELECT * FROM `gptc_mech` where `regno`='$id'";
$resy=mysqli_query($con,$sqliy);
$rowy=mysqli_fetch_assoc($resy);
$s1=$rowy['flulab'];
$s2=$rowy['helab'];
$s3=$rowy['imslab'];
$s4=$rowy['bmslab'];
$t=$rowy['Total'];
if($dep=="mechfluidlab")
{
  $tt=$t-$f;
  $p=$s1-$f;
    $sql = "UPDATE gptc_mech SET Total='$tt',flulab='$p' WHERE regno = '$id'";
    if($co=="0")
    {
      $nr=$ree."Fluid Lab (".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `mechdue` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM mechfluidlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Fluid Lab (".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `mechdue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM mechfluidlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($dep=="mechhelablab")
{
  $tt=$t-$f;
  $p=$s2-$f;
    $sql = "UPDATE gptc_mech SET Total='$tt',helab='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."Heat Engine Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `mechdue` SET `collection`='$f',`remark`='$rn' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM mechhelablab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Heat Engine Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `mechdue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM mechhelablab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($dep=="mechimslab")
{
  $tt=$t-$f;
  $p=$s3-$f;
    $sql = "UPDATE gptc_mech SET Total='$tt',imslab='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."IMS Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `mechdue` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM mechimslab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."IMS Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `mechdue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM mechimslab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($dep=="mechbmelab")
{
  $tt=$t-$f;
  $p=$s4-$f;
    $sql = "UPDATE gptc_mech SET Total='$tt',bmslab='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."BME Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `mechdue` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM mechbmelab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."BME Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `mechdue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM mechbmelab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
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