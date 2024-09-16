<?php
    include '../../db/db_con.php';
    
    $rem=$err=" ";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["sub1"]))
        {
          #  session_start();
            $no=$_POST['reg'];
         #   $_SESSION['nu']='$no';
            $dep = $_POST['select_box'];
            if(isset($_POST['select_box'])) 
            {       
                if($dep=="default")
                {
                    $err="select the department";
                }
                else
                {
                   # $_SESSION['de']='$dep';
                    if($no=="")
                    {
                        $err="Enter the register number";
                    }
                    else
                    {
                        $sql="select COUNT(*) AS usercount from `$dep` WHERE `regno`='$no'";
                        $res=mysqli_query($con,$sql);
                        $row=mysqli_fetch_array($res);
                        $count=$row['usercount'];
                        if($count==1)
                        {
                            $err="Student found ";
                            header('Location: applydue.php?data1=' . $dep . '&data=' . $no);
                            echo "<script>alert('yes')</script>";
                            
                        }
                        else
                        {
                            $err="Check the details";
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
            input[type="text"],button[type="submit"],select{
                width: 200px;
                height: 30px;
            }
            .out{
            float:right;
           }
            select{
                width: 200px;
                height:200px
                text-align:center;
            }
            select.lt{
                text-align:center;
            }
        </style>
        <link rel="stylesheet" href="../../resource/des.css">
        <link rel="stylesheet" href="../../resource/style1.css">
</head>
<body>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="err">
                        <?php echo $err; ?><br>
                </div>
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
                <input type="text" name="reg" placeholder="Enter the register number">
                
                <input type="submit" name="sub1" value="search">
            </div>
        </div>

    </form>
    <a href="academic.php"  class="back" style="width:50px; height:30px; text-align:center;">back</a>
</body>
</html>