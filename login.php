
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
         $_SESSION['login_user'] = $myusername;
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>User Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
<form class="border" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="col-md-4 col-md-offset-4 align-items-center container ">
    <label for="username" class="form-label">Username:</label>
    <input type="username" class="form-control" name="username"><br/>
   
   <label for="username" class="form-label">Password:</label>
   <input type="password" class="form-control" name="password"><br/>
   <br>
   <button type="submit" class="btn btn-primary" name="login">Sign in</button>
</div>
</form>

</body>
</html>


