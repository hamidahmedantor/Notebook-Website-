<?php
    $id=$_GET["id"];
    include_once('connection.php');


    // sql to delete a record
    $sql = "DELETE FROM notes WHERE id='".$id."'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
    header("Location:notes.php");
?>
