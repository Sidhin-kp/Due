<?php
include '../../db/db_con.php';
$id = $_GET['data1'];
$d=$_GET['data2'];
$dep=$_GET['data3'];
if($dep=="gptc_ct")
{
  $de="ctdue";
}
else if($dep=="gptc_che")
{
  $de="chedue";
}
else if($dep=="gptc_el")
{
  $de="eldue";
}
else if($dep=="gptc_civil")
{
  $de="civildue";
}
else if($dep=="gptc_mech")
{
  $de="mechdue";
}

$sqli="SELECT * FROM `$d` where `regno`='$id'";
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$f=$row['due'];
$r=$row['remark'];
$da=$row['date'];

$sqlii="SELECT * FROM `$de` WHERE `regno`='$id'";
$resi=mysqli_query($con,$sqlii);
$rowi=mysqli_fetch_assoc($resi);
$co=$rowi['collection'];
$ree=$rowi['remark'];

$sqliy="SELECT * FROM `$dep` where `regno`='$id'";
$resy=mysqli_query($con,$sqliy);
$rowy=mysqli_fetch_assoc($resy);
$wd1=$rowy['wks_carpentry'];
$wd2=$rowy['wks_foundary'];
$wd3=$rowy['wks_welding'];
$wd4=$rowy['wks_fitting'];
$wd5=$rowy['wks_smithy'];
$wd6=$rowy['wks_sheetmetal'];
$t=$rowy['Total'];
if($d=="wks_carpentry")
{
  $tt=$t-$f;
  $p=$wd1-$f;
    $sql = "UPDATE `$dep` SET Total='$tt',wks_carpentry='$p' WHERE regno = '$id'";
    if($co=="0")
    {
      $nr=$ree."Carpentry(".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `$de` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM wks_carpentry WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Carpentry (".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `$de` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM wks_carpentry WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($d=="wks_foundary")
{
  $tt=$t-$f;
  $p=$wd1-$f;
    $sql = "UPDATE `$dep` SET Total='$tt',wks_foundary='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."Foundary (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `$de` SET `collection`='$f',`remark`='$rn' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM wks_foundary WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Foundary (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `$de` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM wks_foundary WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($d=="wks_welding")
{
  $tt=$t-$f;
  $p=$wd3-$f;
    $sql = "UPDATE `$dep` SET Total='$tt',wks_welding='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."Welding (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `$de` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM wks_welding WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Welding (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `$de` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM wks_welding WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($d=="wks_fitting")
{
  $tt=$t-$f;
  $p=$wd4-$f;
    $sql = "UPDATE `$dep` SET Total='$tt',wks_fitting='$p' WHERE regno = '$id'";
    if($co=="0")
    {
      $nr=$ree."Fitting(".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `$de` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM wks_fitting WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Fitting (".$f."/-) : ".$r."<br>";
      $sq = "UPDATE `$de` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM wks_fitting WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($d=="wks_smithy")
{
  $tt=$t-$f;
  $p=$wd5-$f;
    $sql = "UPDATE `$dep` SET Total='$tt',wks_smithy='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."Smithy (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `$de` SET `collection`='$f',`remark`='$rn' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM wks_smithy WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Smithy (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `$de` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM wks_smithy WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    
}
else if($d=="wks_sheetmetal")
{
  $tt=$t-$f;
  $p=$wd6-$f;
    $sql = "UPDATE `$dep` SET Total='$tt',wks_sheetmetal='$p' WHERE regno = '$id'";
    if(is_null($co))
    {
      $nr=$ree."Sheetmetal (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `$de` SET `collection`='$f',`remark`='$nr' WHERE `regno` = '$id'";
    $re=mysqli_query($con,$sq);
    $s="DELETE FROM wks_sheetmetal WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
      $r=mysqli_query($con,$s);
    }
    else
    {
      $ct=$co+$f;
      $nr=$ree."Sheetmetal (".$f."rs/-) : ".$r."<br>";
      $sq = "UPDATE `$de` SET `collection`='$ct',`remark`='$nr' WHERE `regno` = '$id'";
      $re=mysqli_query($con,$sq);
      $s="DELETE FROM wks_sheetmetal WHERE `due`='$f' &&`remark`='$r' && `regno`='$id' && `date`='$da'";
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
