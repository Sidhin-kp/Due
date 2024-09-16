<?php
    include 'db/db_con.php';
    $p="username";
    $p=$_GET['id'];
    $err=" ";
    if(isset($_POST['submit']))
    {
        $name=$_POST['uname'];
        $pass=$_POST['pwd'];
        if($name=="" || $pass=="") 
        {
            $err="Username & password are mandatory<br>Please try again.";
        }
        else
        {
            $sql = "SELECT * FROM login WHERE username = '$name' and password = '$pass'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           # $active = $row['active'];
            
            $count = mysqli_num_rows($result);
            
            // If result matched $myusername and $mypassword, table row must be 1 row
          
            if($count == 1) {
              switch ($name) {
                case "admin":                       //admin login  1
                  header("Location:admin/admin.php");
                  break;
                case "cthod":                       //hod ct login  2
                    header("Location:hod-ct/hod.php");
                    break;
                case "elhod":                       //hod el login  3
                    header("Location:hod-el/hod.php");
                    break;
                case "chehod":                      //hod che login  4
                    header("Location:hod-che/hod.php");
                    break;
                case "civilhod":                    //hod civil login  5
                    header("Location:hod-civil/hod.php");
                    break;
                case "mechhod":                     //hod mech login  6
                    header("Location:hod-mech/hod.php");
                    break;
                case "library":                     //library login  7
                    header("Location:dues/library/lib.php");
                    break;
                case "stfs":                        //stfs login  8
                    header("Location:dues/stfs/bus.php");
                    break;
                case "workshop":                    //workshop login  9
                    header("Location:dues/workshp/workshop.php");
                    break;
                case "pta":                          //pta login  10
                    header("Location:dues/pta/pta.php");
                    break;
                case "nss":                         //nss login  11
                    header("Location:dues/nss/nss.php");
                    break;
                case "evn":                           //environmental lab login  12
                    header("Location:dues/environmental lab/evnlab.php");
                    break;
                case "co-op":                          //co-op socity login  13
                    header("Location:dues/co-op socity/co-op.php");
                    break;
                case "accounts":                      //accounts login  14
                    header("Location:dues/accounts/accnt.php");
                    break;
                case "physicaleducation":            //physical education login     15
                    header("Location:dues/physical education/pt.php");
                    break;
                case "accademic":                     //accademic section login  16
                    header("Location:dues/accademic_section/academic.php");
                    break;
                #default:
                #    header('location: /noname.html');
            }
          }
            else
             {
              $err = "Your Login Name or Password is invalid";
          }
            
          }
            
        }
    
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="resource/style1.css">
  <link rel="stylesheet" href="resource/des.css">
  <script>
          function togglePassword() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
              passwordInput.type = "text";
            } else {
              passwordInput.type = "password";
            }
          }
 </script>
    <style>
        .fc{
         display:flex;
         align-item:center;
        }
        input[type="password"],input[type="checkbox"]
        {
          margin-right:10px;
        }
      </style>
</head>
  <body>
    
    <div>
      <br>
    <center><h1>Government Polytechnic College Chelakkara</h1></center>
    <br>
  </div>
    <div class="form">
      <form method="post" action=""> 
        <h2>Login</h2>
        <div class="content">
          <div class="input-field">
            <input type="text" placeholder="<?php echo $p ?>" name="uname" autocomplete="nope" style="width:95%;  padding: 10px 1px; border: 0; border-bottom: 1px solid #747474; outline: none; font-size: 16px; display: block; font-family: 'Rubik', sans-serif;">
          </div>
          <div class="fc">
          <i class="bi bi-box-arrow-in-right"></i>
            <input type="password" id="password" placeholder="PASSWORD" name="pwd" style="width:95%;  padding: 10px 1px; border: 0; border-bottom: 1px solid #747474; outline: none; font-size: 16px; display: block; font-family: 'Rubik', sans-serif;">
            <i class="bi bi-eye-fill"></i><input type="checkbox" onclick="togglePassword()">  
          </div>
          <div class="err">
            <?php echo $err; ?><br>
          </div>
          <div>
          
          <br><br>
          <input type="submit" name="submit" value="login" class="login"><br>
        </div>
      </div>
      </form>
    </div>
  </body>
  <a href="home.html" class="back" style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
</html>