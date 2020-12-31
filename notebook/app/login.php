<?php session_start(); ?>


<?php include_once('../entities/user.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" href="css/login.css">
    <title>Notebook</title>
</head>
<body>

	<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="index.php">Digital Diary</a>
		</div>
		
		<ul class="nav navbar-nav navbar-right">
		<li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		<li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		</ul>
	</div>
	</nav>
  


<div class="content_area">
	<h1 class="text-center">Login Your Account</h1>
    <form name="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div class=form-group>
			<input class="form-control form-control-lg" placeholder="Username" type="text" id="uname" name="uname"/>
		</div>	
		
		<div class=form-group>	
			<input class="form-control form-control-lg" placeholder="Password'" type="password" id="pass" name="pass"/>	
		</div>		
		
			<b><a href="forget-pass.php">Forget Password?</a></b>

		
		<button onclick="myFunction()" type="submit" class="btn btn-primary btn-block">Sign in</button>
					
		
				
	
        
    </form>
</div>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
    
        $user=new User();
        $user->setUsername($_POST['uname']);
        $user->setPassword($_POST['pass']);
        if(!empty($_POST['uname']) && !empty($_POST['pass']))
        {
          include_once('connection.php');

          $sql = "SELECT * FROM users WHERE username = '".$user->getUsername()."' and password = '".$user->getPassword()."'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
              while($row = $result->fetch_assoc()) {
                $user->setId($row["id"]);
                $user->setName($row["name"]);
                $user->setEmail($row["email"]);
                $user->setPhone($row["phone"]);
                $user->setBloodGroup($row["blood_group"]);
                $user->setPicture($row["picture"]);
                $user->setUsername($row["username"]);
                $user->setPassword($row["password"]);
                
              $_SESSION["user"]=$user;
                header("location: home.php");
            }
          }
          else{
            echo "<div id='demo' class='p-4 mb-3 bg-danger text-white'>wrong email or password</div>";
          }
        }

        else{
          echo "<div id='demo' class='p-4 mb-3 bg-danger text-white'>username and password is required</div>";
        }
          
          
        
        
    }

?>
<script>
function myFunction() {
  var x, text;

  // Get the value of the input field with id="numb"
  x = document.getElementById("uname").value;
  y = document.getElementById("pass").value;

  // If x is Not a Number or less than one or greater than 10
  if (isNaN(x) || isNaN(x)) {
    text = "Username and password required";
  } 
  document.getElementById("demo").innerHTML = text;
}
</script>

<!-- Footer -->
<footer class="page-footer font-small pt-4">

  <!-- Footer Elements -->
  <div class="container">

    <!-- Social buttons -->
    <ul class="list-unstyled list-inline text-center">
      <li class="list-inline-item">
        <a class="btn-floating btn-fb mx-1">
          <i class="fab fa-facebook-f"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-tw mx-1">
          <i class="fab fa-twitter"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-gplus mx-1">
          <i class="fab fa-google-plus-g"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-li mx-1">
          <i class="fab fa-linkedin-in"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-dribbble mx-1">
          <i class="fab fa-dribbble"> </i>
        </a>
      </li>
    </ul>
    <!-- Social buttons -->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <span><a href="#">Shakil Ahammed,</a></span><span><a href="#"> Ankan Shahriar <a></span><span><a href="#">& Hamid Ahmed</a></span>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>