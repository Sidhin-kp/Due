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

$sqlii="SELECT * FROM `civildue` WHERE `regno`='$id'";
$resi=mysqli_query($con,$sqlii);
$rowi=mysqli_fetch_assoc($resi);
$co=$rowi['collection'];
$ree=$rowi['remark'];

$sqliy="SELECT * FROM `gptc_civil` where `regno`='$id'";
$resy=mysqli_query($con,$sqliy);
$rowy=mysqli_fetch_assoc($resy);
$s1=$rowy['constructionlab'];
$s2=$rowy['coneretelab'];
$s3=$rowy['geolab'];
$s4=$rowy['envlab'];
$s5=$rowy['surlab'];
$s6=$rowy['mtlab'];
$t=$rowy['Total'];
if($dep=="civilconstructionlab")
{
  $tt=$t-$f;
  $p=$s1-$f;
    $sql = "UPDATE gptc_civil SET Total='$tt',constructionlab='$p' WHERE regno = '$id'";
    if($co=="0")
    {
      $nr=$ree."Construction Lab (".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `civildue` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM civilconstructionlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Construction Lab (".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `civildue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM civilconstructionlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($dep=="civilconeretelab")
{
  $tt=$t-$f;
  $p=$s2-$f;
    $sql = "UPDATE gptc_civil SET Total='$tt',coneretelab='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."Conerete Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `civildue` SET `collection`='$f',`remark`='$rn' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM civilconeretelab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Conerete Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `civildue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM civilconeretelab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($dep=="civilgeotechlab")
{
  $tt=$t-$f;
  $p=$s3-$f;
    $sql = "UPDATE gptc_civil SET Total='$tt',geolab='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."Geotech (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `civildue` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM civilgeotechlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Geotech (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `civildue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM civilgeotechlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($dep=="civilenvlab")
{
  $tt=$t-$f;
  $p=$s4-$f;
    $sql = "UPDATE gptc_civil SET Total='$tt',envlab='$p' WHERE regno = '$id'";
    if($co=="0")
    {
      $nr=$ree."ENV Lab (".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `civildue` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM civilenvlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."ENV Lab (".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `civildue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM civilenvlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($dep=="civilsurveylab")
{
  $tt=$t-$f;
  $p=$s5-$f;
    $sql = "UPDATE gptc_civil SET Total='$tt',surlab='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."Survey Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `civildue` SET `collection`='$f',`remark`='$rn' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM civilsurveylab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Survey Lab (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `civildue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM civilsurveylab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($dep=="civilmtlab")
{
  $tt=$t-$f;
  $p=$s6-$f;
    $sql = "UPDATE gptc_civil SET Total='$tt',mtlab='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."MT (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `civildue` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM civilmtlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."MT (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `civildue` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM civilmtlab WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
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