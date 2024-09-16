<?php
    include '../../db/db_con.php';
    
    $a=0;
    if(isset($_POST['insert']))
    {
        $due=$_POST['t1'];
        $rem=$_POST['t2'];
      /*  if(isset($_GET['data']))
        {
            $bt=$_GET['data'];
        }
        if(isset($_GET['data1']))
        {
            $dep=$_GET['data1'];
        }
        if(isset($_GET['data2']))
        {
            $nn=$_GET['data2'];
        }*/
        $bt=$_GET['key2'];
        $dep=$_GET['key1'];
        $nn=$_GET['key3'];
        /*$bt='2020';
        $dep='gptc_ct';
        $nn=4;*/
        if($due=="")
        {
            $err="wrong input";                             
        }
        else
        {
       /*   $sql_query="select count(*) AS usercount from `$dep` WHERE `batch`='$bt'";
          $res=mysqli_query($con,$sql_query);
          $row=mysqli_fetch_array($res);
          $count=$row['usercount'];*/
            for($i=0;$i<$nn;$i++)
            {
                $d=is_null(`library`);
                if($d==1)
                {
                    $sql_s="UPDATE `$dep` SET `library`='$due',`library_remark`='$rem' WHERE `batch`='$bt'";
                    $res_s=mysqli_query($con,$sql_s);
                    if($res_s)
                    {
                        $a++;
                    }
                }
                
            }   
            if($a==0)
                    {
                        echo "<script>alert('ERROR!!!')</script>";                     
                    }
                    else
                    {
                        echo "<script>alert('due added')</script>";
                    } 
        }
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../resource/des.css">
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form" id="etr">
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
                    <td colspan="2"><input type="submit" name="insert" value="apply to all" style="width: 100%;"></td>
                </tr>
            </table>
        </div>
        </form>
        <div class="bak">
    <a href="lib.php" style="width:50px; height:30px; text-align:center;">back</a>
</bak>
    </body>
</html>