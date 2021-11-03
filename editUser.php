<?php

include "config.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($db,"select * from user where user_id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
	
    $edit = mysqli_query($db,"update user set username='$username', name='$name', password= '$password'  where user_id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:users.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="username" value="<?php echo $data['username'] ?>" placeholder="Enter username" Required>
  <input type="text" name="name" value="<?php echo $data['name'] ?>" placeholder="Enter fullname" Required>
  <input type="text" name="password" value="<?php echo $data['name'] ?>" placeholder="Enter password" Required>
  <input type="submit" name="update" value="Update">
</form>