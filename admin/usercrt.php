<?php
  include '../db/db_con.php';
  $err=" ";
  if(isset($_POST['submit']))
  {
      $name=$_POST['uname'];
      $pwd=$_POST['pwd'];
      $cpwd=$_POST['cpwd'];
      if($name=="" || $pwd=="" || $cpwd=="") 
      {
        $err="Enter the fields";
      }
      else
      {
        if($pwd!=$cpwd)
        {
          $err="password doesn't match";
        }
        else
        {
          $sql_query="select count(*) AS usercount from login WHERE username='$name';";
          $res=mysqli_query($con,$sql_query);
          $row=mysqli_fetch_array($res);
          $count=$row['usercount'];
          if($count==1)
          {
            $err="user already exist";
          }
          else
          {
            $sql="insert into login(`username`,`password`)values('$name','$pwd')";
            $query=mysqli_query($con,$sql);
            if($query)
            {
              echo "<script>alert('new user added')</script>";
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
    </head>
    <body>
        <div class="form" style="height:400px">
            <form method="post" action=""> 
                <h1>Create User</h1>
                <div class="content">
                  <div class="input-field">
                    <input type="text" placeholder="username" name="uname" autocomplete="nope">
                  </div>
                  <div class="input-field">
                    <input type="password"  placeholder="Password" name="pwd">
                    
                  </div>
                  <div class="input-field">
                    <input type="password" placeholder="Confirm Password" name="cpwd">
                    
                  </div>
                  <div class="err">
                  <?php echo $err; ?><br>
                  </div>
                  <input type="submit" name="submit" value="Create"><br>
                </div>
              </form>
        </div>
        <a href="admin.php" class="back"style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
    </body>
</html>