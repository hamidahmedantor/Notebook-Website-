
<?php 
    include_once('../entities/user.php');
    function validation($user){


		  $sql = "SELECT * FROM users WHERE username = '".$user->getUsername()."' and password = '".$user->getPassword()."'";
		  $result = $conn->query($sql);
		  if ($result->num_rows > 0)
		  {
			  $_SESSION["uname"]=$_POST["uname"];
			  header("location: dashboard.php");
		  }
			  
		  else
			  echo "wrong email or password";
		  $conn->close();
    }

?>