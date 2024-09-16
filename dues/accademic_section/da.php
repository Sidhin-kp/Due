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
                    $due=$_POST['t1'];
                    $rem=$_POST['t2'];
                    if($due=="")
                    {
                        $err="Enter the due";
                    }
                    else{
                        $sql="select COUNT(*) AS usercount from `$dep` WHERE `batch`='$bt'";
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
                                    $t=$row1['Total'];
                                    $p=$row1['academic_section'];
                                    $n=$row1['name'];
                                    $a=$row1['admno'];
                                    $b=$row1['batch'];
                                    $tt=$t+$due;
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
                                    $tt=$t+$due;
                                    if(is_null($p))
                                    {
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`academic_section`='$due' WHERE `regno`='$reg'";
                                        $sqli="INSERT INTO `academic_section`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due','$rem')";
                                        $resi=mysqli_query($con,$sqli);
                                    }
                                    else{
                                        $amont=$p+$due;
                                        $sql_s="UPDATE `$dep` SET `Total`='$tt',`academic_section`='$amont' WHERE `regno`='$reg'";
                                        $sqli="INSERT INTO `academic_section`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$reg','$a','$d','$b','$due','$rem')";
                                        $resi=mysqli_query($con,$sqli);
                                    }
                                $res_s=mysqli_query($con,$sql_s);
                                if($res_s)
                                {
                                   $a++;
                                }                                   
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
                        else
                        {
                            echo "<script>alert('Invalid input')</script>";
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
        <link rel="stylesheet" href="../../resource/style1.css">
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
                    <td>Amout of penalty</td>
                    <td><input type="text" name="t1"></td>
                </tr>
                <tr>
                    <td>Remarks</td>
                    <td><input type="text" name="t2"></td>
                </tr>                   
               
            </table>
        
            <div class="err">
                <?php echo $err; ?><br>
            </div>
            <input type="submit" name="sub2" value="submit">
        </div>
        </div>

</form>
<a href="academic.php" class="back"  style="width:50px; height:30px; text-align:center;">back</a>
</body>
</html>