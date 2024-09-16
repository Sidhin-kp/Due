<?php
    include '../../db/db_con.php';
    $err=$no=" ";
    if(isset($_POST['submit']))
    {
        $bt=$_POST['batch_box'];
        if($bt=="default")
        {
            $err="Select the batch";
        }
        else
        {
            $dep=$_POST['select_box'];
            if($dep=="default")
            {
                $err="Select the department";
            }
            else
            {
                $no=$_POST['reg'];
                if($no=="")
                {
                    echo "<script>alert('enter register number')</script>";
                }
                else
                {
                    $sql="select COUNT(*) AS usercount from `$dep` WHERE `regno`='$no' && `batch`='$bt'";
                    $res=mysqli_query($con,$sql);
                    $row=mysqli_fetch_array($res);
                    $count=$row['usercount'];
                    if($count==1)
                    {
                        header('Location: res.php?data=' . $bt. '&key1=' . $dep . '&key2=' . $no);
                    }
                    else
                    {
                        echo "<script>alert('invalid details')</script>";
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
        </style>
   <link rel="stylesheet" href="../../resource/des.css">
    </head>
    <body>
        <div class="form">
            <div class="sl">
                Search student due details
            <form name="fm1" method="post" action="">
                
                <select name="batch_box">
                <option class="lt" value="default">--Select batch--</option>
                <option class="lt" value="2018-2021">2018-21</option>
                <option class="lt" value="2019-2022">2019-22</option>
                <option class="lt" value="2020-2023">2020-23</option>
                <option class="lt" value="2021-2024">2021-24</option>
                <option class="lt" value="2022-2025">2022-25</option>
            </select>
                <br><br>
                <select name="select_box">
                <option class="lt" value="default">--Select department--</option>
                <option class="lt" value="gptc_ct">Computer engineering</option>
                <option class="lt" value="gptc_che">Computer hardware engineering</option>
                <option class="lt" value="gptc_el">Electronics engineering</option>
                <option class="lt" value="gptc_civil">Civil engineering</option>
                <option class="lt" value="gptc_civil">Mechanical engineering</option>
            </select>
            <br><br>
            <input type="text" name="reg" placeholder="Enter register number " style="width:250px; height:30px;">
                <br><br>
                <div class="err">
                <?php echo $err; ?><br>
            </div>
                <input type="submit" name="submit" value="search" style="width:250px; height:30px;">      
            </form>
        </div>
        </div>
        <a href="lib.php" style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
    </body>
</html>