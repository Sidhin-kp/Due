<?php
include '../db/db_con.php';
$id = $_GET['data1'];
$no = $_GET['data2'];
$sqli="SELECT * FROM `gptc_civil` where `regno`='$id'";
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$s=$row['constructionlab'];
$h=$row['coneretelab'];
$c=$row['geolab'];
$s1=$row['envlab'];
$h1=$row['surlab'];
$c1=$row['mtlab'];
$t=$row['Total'];

$sqli="SELECT * FROM `$no` where `regno`='$id'";
$res=mysqli_query($con,$sqli);
$row=mysqli_fetch_assoc($res);
$o=$row['due'];
$oo=$row['remark'];
$da=$row['date'];
if($no=="civilconstructionlab")
{
    $tt=$t-$s;
    $p=$s-$o;
    $sql = "UPDATE gptc_civil SET Total='$tt',constructionlab='$p' WHERE regno = '$id'";
    $s="DELETE FROM `civilconstructionlab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="civilconeretelab")
{
    $tt=$t-$h;
    $p=$h-$o;
    $sql = "UPDATE gptc_civil SET Total='$tt',`coneretelab`='$p' WHERE regno = '$id'";
    $s="DELETE FROM `civilconeretelab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="civilgeotechlab")
{
    $tt=$t-$c;
    $p=$c-$o;
    $sql = "UPDATE gptc_civil SET Total='$tt',geolab='$p' WHERE regno = '$id'";
    $s="DELETE FROM `civilgeotechlab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="civilenvlab")
{
    $tt=$t-$s1;
    $p=$s1-$o;
    $sql = "UPDATE gptc_civil SET Total='$tt',envlab='$p' WHERE regno = '$id'";
    $s="DELETE FROM `civilenvlab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="civilsurveylab")
{
    $tt=$t-$h1;
    $p=$h1-$o;
    $sql = "UPDATE gptc_civil SET Total='$tt',`surlab`='$p' WHERE regno = '$id'";
    $s="DELETE FROM `civilsurveylab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
else if($no=="civilmtlab")
{
    $tt=$t-$c1;
    $p=$c1-$o;
    $sql = "UPDATE gptc_civil SET Total='$tt',mtlab='$p' WHERE regno = '$id'";
    $s="DELETE FROM `civilmtlab` WHERE `due`='$o' && `remark`='$oo' && `regno`='$id' && `date`='$da'";
    $r=mysqli_query($con,$s);
}
// Execute SQL statement
if ($con->query($sql) === TRUE) {
  echo "Record wave done successfully";
} else {
  echo "Error ";
}
?>