<?php
    include '../../db/db_con.php';
    $rem=$err=" ";
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
                    $reg=$_POST['reg'];
                    $sql="select COUNT(*) AS usercount from `$dep` WHERE `batch`='$bt' && `regno`='$reg'";
                    $res=mysqli_query($con,$sql);
                    $row=mysqli_fetch_array($res);
                    $count=$row['usercount'];
                    if($count>0)
                    {
                        $sqli="select * from `$dep` where batch='$bt'  && `regno`='$reg'";
                        $data=mysqli_query($con,$sqli);
                        if(!$data)
                        {
                            echo "<script>alert('failed')</script>";
                        }           
                        else
                        {
                            header('Location: res.php?key1=' . $dep . '&key2=' . $reg);
                        }
                    }                   
                }
            }
        else
        {
            $err="something went wrong";
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
        <div class="form" id="whole">
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
            <input type="text" name="reg" placeholder="Enter the register number">
            <div class="err">
                <?php echo $err; ?><br>
            </div>
            <input type="submit" name="sub2" value="search">
        </div>
        </div>

</form>
<a href="co-op.php"  class="back" style="width:50px; height:30px; text-align:center;">back</a>
</body>
</html>