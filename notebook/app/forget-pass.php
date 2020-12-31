<?php
ob_start();
session_start(); ?>


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
		<a class="navbar-brand" href="home.php">Digital Diary</a>
		</div>
		
		<ul class="nav navbar-nav navbar-right">
		<li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		<li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		</ul>
	</div>
	</nav>
  


<div class="content_area">
	<h1 class="text-center">Login Your Account</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div class=form-group>
			<input class="form-control form-control-lg" placeholder="Enter your email" type="email" name="email"/>
		</div>	

		
		<button type="submit" class="btn btn-primary btn-block">Send me Password</button>
					
		
				
	
        
    </form>
</div>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        

        include_once('connection.php');

        $sql = "SELECT * FROM users WHERE email='".$_POST["email"]."'";
		  $result = $conn->query($sql);
		  if ($result->num_rows > 0)
		  {
            while($row = $result->fetch_assoc()) {
                $username=$row["username"];
                $password=$row["password"];
            }
            require 'PHPMailer-master/PHPMailerAutoload.php';
        
           $mail = new PHPMailer();
          
          //Enable SMTP debugging.
          $mail->SMTPDebug = 1;
          //Set PHPMailer to use SMTP.
          $mail->isSMTP();
          //Set SMTP host name
          $mail->Host = "smtp.gmail.com";
          
          //Set this to true if SMTP host requires authentication to send email
          $mail->SMTPAuth = TRUE;
          //Provide username and password
          $mail->Username = "sa197661@gmail.com";
          $mail->Password = "7296272962";
          //If SMTP requires TLS encryption then set it
          $mail->SMTPSecure = "false";
          $mail->Port = 587;
          //Set TCP port to connect to
          
          $mail->From = "sa197661@gmail.com";
          $mail->FromName = "Notebook";
          
          $mail->addAddress($_POST["email"]);
          
          $mail->isHTML(true);
         
          $mail->Subject = "Password Recovery";
          $mail->Body = "Username :$username <br> Password :$password";
          $mail->AltBody = "This is the plain text version of the email content";
          if(!$mail->send())
          {
           echo "Mailer Error: " . $mail->ErrorInfo;
          }
          else
          {
           echo "Message has been sent successfully";
          }
          header("location:login.php");

          }
          else{
            echo "You haven't any account";
          }
         
    }
    ob_end_flush();

?>


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