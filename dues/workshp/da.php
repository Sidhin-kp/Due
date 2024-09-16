<?php
    include '../../db/db_con.php';
    $rem=$err=" ";
    $a=0;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    if(isset($_POST['sub2']))
    {
        
        if(isset($_POST['select_box'])) 
        {
            $dep = $_POST['select_box'];
       
            if(isset($_POST['batch_box'])) 
            {          
                $bt=$_POST['batch_box'];
                if($dep=="default" || $bt=="default")
                {
                    $err="select the department and batch";
                }
                else
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
                    if($due1=="" && $due2=="" && $due3=="" &&$due4=="" && $due5=="" && $due6=="")
                    {
                        $err="Enter the due";
                    }
                    else
                    {
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
                        $sql="SELECT COUNT(*) AS usercount from `$dep` WHERE `batch`='$bt'";
                        $res=mysqli_query($con,$sql);
                        $row=mysqli_fetch_array($res);
                        $count=$row['usercount'];
                        if($count>0)
                        {

                            $ssql="SELECT regno FROM `$dep` WHERE batch='$bt'";
                            $rres=mysqli_query($con,$ssql);
                            while($rrow=mysqli_fetch_assoc($rres))
                            {
                                $reg=$rrow['regno'];
                                $sqli="SELECT * FROM `$dep` WHERE regno='$reg'";
                                $resi=mysqli_query($con,$sqli);
                                $row1=mysqli_fetch_assoc($resi);
                                $n=$row1['name'];
                                $a=$row1['admno'];
                                $b=$row1['batch'];
                                $wd1=$row1['wks_carpentry'];
                                $wd2=$row1['wks_foundary'];
                                $wd3=$row1['wks_welding'];
                                $wd4=$row1['wks_fitting'];
                                $wd5=$row1['wks_smithy'];
                                $wd6=$row1['wks_sheetmetal'];
                                if($due1!="")
                                {
                                                                   
                                    if(is_null($wd1))
                                    {
                                        $ssqli="SELECT Total FROM `$dep` WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $tt=$t4+$due1;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_carpentry`='$due1' WHERE `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `wks_carpentry`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$bt','$b','$due1','$rem1')";
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
                                        $ssqli="SELECT Total FROM `$dep` WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $amount=$due1+$wd1;
                                        $tt=$t4+$due1;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_carpentry`='$amount' WHERE `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `wks_carpentry`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$bt','$b','$due1','$rem1')";
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
                                        $ssqli="SELECT Total FROM `$dep` WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $tt=$t4+$due2;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_foundary`='$due2' WHERE `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `wks_foundary`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$bt','$b','$due2','$rem2')";
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
                                        $ssqli="SELECT Total FROM `$dep` WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $amount=$due2+$wd2;
                                        $tt=$t4+$due2;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_foundary`='$amount' WHERE  `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `wks_foundary`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$bt','$b','$due2','$rem2')";
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
                                        $ssqli="SELECT Total FROM `$dep` WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $tt=$t4+$due3;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_welding`='$due3' WHERE `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `wks_welding`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$bt','$b','$due3','$rem3')";
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
                                        $ssqli="SELECT Total FROM `$dep` WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $amount=$due3+$wd3;
                                        $tt=$t4+$due3;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_welding`='$amount' WHERE  `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `wks_welding`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$bt','$b','$due3','$rem3')";
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
                                        $ssqli="SELECT Total FROM `$dep` WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $tt=$t4+$due4;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_fitting`='$due4' WHERE `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `wks_fitting`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$bt','$b','$due4','$rem4')";
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
                                        $ssqli="SELECT Total FROM `$dep` WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $amount=$due4+$wd4;
                                        $tt=$t4+$due4;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_fitting`='$amount' WHERE  `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `wks_fitting`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$bt','$b','$due4','$rem4')";
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
                                        $ssqli="SELECT Total FROM `$dep` WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $tt=$t4+$due5;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_smithy`='$due5' WHERE `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `wks_smithy`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$bt','$b','$due5','$rem5')";
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
                                        $ssqli="SELECT Total FROM `$dep` WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $amount=$due5+$wd5;
                                        $tt=$t4+$due5;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_smithy`='$amount' WHERE  `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `wks_smithy`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$bt','$b','$due5','$rem5')";
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
                                        $ssqli="SELECT Total FROM `$dep` WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $tt=$t4+$due6;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_sheetmetal`='$due6' WHERE `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `wks_sheetmetal`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$bt','$b','$due6','$rem6')";
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
                                        $ssqli="SELECT Total FROM `$dep` WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $amount=$due6+$wd6;
                                        $tt=$t4+$due6;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`wks_sheetmetal`='$amount' WHERE  `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `wks_sheetmetal`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$bt','$b','$due6','$rem6')";
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
                            }
                            }
                            else
                        {
                            echo "<script>alert('Invalid input')</script>";
                        }
                            if($a>0)
                            {
                                echo "<script>alert('due added')</script>";            
                            }
                            else
                            {
                                echo "<script>alert('ERROR!!!')</script>";   
                            } 
                        }
                    
                }
            }
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
            select{
                width:100%;
                height:200px
                text-align:center;
            }
            select.lt{
                text-align:center;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="../../resource/des.css">
        <link rel="stylesheet" type="text/css" href="../../resource/style1.css">
    </head>
        <body>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form">
            <div class="sl">
            <select name="select_box">
                <option class="lt" value="default">--Select department--</option>
                <option class="lt" value="gptc_ct">Computer engineering</option>
                <option class="lt" value="gptc_che">Computer hardware engineering</option>
                <option class="lt" value="gptc_el">Electronics engineering</option>
                <option class="lt" value="gptc_civil">Civil engineering</option>
                <option class="lt" value="gptc_civil">Mechanical engineering</option>
            </select>
            <select name="batch_box">
                <option class="lt" value="default">--Select batch--</option>
                <option class="lt" value="2018-2021">2018-21</option>
                <option class="lt" value="2019-2022">2019-22</option>
                <option class="lt" value="2020-2023">2020-23</option>
                <option class="lt" value="2021-2024">2021-24</option>
                <option class="lt" value="2022-2025">2022-25</option>
            </select>
            
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
               
            </table>
        
            <div class="err">
                <?php echo $err; ?><br>
            </div>
            <input type="submit" name="sub2" value="submit">
        </div>
        </div>

</form>
<a href="workshop.php" class="back" style="width:50px; height:30px; text-align:center;">back</a>
</body>
</html>
