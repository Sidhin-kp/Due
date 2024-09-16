<?php
include '../../db/db_con.php';
if(isset($_POST['submit']))
{
    if(empty($_POST['name']))
    {
        echo "<script>alert('enter name')</script>";
    }
    else
    {
        $n=$_POST['name'];
        if(empty($_POST['reg']))
        {
            echo "<script>alert('enter register number')</script>";
        }
        else
        {
            $r=$_POST['reg'];
            if(empty($_POST['adm']))
            {
                echo "<script>alert('enter admission number')</script>";
            }
            else
            {
                $a=$_POST['adm'];
                if(empty($_POST['btch']))
                {
                    echo "<script>alert('enter batch')</script>";
                }
                else
                {
                    $sql = "SELECT * FROM `gptc_mech` WHERE regno = '$r'";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $count = mysqli_num_rows($result);
                    if($count == 1) {
                        echo "<script>alert('check regno')</script>";
                    }
                    else{
                        
                        $b=$_POST['btch'];
                        $sql="insert into `gptc_mech`(`name`,`regno`,`admno`,`department`,`batch`)values('$n','$r','$a','MECH','$b')";
                        $query=mysqli_query($con,$sql);
                        $sqli="insert into `mechdue`(`name`,`regno`,`admno`,`department`,`batch`)values('$n','$r','$a','MECH','$b')";
                        $query=mysqli_query($con,$sqli);
                        echo "<script>alert('successfull')</script>";
                    }
                }
                    
            }
        }
                
    }
}
?>

<html>
    <head>
        <link rel="stylesheet" href="../../resource/des.css">
        <link rel="stylesheet" href="../../resource/style1.css">
        <style>
            .sl{
                text-align: center;
                padding-top: 10%;
            }
            a:link,a:visited{
                width:350px;
            }
            .bk{
                width:50px;
                height:30px;
                text-align:center;
                
            }
            table{
        margin: auto;
        text-align:center;
        padding:20px;
        border-collapse:collapse;
    }
        </style>
    </head>
    <body>
        <div class="form">
            <div class="sl">
            <a href="import.php" class="mlink">Add whole students data</a><br><br>
            <a href="#one" class="mlink">Add a student data</a>
        </div>
        </div>
            <br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="form" id="one">
            <div class="sl">
            <h1>Student Registration</h1>
            <br><br>
            <form name="f1" method="post" action="">
                <table>
                   
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name">                        
                        </td>
                        </tr>
                        <tr>
                            <td>Register Number</td>
                            <td><input type="number" name="reg">                           
                        </td>
                        <tr>
                            <td>Amission Number</td>
                            <td><input type="number" name="adm">                           
                        </td>
                        </tr>
                       
                        <tr>
                            <td>Batch</td>
                            <td><input type="text" name="btch" placeholder="2020-2023"></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="submit" style="width:100%;">
                            </td>
                        </tr>
                   
                </table>
            </form>
        </div>
        </div>

        </form>
    </div>
</div>
        </div>
            <br><br><br><br><br><br><br>
            <a href="../hod.php" class="back"style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
       
    </body>
</html>