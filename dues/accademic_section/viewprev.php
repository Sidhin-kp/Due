<?php
    include '../../db/db_con.php';
    $sql="SELECT * FROM `gptc`";
    $query=mysqli_query($con,$sql);
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
        <table border="1">
            <tr>
                <th>Batch</th>
                <th>Department</th>
                <th>Due Collection</th>
            </tr>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
                <td>
                    <?php echo $row['batch']; ?>
                </td>
                <td>
                    <?php echo $row['department']; ?>
                </td>
                <td>
                    <?php echo $row['due']; ?>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a href="academic.php" class="back">back</a>
    </body>
</html>