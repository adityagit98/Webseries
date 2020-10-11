
<?php session_start(); 
if((isset($_SESSION['user_id'])&&isset($_SESSION["password"])))
    {
        header("location:../mini/home.php");
    }
?>
<?php include("../mini/dbms.php"); ?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>PHP Learning</title>
  
  
  <link rel='stylesheet prefetch'>
      <link rel="stylesheet" href="style.css">
  
</head>
<body style="background:url(bg.jpg);background-repeat:no-repeat;background-size:cover;">
  <div class="login-wrap">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    <div class="login-form">
      <form class="sign-in-htm"  method="post">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" name="username" type="text" class="input" required>
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="password" type="password" class="input" data-type="password" required>
        </div>
        <div class="group">
          <input id="check" type="checkbox" class="check" checked>
          <label for="check"><span class="icon"></span> Keep me Signed in</label>
        </div>
        <div class="group">
          <input type="submit" class="button" name="login" value="Sign In">
        </div>
        <p id ="change" style="color:red;"></p>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="#forgot">Forgot Password?</a>
        </div>
      </form>
      <form class="sign-up-htm"  method="POST">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" name="username" type="text" class="input" required>
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="password" type="password" class="input" data-type="password" required>
        </div>
        <div class="group">
          <label for="pass" class="label">User type</label>

          <select  name ="st" id="pass" class="input" required>
                                <option value ="user" style="color:black;">user</option>
                                <option value ="admin"style="color:black;">admin</option></select>
        </div>
        <div class="group">
          <input type="submit" name="signup" class="button" value="Sign Up">
          <p id ="change1" style="color:red;"></p>
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <label for="tab-1">Already Member?</a>
        </div>
      </form>
    </div>
  </div>
</div>
  

  <?php
  if (isset($_POST['login']))
    {
      $user= $_POST['username'];
      $pass=$_POST['password'];     
      $query    = mysqli_query($db, "SELECT * FROM users WHERE  username='$user'");
      $row    = mysqli_fetch_array($query);
      $num_row  = mysqli_num_rows($query);
      
      if ($num_row > 0) 
        {     
          $_SESSION["user_id"]=$row['username'];
          $_SESSION["password"]=$row['password'];
          $_SESSION["type"]=$row['type'];

          if($_SESSION['password']==$pass)
          {

              header('location:../mini/home.php');
          }
          else
          {
            ?>
          <script>
            document.getElementById("change").innerHTML = 'Invalid password...';
          </script>
          <?php
          }
          
        }
      else
        {
          ?>
          <script>
            document.getElementById("change").innerHTML = 'User not found...';
          </script>
          <?php
        }
    }
  ?>
  <?php
  if (isset($_POST['signup']))
    {
      $user= $_POST['username'];
      $pass=$_POST['password']; 
      $tp=$_POST['st'];
      $sql = "INSERT INTO users(username,password,type) VALUES ('".$user."','".$pass."', '".$tp."')";

           if ($db->query($sql) === TRUE) 
           {
                  ?>
                  <script>
                  document.getElementById("change").innerHTML = 'registered succesfuly...';
                  </script>
                  <?php
                  
           }  
           else 
           {
                ?>
                <script>
                 document.getElementById("change").innerHTML = 'already registered...';
                </script>
                <?php
           }
         }

           $db->close();   
  ?>
  
</body>
</html>