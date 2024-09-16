<?php
    include '../../db/db_con.php';
    if(isset($_POST["sub0"]))
    {
        $due1=$_POST['t1'];
        $rem1=$_POST['r1'];
        $due2=$_POST['t2'];
        $rem2=$_POST['r2'];
        $due3=$_POST['t3'];
        $rem3=$_POST['r3'];
        $due4=$_POST['t4'];
        $rem4=$_POST['r4'];
        $due5=$_POST['t5'];
        $rem5=$_POST['r5'];
        $due6=$_POST['t6'];
        $rem6=$_POST['r6'];
        $reg=$_GET['data'];
        $dep=$_GET['data1'];
        if($due1=="" && $due2=="" && $due3=="" && $due4=="" && $due5=="" && $due6=="")
        {
            echo "<script>alert('please fill the fields')</script>";                          
        }
        else
        {
            $sql="SELECT * FROM `$dep` WHERE regno='$reg'";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($res);
            $t=$row['Total'];
            $wd1=$row['wks_carpentry'];
            $wd2=$row['wks_foundary'];
            $wd3=$row['wks_welding'];
            $wd4=$row['wks_fitting'];
            $wd5=$row['wks_smithy'];
            $wd6=$row['wks_sheetmetal'];
            $n=$row['name'];
            $a=$row['admno'];
            $b=$row['batch'];
            if($dep=="gptc_ct")
            {
                $d="CT";
            }
            else if($dep=="gptc_che")
            {
                $d="CHE";
            }
            else if($dep="gptc_el")
            {
                $d="EL";
            }
            else if($dep="gptc_civil")
            {
                $d="CIVIL";
            }
            else
            {
                $d="MECH";
            }
            if($due1!="")
            {                          
                if(is_null($wd1))
                {
                        $ssqli="SELECT Total FROM $dep WHERE regno='$reg'";
                        $rresi=mysqli_query($con,$ssqli);
                        $rrow1=mysqli_fetch_assoc($rresi);
                        $t4=$rrow1['Total'];
                        $tt=$t4+$due1;
                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_carpentry`='$due1' WHERE `regno`='$reg'";
                        $res_s=mysqli_query($con,$sql_s);
                                  //due add to new table
                         $sqli="INSERT INTO `wks_carpentry`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due1','$rem1')";
                        $resi=mysqli_query($con,$sqli);
                        if($res_s)
                        {
                            if($resi)
                            {
                                $a++;
                            }
                        }   
                }
                else
                {
                    $ssqli="SELECT Total FROM $dep WHERE regno='$reg'";
                    $rresi=mysqli_query($con,$ssqli);
                    $rrow1=mysqli_fetch_assoc($rresi);
                    $t4=$rrow1['Total'];
                    $amount=$due1+$wd1;
                    $tt=$t4+$due1;
                    $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_carpentry`='$amount' WHERE `regno`='$reg'";
                    $res_s=mysqli_query($con,$sql_s);
                    $sqli="INSERT INTO `wks_carpentry`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due1','$rem1')";
                    $resi=mysqli_query($con,$sqli);
                    if($res_s)
                    {
                        if($resi)
                        {
                            $a++;
                        }
                    } 
                }
            }
                            if($due2!="")
                            {
                                if(is_null($wd2))
                                {
                                    $ssqli="SELECT Total FROM $dep WHERE regno='$reg'";
                                    $rresi=mysqli_query($con,$ssqli);
                                    $rrow1=mysqli_fetch_assoc($rresi);
                                    $t4=$rrow1['Total'];
                                    $tt=$t4+$due2;
                                    $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_foundary`='$due2' WHERE `regno`='$reg'";
                                    $res_s=mysqli_query($con,$sql_s);
                                    $sqli="INSERT INTO `wks_foundary`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due2','$rem2')";
                                    $resi=mysqli_query($con,$sqli);
                                    if($res_s)
                                    {
                                        if($resi)
                                        {
                                            $a++;
                                        }
                                    } 
                                }
                                else
                                {
                                    $ssqli="SELECT Total FROM $dep WHERE regno='$reg'";
                                    $rresi=mysqli_query($con,$ssqli);
                                    $rrow1=mysqli_fetch_assoc($rresi);
                                    $t4=$rrow1['Total'];
                                    $amount=$due2+$wd2;
                                    $tt=$t4+$due2;
                                    $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_foundary`='$amount' WHERE  `regno`='$reg'";
                                    $res_s=mysqli_query($con,$sql_s);
                                    $sqli="INSERT INTO `wks_foundary`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due2','$rem2')";
                                    $resi=mysqli_query($con,$sqli);
                                    if($res_s)
                                    {
                                        if($resi)
                                        {
                                            $a++;
                                        }
                                    } 
                                }
                            }
                            if($due3!="")      
                            {                                
                                if(is_null($wd3))
                                {
                                    $ssqli="SELECT Total FROM $dep WHERE regno='$reg'";
                                    $rresi=mysqli_query($con,$ssqli);
                                    $rrow1=mysqli_fetch_assoc($rresi);
                                    $t4=$rrow1['Total'];
                                    $tt=$t4+$due3;
                                    $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_welding`='$due3' WHERE `regno`='$reg'";
                                    $res_s=mysqli_query($con,$sql_s);
                                    $sqli="INSERT INTO `wks_welding`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due3','$rem3')";
                                    $resi=mysqli_query($con,$sqli);
                                    if($res_s)
                                    {
                                        if($resi)
                                        {
                                            $a++;
                                        }
                                    } 
                                }
                                else
                                {
                                    $ssqli="SELECT Total FROM $dep WHERE regno='$reg'";
                                    $rresi=mysqli_query($con,$ssqli);
                                    $rrow1=mysqli_fetch_assoc($rresi);
                                    $t4=$rrow1['Total'];
                                    $tt=$t4+$due3;
                                    $amount=$due3+$wd3;
                                    $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_welding`='$amount' WHERE `regno`='$reg'";
                                    $res_s=mysqli_query($con,$sql_s);
                                    $sqli="INSERT INTO `wks_welding`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due3','$rem3')";
                                    $resi=mysqli_query($con,$sqli);
                                    if($res_s)
                                    {
                                        if($resi)
                                        {
                                            $a++;
                                        }
                                    } 
                                }      
                            }

                            if($due4!="")
            {                          
                if(is_null($wd4))
                {
                        $ssqli="SELECT Total FROM $dep WHERE regno='$reg'";
                        $rresi=mysqli_query($con,$ssqli);
                        $rrow1=mysqli_fetch_assoc($rresi);
                        $t4=$rrow1['Total'];
                        $tt=$t4+$due4;
                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_fitting`='$due4' WHERE `regno`='$reg'";
                        $res_s=mysqli_query($con,$sql_s);
                                  //due add to new table
                         $sqli="INSERT INTO `wks_fitting`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due4','$rem4')";
                        $resi=mysqli_query($con,$sqli);
                        if($res_s)
                        {
                            if($resi)
                            {
                                $a++;
                            }
                        }   
                }
                else
                {
                    $ssqli="SELECT Total FROM $dep WHERE regno='$reg'";
                    $rresi=mysqli_query($con,$ssqli);
                    $rrow1=mysqli_fetch_assoc($rresi);
                    $t4=$rrow1['Total'];
                    $amount=$due4+$wd4;
                    $tt=$t4+$due4;
                    $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_fitting`='$amount' WHERE `regno`='$reg'";
                    $res_s=mysqli_query($con,$sql_s);
                    $sqli="INSERT INTO `wks_fitting`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due4','$rem4')";
                    $resi=mysqli_query($con,$sqli);
                    if($res_s)
                    {
                        if($resi)
                        {
                            $a++;
                        }
                    } 
                }
            }
                            if($due5!="")
                            {
                                if(is_null($wd5))
                                {
                                    $ssqli="SELECT Total FROM $dep WHERE regno='$reg'";
                                    $rresi=mysqli_query($con,$ssqli);
                                    $rrow1=mysqli_fetch_assoc($rresi);
                                    $t4=$rrow1['Total'];
                                    $tt=$t4+$due5;
                                    $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_smithy`='$due5' WHERE `regno`='$reg'";
                                    $res_s=mysqli_query($con,$sql_s);
                                    $sqli="INSERT INTO `wks_smithy`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due5','$rem5')";
                                    $resi=mysqli_query($con,$sqli);
                                    if($res_s)
                                    {
                                        if($resi)
                                        {
                                            $a++;
                                        }
                                    } 
                                }
                                else
                                {
                                    $ssqli="SELECT Total FROM $dep WHERE regno='$reg'";
                                    $rresi=mysqli_query($con,$ssqli);
                                    $rrow1=mysqli_fetch_assoc($rresi);
                                    $t4=$rrow1['Total'];
                                    $amount=$due5+$wd5;
                                    $tt=$t4+$due5;
                                    $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_smithy`='$amount' WHERE  `regno`='$reg'";
                                    $res_s=mysqli_query($con,$sql_s);
                                    $sqli="INSERT INTO `wks_smithy`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due5','$rem5')";
                                    $resi=mysqli_query($con,$sqli);
                                    if($res_s)
                                    {
                                        if($resi)
                                        {
                                            $a++;
                                        }
                                    } 
                                }
                            }
                            if($due6!="")      
                            {                                
                                if(is_null($wd6))
                                {
                                    $ssqli="SELECT Total FROM $dep WHERE regno='$reg'";
                                    $rresi=mysqli_query($con,$ssqli);
                                    $rrow1=mysqli_fetch_assoc($rresi);
                                    $t4=$rrow1['Total'];
                                    $tt=$t4+$due6;
                                    $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_sheetmetal`='$due3' WHERE `regno`='$reg'";
                                    $res_s=mysqli_query($con,$sql_s);
                                    $sqli="INSERT INTO `wks_sheetmetal`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due6','$rem6')";
                                    $resi=mysqli_query($con,$sqli);
                                    if($res_s)
                                    {
                                        if($resi)
                                        {
                                            $a++;
                                        }
                                    } 
                                }
                                else
                                {
                                    $ssqli="SELECT Total FROM $dep WHERE regno='$reg'";
                                    $rresi=mysqli_query($con,$ssqli);
                                    $rrow1=mysqli_fetch_assoc($rresi);
                                    $t4=$rrow1['Total'];
                                    $tt=$t4+$due6;
                                    $amount=$due6+$wd6;
                                    $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_sheetmetal`='$amount' WHERE `regno`='$reg'";
                                    $res_s=mysqli_query($con,$sql_s);
                                    $sqli="INSERT INTO `wks_sheetmetal`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due6','$rem6')";
                                    $resi=mysqli_query($con,$sqli);
                                    if($res_s)
                                    {
                                        if($resi)
                                        {
                                            $a++;
                                        }
                                    } 
                                }      
                            }
                            if($a>0)
                            {
                                echo "<script>alert('due added')</script>";
                            //    header('Location: ../hod.php');          
                            }
                            else
                            {
                                echo "<script>alert('ERROR!!!')</script>";   
                            } 
       
        } 
    }
?>
<html>
    <head>
    <style>
            .sl{
                text-align: center;
                padding-top: 10%;
            }
            input[type="text"],select{
                width: 200px;
                height: 30px;
            }
            .out{
            float:right;
           }
        </style>
        <link rel="stylesheet" href="../../resource/des.css">
        <link rel="stylesheet" href="../../resource/style1.css">
    </head>
    <body>
        <form action="" method="post">
        <?php
            
            $no=$_GET['data'];
            $dep=$_GET['data1'];
            $sql="SELECT `name` from $dep WHERE `regno`='$no'";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($res);
            $n=$row['name'];
                    echo "<br><h4><center>Name : ".$n."</center></h4>";
            
                ?>
    <div class="form">
    <table>
    <tr>
                        <td>Amout of penalty - Carpentry</td>
                        <td><input type="text" name="t1"></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><input type="text" name="r1"></td>
                    </tr>  
                    <tr>
                        <td>Amout of penalty - Foundary</td>
                        <td><input type="text" name="t2"></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><input type="text" name="r2"></td>
                    </tr>  
                    <tr>
                        <td>Amout of penalty - Welding</td>
                        <td><input type="text" name="t3"></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><input type="text" name="r3"></td>
                    </tr>  
                    <tr>
                        <td>Amout of penalty - Fitting</td>
                        <td><input type="text" name="t4"></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><input type="text" name="r4"></td>
                    </tr>  
                    <tr>
                        <td>Amout of penalty - Smithy</td>
                        <td><input type="text" name="t5"></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><input type="text" name="r5"></td>
                    </tr>  
                    <tr>
                        <td>Amout of penalty - Sheetmetal</td>
                        <td><input type="text" name="t6"></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><input type="text" name="r6"></td>
                    </tr>  
                    <tr>
                        <td colspan="2"><input type="submit" name="sub0" value="submit"></td>
        </tr>            
                </table>
        </div> 
        </form>
        <a href="workshop.php" class="back"  style="width:50px; height:30px; text-align:center;">back</a>
    </body>
</html>