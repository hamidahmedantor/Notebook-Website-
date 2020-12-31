<?php 
ob_start();

include_once('../entities/note.php'); 

?>


<?php include_once('../entities/user.php'); ?>
<?php 
    session_start(); 
    $user=$_SESSION["user"]; 
    if(!isset($_SESSION["user"]))
	  {
		  header("location:index.php");
	  }
   
?>
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
	<link rel="stylesheet" href="css/new-note.css">
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
		<li class="active"><a href="notes.php">Notes</a></li>
		<li><a href="mails.php">Mails</a></li>
		<li><a href="contacts.php">Contacts</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		<li><a href="view-profile.php"><span >Welcome </span> <?php echo $user->getName(); ?></a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		</ul>
	</div>
	</nav>
  

<div class="content_area">
	<h1> Create New Note</h1>
    <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
    
    <div class="form-group row">
      <label class="col-sm-3 col-form-label col-form-label-sm">Title :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control form-control-sm" name="name"/>
      </div>
      
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label col-form-label-sm">Body :</label>
      <div class="col-sm-9">
        <textarea type="text" class="form-control form-control-sm" rows="5" name="body"></textarea>
      </div>
      
    </div>
    <div class="form-group row">		
      <label class="col-sm-3 col-form-label col-form-label-sm">Picture :</label>
      <div class="col-sm-9">	
          <input class="form-control form-control-sm" type="file" name="fileToUpload" id="fileToUpload">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-6">
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
    <span><a href="#">Shakil Ahammed,</a></span><span><a href="#"> Ankan Shahriar <a></span><span><a href="#">& Hamid Ahmed</a></span>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>

<?php
    
        //Upload to database
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    
        $newNote=new Note();
        
        $newNote->setTitle($_POST['name']);
        
        $newNote->setBody($_POST['body']);
        $newNote->setUsername($user->getUsername());
        

        include_once('connection.php');
        $sql = "INSERT INTO notes (title,body,picture,username) VALUES ('".$newNote->getTitle()."','".$newNote->getBody()."','".$target_file."','".$newNote->getUsername()."')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        $conn->close();
        header("location:notes.php");
    }
    ob_end_flush();

?>