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
            echo "Table users created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }

    //create note table
    $query = "SELECT id FROM notes";
    $result = mysqli_query($conn, $query);

    if(empty($result)) {
    // sql to create table
        $sql = "CREATE TABLE notes (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        body VARCHAR(5000) NOT NULL,
        color VARCHAR(50) NOT NULL,
        username VARCHAR(50) NOT NULL,
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
        
        if ($conn->query($sql) === TRUE) {
            echo "Table notes created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }
    //create report table
    $query = "SELECT id FROM reports";
    $result = mysqli_query($conn, $query);

    if(empty($result)) {
    // sql to create table
        $sql = "CREATE TABLE reports (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        topic VARCHAR(100) NOT NULL,
        course VARCHAR(100) NOT NULL,
        group_mates VARCHAR(100) NOT NULL,
        body VARCHAR(5000) NOT NULL,
        username VARCHAR(50) NOT NULL,
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
        
        if ($conn->query($sql) === TRUE) {
            echo "Table reports created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }
    //create mails table
    $query = "SELECT id FROM mails";
    $result = mysqli_query($conn, $query);

    if(empty($result)) {
    // sql to create table
        $sql = "CREATE TABLE mails (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        fromm VARCHAR(100) NOT NULL,
        too VARCHAR(100) NOT NULL,
        subject VARCHAR(100) NOT NULL,
        body VARCHAR(5000) NOT NULL,
        username VARCHAR(50) NOT NULL,
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
        
        if ($conn->query($sql) === TRUE) {
            echo "Table mails created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }
    //create contacts table
    $query = "SELECT id FROM contacts";
    $result = mysqli_query($conn, $query);

    if(empty($result)) {
    // sql to create table
        $sql = "CREATE TABLE contacts (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        phone VARCHAR(50) NOT NULL,
        blood_group VARCHAR(50) NOT NULL,
        picture VARCHAR(50) NOT NULL,
        username VARCHAR(50) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
        
        if ($conn->query($sql) === TRUE) {
            echo "Table contacts created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }
    $conn->close();
    
?> 