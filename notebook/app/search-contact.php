<?php include_once('../entities/contact.php'); ?>
<?php include_once('../entities/user.php'); ?>
<?php 
    session_start(); 
    $user=$_SESSION["user"]; 
    $search=$_GET["search"];
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
	<link rel="stylesheet" href="css/contact.css">
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
        <form class="navbar-form navbar-left" action="search-contact.php" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
                </div>
            </div>
            </form>
		<ul class="nav navbar-nav navbar-right">
		<li><a href="view-profile.php"><span >Welcome </span> <?php echo $user->getName(); ?></a></li>
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		
		</ul>
	</div>
	</nav>
  
<div class="contentt_area">
    <div class="container-fluid content_header">
        <div class="col-sm-9">
            <h2>All Contacts</h2>
            <h4 class="text-danger">Searching Result for '<?php echo $search; ?>'</h4>
        </div>
        <div class="col-sm-3">
            <button class="btn btn-primary"><a href="new-contact.php">Create New Contact</a></button>
        </div>
    </div>
	
    <?php
        include_once('connection.php');
        $sql = "SELECT * FROM contacts WHERE username='".$user->getUsername()."' and (name like '%$search%' OR blood_group LIKE '%$search%')";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="note">
                    <?php
                        $n=new Contact();
                        $n->setId($row["id"]);
                        $n->setName($row["name"]);
                        $n->setEmail($row["email"]);
                        $n->setPhone($row["phone"]);
                        $n->setBloodGroup($row["blood_group"]);
                        $n->setPicture($row["picture"]);
                        
                        echo "<div class='noteTitle'><h3>".$n->getName()."</h3><h5>Email :".$n->getEmail()."</h5><h5>Phone :".$n->getPhone()."</h5><h5>Email :".$n->getEmail()."</h5><h5>Blood Group :".$n->getBloodGroup()."</h5></div>";
                        echo "<div class='noteOperation'>
                        <span><button class='btn btn-light'><a href='edit-contact.php?id=".$n->getId()."'>Edit</a></button></span>
                        <span><button class='btn btn-light'><a href='delete-contact.php?id=".$n->getId()."'>Delete</a></button></span>
                                <br/>
                                <br/>
                                <img src=".$n->getPicture().">
                            </div>";
                        //echo "<div class='notebody'><p>".$n->getBody()."</p></div>";
                    ?>
                </div>
                
               <?php
             
                
            }
            
        } else {
            echo "0 results";
        }

        $conn->close();
	?>
</div>
<i class="fa fa-pencil-square-o" aria-hidden="true"></i>

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