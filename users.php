<!DOCTYPE html>
<html>
<head>
<?php require 'config.php'; //connect to the database?>
<title>Manage Users</title>
<style>
	h1{ color:navy;}
	body{background-color:skyblue;}
</style>
</head>

<body>
<h1>System Users</h1>
<a href = "addUser.php">Add user</a>
<table>
<th>System Users</th>
<tr><th>Username</th> <th>Full Name</th> <th>Role </th> <th> Station</th><th> Action</th></tr>
<?php
	$str = '';
	  $sql = "SELECT * FROM user";
      $result = mysqli_query($db,$sql);
	  $count = mysqli_num_rows($result);
	  if ($count==0) $str .= "<tr><td colspan='5'><span class='alert alert-danger'>No users found.</span></td></tr>";
	  else
      while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		$str .= "<tr>
		<td>".$row['username']."</td>
		<td>".$row['name']."</td>
		<td>
		<a href='editUser.php?id=".$row['user_id']."'>Edit</a>
		<a href='deleteUser.php?id=".$row['user_id']."'>Delete</a>
		</td></tr>";		
	  }
	echo $str;
?>
</table>
</body>
</html>

