<?php





    include_once('connection.php');

    //create user table
    $query = "SELECT id FROM users";
    $result = mysqli_query($conn, $query);

    if(empty($result)) {
    // sql to create table
        $sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        phone VARCHAR(50) NOT NULL,
        blood_group VARCHAR(50) NOT NULL,
        picture VARCHAR(50) NOT NULL,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
        
        if ($conn->query($sql) === TRUE) {
            echo "Table MyGuests created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }

    $conn->close();
?> 