<?php
    include '../../db/db_con.php';
    $name=$r=$a=$de=$bt=$lr="";
    $dep=$_GET['key1'];
    $no=$_GET['key2'];
    
            
            $sql="select * from `$dep` where regno='$no'";
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
                <th>  PTA </th>
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
                    $r=$row["regno"];
                    $d=$row["department"];
                        $l=$row["pta"]; 
                        if(is_null($l)){
                            $l='NULL';
                        }
                        else if($l<"1")
                        {
                            $l="0";
                        }
                        echo $l; 
                    ?>
                </td>
            </tr>
            <?php } ?>        
        </table>
    </div>
    <a href="pta.php" class="back"  style="width:50px; height:30px; text-align:center;">back</a>
     </body>
</html>