<?php
    include '../../db/db_con.php';
    $name=$r=$a=$de=$bt=$lr="";
    $dep=$_GET['key1'];
    $bt=$_GET['key2'];
            
            $sql="select * from `$dep` where batch='$bt'";
            $data=mysqli_query($con,$sql);
            if(!$data)
            {
                echo "<script>alert('failed')</script>";
            }
?>
<html>
    <head>
    <link rel="stylesheet" href="../../resource/des.css">
    <link rel="stylesheet" href="../../resource/style1.css">
    <style>
        .my{
            text-align: center;
            display: flex;
            justify-content: center;
            margin: auto;
        }
        td{
            padding: 15px;
        }
        caption{
            font-size: 25px;
            color: blue;
        }
    </style>
    </head>
    <body>
        <div class="my">
        <table border="1">
            <caption>Student details</caption>
            <tr>
                <th>  Name  </th>
                <th>  Register number  </th>
                <th>  Admission number  </th>
                <th>  Department  </th>
                <th>  Batch  </th>               
                <th>  Carpentry  </th>
                <th>  Foundary  </th>
                <th>  Welding  </th>
                <th>  Fitting  </th>
                <th>  Smithy  </th>
                <th>  Sheetmetal  </th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["regno"]; ?></td>
                <td><?php echo $row["admno"]; ?></td>
                <td><?php echo $row["department"]; ?></td>
                <td><?php echo $row["batch"]; ?></td>
                <td>
                    <?php
                        $l1=$row["wks_carpentry"]; 
                        if(is_null($l1)){
                            $l1='NULL';
                        }
                        echo $l1; 
                    ?>
                </td>
                <td>
                    <?php
                        $l2=$row["wks_foundary"]; 
                        if(is_null($l2)){
                            $l2='NULL';
                        }
                        echo $l2; 
                    ?>
                </td>
                <td>
                    <?php
                        $l3=$row["wks_welding"]; 
                        if(is_null($l3)){
                            $l3='NULL';
                        }
                        echo $l3; 
                    ?>
                </td>
                <td>
                    <?php
                        $l4=$row["wks_fitting"]; 
                        if(is_null($l4)){
                            $l4='NULL';
                        }
                        echo $l4; 
                    ?>
                </td>
                <td>
                    <?php
                        $l5=$row["wks_smithy"]; 
                        if(is_null($l5)){
                            $l5='NULL';
                        }
                        echo $l5; 
                    ?>
                </td>
                <td>
                    <?php
                        $l6=$row["wks_sheetmetal"]; 
                        if(is_null($l6)){
                            $l6='NULL';
                        }
                        echo $l6; 
                    ?>
                </td>
            </tr>
            <?php } ?>

            
        </table>
    </div>
    <a href="workshop.php" style="width:50px; height:30px; text-align:center;">back</a>
     </body>
</html>