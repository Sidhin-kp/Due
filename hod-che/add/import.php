<?php

session_start();

include '../../db/db_con.php';

if(isset($_POST['import'])){

    if($_FILES['uploadfile']['name']){

        $filename = explode(".",$_FILES['uploadfile']['name']);
        if(end($filename) == 'csv'){

            $handle = fopen($_FILES['uploadfile']['tmp_name'],"r");
            while($data = fgetcsv($handle)){

               
                $name = mysqli_real_escape_string($con,$data[0]);
                $regno = mysqli_real_escape_string($con,$data[1]);
                $admno = mysqli_real_escape_string($con,$data[2]);
                $batch = mysqli_real_escape_string($con,$data[3]);
                

                $query = "INSERT INTO `gptc_che` (`name`,`regno`,`admno`,`department`,`batch`) VALUES ('$name','$regno','$admno','CHE','$batch')";
                $result = mysqli_query($con,$query);
                $sql = "INSERT INTO `chedue` (`name`,`regno`,`admno`,`department`,`batch`) VALUES ('$name','$regno','$admno','CHE','$batch')";
                $query=mysqli_query($con,$sql);
            }
             fclose($handle);
             $_SESSION['msg'] = " ";

            echo "<script>alert('RECORDS ENTERED');</script>";
            ?>
                <META HTTP-EQUIV="refresh" content="0;url = http://localhost/phpfiles/project/try/hod-che/hod.php">

            <?php
        }
        else{
            echo "<script>alert('INVALID FILE');</script>";

            ?>
                <META HTTP-EQUIV="refresh" content="0;url = http://localhost/phpfiles/project/try/hod-che/hod.php">
            <?php
        }
    }
    else{
        echo "<script>alert('DIDN\'T SELECT ANY FILE');</script>";

        ?>
          <META HTTP-EQUIV="refresh" content="0;url = http://localhost/phpfiles/project/try/hod-che/hod.php">
        <?php
}
}

?>
<html>
<head>
<link rel="stylesheet" href="../../resource/des.css">
<link rel="stylesheet" href="../../resource/style1.css">
<style>
    .dbtn{
        width: 80px;
        height: 60px;
        text-align:center;
        background-color:DodgerBlue;
        color:white;
        padding:1rem 2rem;
        text-decoration:none;
        border-radius:5px;
    }
    .dbtn:hover{
        
        background-color:RoyalBlue;
    }
    </style>
</head>
    <body>
        <div class="form">
            <br><br><br>
        <form method="post" action="" enctype="multipart/form-data">
            Choose file&nbsp;&nbsp;<input type="file" name="uploadfile"><br><br>
            <input type="submit" name="import" value="IMPORT">
            <br><i><h5>CSV UTF-8 (comma delimited) (*.csv)</h5></i>
            
<br><br><br><br><br><br>
            
                <a href="../../resource/sample.csv" download="sample" class="dbtn">Downlaoad sample csv file</a>
</div>
</form>

<a href="../hod.php" class="back"style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
</body>
</html>