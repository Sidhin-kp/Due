<?php
    include '../../db/db_con.php';
    $bt=$_GET['data'];
    $reg=$_GET['data1'];
    $de=$_GET['data2'];
    $dep=$_GET['data3'];
       
            $sql="select * from `$de` where batch='$bt' && regno='$reg'";
            $data=mysqli_query($con,$sql);
            
?>
<html>
    <head>
    <link rel="stylesheet" href="../resource/des.css">
<link rel="stylesheet" href="../resource/style1.css">
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
    <script>
    function deleteRecord(id,de,dep) {
  // Confirm with the user if they really want to delete the record
  if ( confirm("Are you sure you want to delete the last record?")) {
    // Create an AJAX request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert(this.responseText); // Show success or error message
      }
    };
    xhttp.open("GET", "delete_data.php?data1="+id+"&data2="+de+"&data3="+dep, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    }
    }

    function waveRecord(id,de,dep) {
  // Confirm with the user if they really want to delete the record
  if ( confirm("Are you sure you want to wave the last record?")) {
    // Create an AJAX request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert(this.responseText); // Show success or error message
      }
    };
    xhttp.open("GET", "wave_data.php?data1="+id+"&data2="+de+"&data3="+dep, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    }
    }

</script>
    </head>
    <body>
        
        <div class="my">
        <h2> <?php echo $bt ?>- Students detailed view</h2>
    </div>
   
        <table border="1">           
            <tr>
                <th>  Name  </th>
                <th>  Register number  </th>
                <th>  Admission number  </th>
                <th>  Department  </th>
                <th>  Batch  </th> 
                <th>  Due  </th>
                <th>  Remark  </th>
                <th>  Date  </th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["regno"]; ?></td>
                <td><?php echo $row["admno"]; ?></td>
                <td><?php echo $row["department"]; ?></td>
                <td><?php echo $row["batch"]; ?></td>
                <td><?php echo $row["due"]; ?></td>
                <td><?php echo $row["remark"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td><button id="btn1" onclick="waveRecord('<?php echo $reg ;?>','<?php echo $de ;?>','<?php echo $dep ;?>')" >wave</button></td>
                <td><button id="btn2" onclick="deleteRecord('<?php echo $reg ;?>','<?php echo $de ;?>','<?php echo $dep ;?>')" style="background-color:red;">Pay</button></td>
                <?php } ?>          
        </table>

        <script>
    const button1=document.getElementById("btn2");
    button1.addEventListener('click',function(){
       
        button1.style.backgroundColor="green";
        button1.style.color="white";
        button1.textContent="PAID";
    });
   
    const button6=document.getElementById("btn1");
    button6.addEventListener('click',function(){
        button6.style.backgroundColor="green";
        button6.style.color="white";
        button6.textContent="WAVED";
        
    });
    
</script>
    <a href="workshop.php" class="back"style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
     </body>
</html>