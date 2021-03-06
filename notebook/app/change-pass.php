<?php
    ob_start();
    include_once('../entities/user.php'); 
 ?>
<?php 
    session_start(); 
    $user=$_SESSION["user"];
    if(!isset($_SESSION["user"]))
	  {
		  header("location:index.php");
	  }
    $user=$_SESSION["user"]; 
    $name=$user->getName();
    $email=$user->getEmail();
    $phone=$user->getPhone();
    $bloodGroup=$user->getBloodGroup();
    $picture=$user->getPicture();
    $username=$user->getUsername();
    $password=$user->getPassword();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/edit-profile.css">
    <title>Notebook</title>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">Digital Diary</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="notes.php">Notes</a></li>
                <li><a href="mails.php">Mails</a></li>
                <li class="active"><a href="contacts.php">Contacts</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="view-profile.php"><span>Welcome </span> <?php echo $user->getName(); ?></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="content_area">
        <h1> Edit Profile</h1>
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label col-form-label-sm">Old Password</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" name="oldpass" />
                </div>

            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label col-form-label-sm">New Password:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" name="newpass"
                        value="<?php echo $email; ?>" />
                </div>
            </div>
            

            




            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                    <button type="submit" class="btn btn-default btn-block">Submit</button>
                </div>
            </div>





        </form>
    </div>





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
            <span><a href="#">Shakil Ahammed,</a></span><span><a href="#"> Ankan Shahriar <a></span><span><a href="#">&
                    Hamid Ahmed</a></span>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($user->getPassword()==$_POST['oldpass'])
        {
            include_once('connection.php');
            $sql = "UPDATE users SET password='".$_POST['newpass']."' WHERE username='".$username."'";
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    $user->setPassword($_POST['newpass']);
                    $_SESSION["user"]=$user;
                }            
            $conn->close();
            header("location:view-profile.php");
        }
        else{
            echo "Old password Incorrect";
        }
        
        
    }
    ob_end_flush();
?>