
<?php
    include '../db/db_con.php';
       
            $sql="select * from `chedue`";
            $data=mysqli_query($con,$sql);
            
?>
<html>
    <head>
    <link rel="stylesheet" href="../resource/des.css">
<link rel="stylesheet" href="../resource/style1.css">

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
        
        <div class="my">
        
    </div>
   <center><h2>Department of Computer Engineering</h2></center><br><br><br>
        <table border="1">           
            <tr>
                <th>  Name  </th>
                <th>  Register number  </th>
                <th>  Admission number  </th>
                <th>  Department  </th>
                <th>  Batch  </th> 
                <th>  Collection  </th>
                <th>  Reasons  </th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["regno"]; ?></td>
                <td><?php echo $row["admno"]; ?></td>
                <td><?php echo $row["department"]; ?></td>
                <td><?php echo $row["batch"]; ?></td>
                <td><?php echo $row["collection"]; ?></td>
                <td><?php echo $row["remark"]; ?></td>
                <?php } ?>          
        </table>
        <br>
        <div class="due">
        Total amount of due collected is :
        <?php 
            $qry="SELECT SUM(collection) as total FROM chedue";
            $re=mysqli_query($con,$qry);
            $row=mysqli_fetch_array($re);
            $count=$row['total'];
            echo $count;
        ?>
        </div>
        <br>
    <a href="hod.php" class="back"style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
     </body>
</html>