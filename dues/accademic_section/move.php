<?php
    include '../../db/db_con.php';
    
    if(isset($_POST['submit']))
    {
        $bt=$_POST['batch'];
        $dep=$_POST['dep'];
        if($bt=="default" && $dep=="default")
        {
            echo "<script>alert('Select batch and department')</script>";
        }
        else
        {
            if($dep=="ct")
            {
                $de="ctdue";
            }
            else if($dep=="che")
            {
                $de="chedue";
            }
            else if($dep=="el")
            {
                $de="eldue";
            }
            else if($dep=="civil")
            {
                $de="civildue";
            }
            else if($dep=="mech")
            {
                $de="mechdue";
            }

            $qry="SELECT SUM(collection) as total FROM `$de` WHERE `batch`='$bt'";
            $re=mysqli_query($con,$qry);
            $row=mysqli_fetch_array($re);
            $due=$row['total'];
            
            $sq="SELECT * from `gptc` WHERE `batch`='$bt' && `department`='$dep'";
            $qr=mysqli_query($con,$sq);
            $ro=mysqli_fetch_array($qr);
            if($ro==0)
            {
                /*
                if($dep=="ct")
                {
                    $d="gptc_ct";
                }
                else if($dep=="che")
                {
                    $d="gptc_che";
                }
                else if($dep=="el")
                {
                    $d="gptc_el";
                }
                else if($dep=="civil")
                {
                    $d="gptc_civil";
                }
                else if($dep=="mech")
                {
                    $d="gptc_mech";
                }
                $sqld="DELETE * from `$d` where `batch`='$bt'";
                $qued=mysqli_query($con,$sqld);
                $sqldt="DELETE * from `$de` where `batch`='$bt'";
                $quedt=mysqli_query($con,$sqldt);
*/

                $sql="INSERT INTO `gptc`(`batch`,`department`,`due`) VALUES ('$bt','$dep','$due')";
                $que=mysqli_query($con,$sql);
                if($que/* && $qued && $quedt*/)
                {
                    echo "<script>alert('Record inserted successfully')</script>";
                }
                else
                {
                    echo "<script>alert('Error')</script>";
                }
            }
            else{
                echo "<script>alert('Check the data')</script>";
            }
            
        }
    }
?>
    <html>
        <head>
<link rel="stylesheet" href="../../resource/des.css">
<link rel="stylesheet" href="../../resource/style1.css">
<style>
    table{
        margin: auto;
        text-align:center;
        padding:20px;
        border-collapse:collapse;
    }
    td{
        
        padding:10px;
    }
    </style>
        </head>
        <body>
            <form method="post" action="">
                <table>
                    <tr>
                        <td>Batch</td>
                        <td><select name="batch" style="width:200px; height:30px;">
                            <option value="default">--select a batch--</option>
                            <option value="2018-2021">2018-2021</option>
                            <option value="2019-2022">2019-2022</option>
                            <option value="2020-2023">2020-2023</option>
                            <option value="2021-2024">2021-2024</option>
                            <option value="2022-2025">2022-2025</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td><select name="dep" style="width:200px; height:30px;">
                            <option value="default">--select a batch--</option>
                            <option value="ct">Computer Engineering</option>
                            <option value="che">Computer Hardware Engineering</option>
                            <option value="el">Electronics Engineering</option>
                            <option value="civil">Civil Engineering</option>
                            <option value="mech">Mechanical Engineering</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="submit">
                        </td>
                    </tr>
                </table>
            </form>
            <a href="academic.php" class="back">back</a>
        </body>
    </html>