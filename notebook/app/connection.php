 <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "notebook";

    // Connect to MySQL
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // If database is not exist create one
    if (!mysqli_select_db($conn,$dbName)){
        $sql = "CREATE DATABASE ".$dbName;
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        }else {
            echo "Error creating database: " . $conn->error;
        }

    } 
    $conn->close();

    
    $conn = new mysqli($servername, $username, $password,$dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>