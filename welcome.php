<?php
   include('config.php');
   session_start();
   if (empty($_SESSION['login_user'])) header("location:login.php");
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($db,"select username from user where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['username'];
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
<!DOCTYPE html>
<html>
<head>
<title>You are logged in. Welcome!</title>
</head>
<body>
<h1>Logged in as <?php echo $login_session;?></h1>
<a href="users.php">Manage Users</a>
<a href="logout.php">Log out </a>

</body>
</html>


