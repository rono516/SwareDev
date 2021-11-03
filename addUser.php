<?php
 include('config.php');
  //save form data
  if (!empty($_POST['username'])){
	$username =  $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	
	$stmt = $db->prepare("INSERT INTO user (name, username, password) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $n, $uname, $pass);

	// set parameters and execute
	$n = $name;
	$uname = $username;
	$pass = MD5($password);
	
	if(!$stmt->execute()) echo "<span style='color:red'>Error while saving record</span>";
	else 
	$stmt->close();
	$db->close();
	
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Add User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
<form class="border" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="col-md-4 col-md-offset-4 align-items-center container ">
   <label for="username" class="form-label">Username:</label>  
  <input type="username" name="username" ><br/>
   <label for="name" class="form-label">Full Name:</label>
   <input type="name" id="inputName" name="name" ><br/>
   <label for="name" class="form-label">Password: </label>
	<input type="password" id="inputPassword" name="password"><br/>
	<button type="submit" class="btn btn-primary" name="login">Add User</button>
</div>
</form>
</body>
</html>
