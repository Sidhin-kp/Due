<?php
    include '../db/db_con.php';
    if(isset($_POST['submit']))
    {       
            $bt=$_POST['batch_box'];
            if($bt=="default")
            {
                $err="Select the batch";
            }
            else
            {
                
                $sql="select * from `gptc_ct` where `batch`='$bt'";
                $data=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($data);
                if(!$data)
                {
                    echo "<script>alert('failed')</script>";
                }
                else if($row<1)
                {
                    echo "<script>alert('no data found')</script>";
                }
                else
                {
                    header('Location: viewall.php? data=' . $bt );
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
            select{
                width: 150px;
                height: 30px;
            }
        </style>
   <link rel="stylesheet" href="../resource/des.css">
<link rel="stylesheet" href="../resource/style1.css">
    </head>
    <body>
        <div class="form">
            <div class="sl">
                Search student details
            <form name="fm1" method="post" action="">
            <!--<div class="sel sel--superman">-->
                <div>
        <select name="batch_box" >
                <option class="lt" value="default">--Select batch--</option>
                <option class="lt" value="2018-2021">2018-21</option>
                <option class="lt" value="2019-2022">2019-22</option>
                <option class="lt" value="2020-2023">2020-23</option>
                <option class="lt" value="2021-2024">2021-24</option>
                <option class="lt" value="2022-2025">2022-25</option>
            </select>
      <!--      <hr class="rule"> -->
            <input type="submit" name="submit">
    </div>     
            </form>
        </div>
        </div>
        <a href="hod.php" class="back" style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
    </body>
</html>