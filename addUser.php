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
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      
	Username: <input type="username" id="inputUsername" name="username" ><br/>
	Full Name: <input type="name" id="inputName" name="name" ><br/>
	Password: <input type="password" id="inputPassword" name="password"><br/>
	<button type="submit" name="login">Submit</button>
</form>
</body>
</html>
