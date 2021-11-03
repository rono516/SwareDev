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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
   <div class="container col-md-6 align-items-center container">
<h1>Logged in as <?php echo $login_session;?></h1>
<a href="users.php" class="btn btn-success">Manage Users</a>
<a href="logout.php" class="btn btn-danger">Log out </a>
</div>

</body>
</html>


