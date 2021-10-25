
<?php
require("config.php");//connect to the database
session_start();
   $error="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form using POST method
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
	  $mypassword = md5($mypassword);      
      $sql = "SELECT user_id FROM user WHERE username = '".$myusername."' and password = '".$mypassword."'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {//login successful
         $_SESSION['login_user'] = $myusername;//capture name,password
         header("location: welcome.php");//redirect user to welcome.php
      }else {
         $error = "Your Login Name or Password is invalid";
      }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>User Login</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<span style="color:red"><?php echo $error;?></span><br>
Username: <input type="username" name="username"><br/>
Password: <input type="password" name="password"><br/>
<br>
<button type="submit" name="login">Sign in</button>
</form>

</body>
</html>


