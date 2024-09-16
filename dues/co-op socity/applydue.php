<?php
    include '../../db/db_con.php';
    if(isset($_POST["sub0"]))
    {
        $due=$_POST['t1'];
        $rem=$_POST['t2'];
        $no=$_GET['data'];
        $dep=$_GET['data1'];
        if($due=="")
        {
            echo "<script>alert('please fill the fields')</script>";                          
        }
        else
        {
            $sql="SELECT * FROM `$dep` WHERE regno='$no'";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($res);
            $t=$row['Total'];
            $p=$row['co-op_socity'];
            $n=$row['name'];
            $a=$row['admno'];
            $b=$row['batch'];
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
            if(is_null($p))
            {
                $sq="UPDATE `$dep` SET `Total`='$tt',`co-op_socity`='$due' WHERE `regno`='$no'";
                $sqli="INSERT INTO `co-op`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$no','$a','$d','$b','$due','$rem')";
                $resi=mysqli_query($con,$sqli);
                if(!$resi)
                {
                    echo "<script>alert(error to insert)</script>";
                }
            }
            else
            {
                $amont=$p+$due;
                $sq="UPDATE `$dep` SET `Total`='$tt',`co-op_socity`='$amont' WHERE `regno`='$no'";
                $sqli="INSERT INTO `co-op`(`name`,`regno`,`admno`,`department`,`batch`,`due`,`remark`) VALUES ('$n','$no','$a','$d','$b','$due','$rem')";
                $resi=mysqli_query($con,$sqli);
            }
            
            $qu=mysqli_query($con,$sq);
            if($qu)
            {
                echo "<script>alert('due added')</script>";
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
                        <td>Amout of penalty</td>
                        <td><input type="text" name="t1"></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><input type="text" name="t2"></td>
                    </tr>                   
                    <tr>
                        <td colspan="2"><input type="submit" name="sub0" style="width: 100%;"></td>
                    </tr>
                </table>
        </div> 
        </form>
        <a href="co-op.php" class="back"  style="width:100px; height:30px; text-align:center;">back</a>
    </body>
</html>