<?php
    include 'db/db_con.php';
    $name=$no=$branch=$due1=$due2=$due3=$err=" ";
    if(isset($_POST['sub1']))
    {
        if(empty($_POST['reg']))
        {
            echo "<script>alert('enter register number')</script>";
        }
        else{
            $no=$_POST['reg'];
            $sql="select * from det where regno='$no'";
            $data=mysqli_query($con,$sql);
            if(mysqli_num_rows($data)>0)
            {
                $rows=mysqli_fetch_array($data);
                $name=$rows['name'];
                $branch=$rows['department'];
                $due1=$rows['due1'];
                $due2=$rows['due2'];
                $due3=$rows['due3'];
            }
        }
     }
     if(isset($_POST['out']))
     {
        header("Location: login.php");
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
        <link rel="stylesheet" type="text/css" href="des.css">
    </head>
    <body>
    <div class="out">
                <form action="" method="post">
                    <input type="submit" value="Logout" name="out" style="width:80px;">
                </form>
            </div>
        <div>
           <center>
        <form name="f1" method="post" action="">
            <h1>Government Polytechnic College Chelakkara</h1>
            
            <a href="#one" style="width:300px;">Due for 1 student</a><br>
            <a href="#whole" style="width:300px;">Due for a class of students</a>
           <br><br>
        </center>
        </form>
        </div>



        <div class="form" id="one">
            <div class="sl">
            <input type="text" name="reg" placeholder="Enter the register number">
            <div class="err">
                <?php echo $err; ?><br>
            </div>
            <input type="submit" name="sub1" value="search">
        </div>
        </div>
        <!--
        <div class="res">
        <table>
            <caption>Student details</caption>
            <tr>
                <td>
                    Name
                </td>
                <td>
                   <?php echo $name; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Reg no
                </td>
                <td>
                    <?php echo $no; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Branch
                </td>
                <td>
                    <?php echo $branch; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Due1
                </td>
                <td>
                    <?php echo $due1; ?>
                </td>
                <td>edit</td>
            </tr>
            <tr>
                <td>
                    Due2
                </td>
                <td>
                    <?php echo $due2; ?>
                </td>
                <td>edit</td>
            </tr>
            <tr>
                <td>
                    Due3
                </td>
                <td>
                    <?php echo $due3; ?>
                </td>
                <td>edit</td>
            </tr>
        </table>
    </div>
        
        -->



        <div class="form" id="whole">
            <div class="sl">
            <input type="text" name="dep" placeholder="department">
            <select style="height: 40px;width: 170px;">
                <option>--Select batch--</option>
                <option>2018-21</option>
                <option>2019-22</option>
                <option>2020-23</option>
                <option>2021-24</option>
                <option>2022-25</option>
            </select>
            <div class="err">
                <?php echo $err; ?><br>
            </div>
            <input type="submit" name="sub2" value="search">
        </div>
        </div>

    </body>
</html>