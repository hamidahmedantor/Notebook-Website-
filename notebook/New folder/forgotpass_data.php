<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php  
$email=$_REQUEST['email'];
if($email!=""){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_management";
$conn = new mysqli($servername, $username, $password,$dbname)or die("connection error");

$myuseremail = mysqli_real_escape_string($conn,$_POST['email']);

$query="select * from customerreg where email='$myuseremail'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer();

if($count == 1){
$mail->SMTPDebug=1;
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = TRUE;
$mail->Username = "mahedianwar@gmail.com";
$mail->Password ="";
$mail->SMTPSecure = "false";
$mail->Port = 587;
$mail->Form = "mahedianwar@gmail.com";
$mail->FromName = "Event Management";
$mail->addAddress($row["email"]);
$mail->isHTML(true);
$mail->Subject = "Send Password";
$mail->Body = "Your Event Management Mail is :".$row["email"]." Your Event Management password is :".$row["password"];
$mail->AltBody = "It is a forgotten password mail";

if(!$mail->send())
  {
   echo "Mailer Error: ";
  }
  else
  {
   header("Location: Login.php");
  }
}


}
else{
	echo "error";
}

?>


</body>
</html>
