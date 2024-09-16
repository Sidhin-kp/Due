
<?php
    include '../../db/db_con.php';
    
    $err=" ";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["sub1"]))
        {        
            $no=$_POST['reg'];
           
            if($no=="")
            {
                $err="Enter the register number";
            }
            else
            {
                $sql="select COUNT(*) AS usercount from `gptc_che` WHERE `regno`='$no'";
                $res=mysqli_query($con,$sql);
                $row=mysqli_fetch_array($res);
                $count=$row['usercount'];
                if($count==1)
                {
                    $err="Student found ";
                    header('Location: applydue.php?data=' . $no);
                    echo "<script>alert('yes')</script>";
                            
                }
                else
                {
                    $err="Check the details";
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
               <h2>Due for a student</h2><br>
                <input type="text" name="reg" placeholder="Enter the register number">
                
                <input type="submit" name="sub1" value="search">
            </div>
        </div>

    </form>
    <a href="../hod.php" class="back"style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
</body>
</html>