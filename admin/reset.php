<?php
   include '../db/db_con.php';
    $pwd=$cpwd=$err=" ";
    if(isset($_POST['reset']))
    {
        $selected_value = $_POST['select_box'];
        if(isset($_POST['select_box'])) {
            
            if($selected_value=="default"){
            $err="select the user";
            }
            else{
                $pwd=$_POST['pwd'];
                $cpwd=$_POST['cpwd'];
                if($pwd=="" || $cpwd=="") 
                {
                $err="Enter the fields";
                }
                else
                {
                    if($pwd!=$cpwd)
                    {
                        $err="password doesn't match";
                    }
                    else{
                        $query = "UPDATE `login` SET `password`='$pwd' WHERE `username`='$selected_value'";
                        $res=mysqli_query($con,$query);
                        if ($res) {
                            echo "<script>alert('Password reseted successfully')</script>";
                        } else {
                            echo "<script>alert('Error resetting password: ' . mysqli_error($conn);)</script>";
                        }
                    }
                }
            }
        }     
    }
?>
<html>
    <head>
    <link rel="stylesheet" href="../resource/des.css">
    <link rel="stylesheet" href="../resource/style1.css">
        <style>
            select{
                width:100%;
                height:200px
                text-align:center;
            }
            select.lt{
                text-align:center;
            }
            </style>
    </head>
    <body>
        <div class="form">
           <center> <h2>Reset Password</h2></center>
    <form method="post" action="">
                            <select name="select_box" style="height:35px;">
                                <option class="lt" value="default">--Select user--</option>
                                <option class="lt" value="hodct">HOD CT</option>
                                <option class="lt" value="hodche">HOD CHE</option>
                                <option class="lt" value="hodel">HOD EL</option>
                                <option class="lt" value="hodcivil">HOD CIVIL</option>
                                <option class="lt" value="hodmech">HOD MECH</option>
                                <option class="lt" value="library">LIBRARY</option>
                                <option class="lt" value="stfs">STFS</option>
                                <option class="lt" value="wrksp">WORKSHOP</option>
                                <option class="lt" value="account">ACCOUNTS</option>
                                <option class="lt" value="pta">PTA</option>
                                <option class="lt" value="office">ACADEMIC SECTION</option>
                                <option class="lt" value="nss">NSS</option>
                                <option class="lt" value="envlab">ENVIRONMENTAL LAB</option>
                                <option class="lt" value="pt">PHYSICAL EDUCATION</option>
                                <option class="lt" value="co-op">CO-OP SOCITY</option>
                                <option class="lt" value="principal">PRINCIPAL</option>
                            </select>
            <div class="input-field">
                <input type="password"  placeholder="New Password" name="pwd">
            </div>
            <div class="input-field">
                <input type="password" placeholder="Confirm Password" name="cpwd">
            </div>
            <div class="err">
                  <?php echo $err; ?><br>
            </div>
            <input type="submit" name="reset" value="reset" style="width:100%;">
        </form>
</div>
<a href="admin.php" class="back"style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
    </body>
</html>