<?php
    include '../db/db_con.php';
    if(isset($_POST['out'])){
        header("Location: ../login.php");
    }
?>

<html>
    <head>
        <style>
           .out{
            float:right;
           }
           input[type="text"]{
            width: 30px;
            height: 30px;
            background-color:white;
           }
           
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
  
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 130px;
  height: auto;
  background-color: white;
  color: #54b3d6;
  text-align: center;
  border: 2px solid #54b3d6;
  border-radius: 6px;
  padding-left:30px;
  padding: 5px 0;
  
  /* Position the tooltip text */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
.logout{
    text-decoration:none;
    padding-top: 0;
    padding-right: 0;
    color:white;
    display: inline-block;
    background-color:black;
    border: 2px solid black;
    font-family: 'Poppins', sans-serif;
}
.try{
    position: absolute;
}
        </style>
       <link rel="stylesheet" href="../resource/des.css"> 
       <link rel="stylesheet" href="../resource/style1.css">
    </head>
    <body>
        <div>
           <center>
        <form name="f1" method="post" action="">
            <div>
                <div class="try">
            <a class="logout" href="../home.html">LOGOUT</a></div>
            <h1>Government  Polytechnic  College  Chelakkara</h1>
            <h3>Department  of  Mechanical  Engineering</h3>
        </div>
         
        <div class="menu">
        <div class="tooltip">
           <a href="add/add.php" class="mlink" style="width:350px;">On-board</a>
           <span class="tooltiptext">Add student details</span></div>
           <br><br>
           <div class="tooltip">
           <a href="due/duect.html" class="mlink" style="width:350px;">Make Due</a>
           <span class="tooltiptext">Add due to student</span></div>
           <br><br>
           <div class="tooltip">
           <a href="attentence.php" class="mlink" style="width:350px;">Attendence</a>
           <span class="tooltiptext">Add attendence details of student </span></div>
           <br><br>
           <div class="tooltip">
           <a href="srch.php" class="mlink" style="width:350px;">View all student details</a>
           <span class="tooltiptext">view all student details</span></div>
           <br><br>
           <div class="tooltip">
           <a href="search.php" class="mlink" style="width:350px;">View a student details</a>
           <span class="tooltiptext">view a student details</span></div>
           <br><br>
           <div class="tooltip">
           <a href="deta.php" class="mlink" style="width:350px;">Due details</a>
           <span class="tooltiptext">View due split up and pay or wave due</span></div>
           <br><br>
           <div class="tooltip">
           <a href="col.php" class="mlink" style="width:350px;">Total Due collection</a>
           <span class="tooltiptext">Total due collection of a class</span></div>
           <br><br>
        </div>
        </center>
        </form>
        </div>
        
    </body>
</html>