<?php
    include '../../db/db_con.php';
    $re=$err=" ";
    $amount=$tt=$a=0;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['sub2']))
        {
            if(isset($_POST['batch_box'])) 
            {          
                $bt=$_POST['batch_box'];
                if($bt=="default")
                {
                    $err="select the batch";
                }
                else
                {
                    $due1=$_POST['t1'];
                    $rem1=$_POST['t2'];
                    $due2=$_POST['t3'];
                    $rem2=$_POST['t4'];
                    $due3=$_POST['t5'];
                    $rem3=$_POST['t6'];
                    $due4=$_POST['t7'];
                    $rem4=$_POST['t8'];
                    if($due1=="" && $due2=="" && $due3=="" && $due4=="")
                    {
                        $err="Enter the due";
                    }
                    else
                    {
                        $sql="select COUNT(*) AS usercount from `gptc_mech` WHERE `batch`='$bt'";
                        $res=mysqli_query($con,$sql);
                        $row=mysqli_fetch_array($res);
                        $count=$row['usercount'];
                        if($count>0)
                        {

                            $ssql="SELECT regno FROM gptc_mech WHERE batch='$bt'";
                            $rres=mysqli_query($con,$ssql);
                            while($rrow=mysqli_fetch_assoc($rres))
                            {
                                $reg=$rrow['regno'];
                                $sqli="SELECT * FROM gptc_mech WHERE regno='$reg'";
                                $resi=mysqli_query($con,$sqli);
                                $row1=mysqli_fetch_assoc($resi);
                                $n=$row1['name'];
                                $a=$row1['admno'];
                                $b=$row1['batch'];
                                $t1=$row1['flulab'];
                                $t2=$row1['helab'];
                                $t3=$row1['imslab'];
                                $t5=$row1['bmslab'];
                                if($due1!="")
                                {
                                                                   
                                    if(is_null($t1))
                                    {
                                        $ssqli="SELECT Total FROM gptc_mech WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $tt=$t4+$due1;
                                        $sql_s="UPDATE `gptc_mech` SET `Total`='$tt',`flulab`='$due1' WHERE `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `mechfluidlab`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','MECH','$b','$due1','$rem1')";
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
                                        $ssqli="SELECT Total FROM gptc_mech WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $amount=$due1+$t1;
                                        $tt=$t4+$due1;
                                        $sql_s="UPDATE `gptc_mech` SET `Total`='$tt',`flulab`='$amount' WHERE `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `mechfluidlab`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','MECH','$b','$due1','$rem1')";
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
                                    if(is_null($t2))
                                    {
                                        $ssqli="SELECT Total FROM gptc_mech WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $tt=$t4+$due2;
                                        $sql_s="UPDATE `gptc_mech` SET `Total`='$tt',`helab`='$due2' WHERE `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `mechhelab`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','MECH','$b','$due2','$rem2')";
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
                                        $ssqli="SELECT Total FROM gptc_mech WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $amount=$due2+$t2;
                                        $tt=$t4+$due2;
                                        $sql_s="UPDATE `gptc_mech` SET `Total`='$tt',`helab`='$amount' WHERE  `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `mechhelab`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','MECH','$b','$due2','$rem2')";
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
                                    if(is_null($t3))
                                    {
                                        $ssqli="SELECT Total FROM gptc_mech WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $tt=$t4+$due3;
                                        $sql_s="UPDATE `gptc_mech` SET `Total`='$tt',`imslab`='$due3' WHERE `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `mechimslab`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','MECH','$b','$due3','$rem3')";
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
                                        $ssqli="SELECT Total FROM gptc_mech WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $amount=$due3+$t3;
                                        $tt=$t4+$due3;
                                        $sql_s="UPDATE `gptc_mech` SET `Total`='$tt',`imslab`='$amount' WHERE  `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `mechimslab`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','MECH','$b','$due3','$rem3')";
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
                                    if(is_null($t5))
                                    {
                                        $ssqli="SELECT Total FROM gptc_mech WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $tt=$t4+$due3;
                                        $sql_s="UPDATE `gptc_mech` SET `Total`='$tt',`bmslab`='$due4' WHERE `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `mechbmelab`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','MECH','$b','$due4','$rem4')";
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
                                        $ssqli="SELECT Total FROM gptc_mech WHERE regno='$reg'";
                                        $rresi=mysqli_query($con,$ssqli);
                                        $rrow1=mysqli_fetch_assoc($rresi);
                                        $t4=$rrow1['Total'];
                                        $amount=$due4+$t5;
                                        $tt=$t4+$due4;
                                        $sql_s="UPDATE `gptc_mech` SET `Total`='$tt',`bmslab`='$amount' WHERE  `regno`='$reg'";
                                        $res_s=mysqli_query($con,$sql_s);
                                        $sqli="INSERT INTO `mechbmelab`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','MECH','$b','$due4','$rem4')";
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
            .tooltip {
			position: relative;
			display: inline-block;
			border-bottom: 1px dotted black;
		}
		
		.tooltip .tooltiptext {
			visibility: hidden;
			width: 100%;
			background-color: #fefefe;
			color: black;
			text-align: center;
			border-radius: 6px;
			padding: 5px 0;
			
			/* Position the tooltip text */
			position: absolute;
			z-index: 1;
		}
		
		.tooltip:hover .tooltiptext {
			visibility: visible;
		}

        </style>
        <link rel="stylesheet" type="text/css" href="../../resource/des.css">
        <link rel="stylesheet" type="text/css" href="../../resource/style1.css">
    </head>
        <body>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form">
            <div class="sl">
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
                        <td>Fluid Lab</td>
                        <td><div class="tooltip"><input type="text" name="t1">
                        <span class="tooltiptext">Enter the Fluid lab due</span></div></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td>
                        <div class="tooltip"><input type="text" name="t2" >
                        <span class="tooltiptext">Enter the reson for Fluid lab due</span></div>
                    </td>
                    
                    </tr> 
                    <tr>
                        <td>Heat Engine Lab</td>
                        <td><div class="tooltip"><input type="text" name="t3">
                        <span class="tooltiptext">Enter the Heat Engine lab due</span></div></td>
                    </tr>  
                    <tr>
                        <td>Remarks</td>
                        <td>
                        <div class="tooltip"><input type="text" name="t4" >
                        <span class="tooltiptext">Enter the reson for Heat Engine lab due</span></div>
                    </td>
                    </tr>                    
                    <tr>
                        <td>IMS Lab</td>
                        <td><div class="tooltip"><input type="text" name="t5">
                        <span class="tooltiptext">Enter the ims lab due</span></div></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><div class="tooltip"><input type="text" name="t6">
                        <span class="tooltiptext">Enter the reson for ims lab due</span></div>
                    </td>
                    </tr>     
                    <tr>
                        <td>BME Lab</td>
                        <td><div class="tooltip"><input type="text" name="t7">
                        <span class="tooltiptext">Enter the bme lab due</span></div></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><div class="tooltip"><input type="text" name="t8">
                        <span class="tooltiptext">Enter the reson for bme lab due</span></div>
                    </td>
                    </tr>           
                </table> 
        
            <div class="err">
                <?php echo $err; ?><br>
            </div> 
            <input type="submit" name="sub2" value="submit">
        </div>
        </div>

</form>
<a href="../hod.php" class="back" style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
</body>
</html>