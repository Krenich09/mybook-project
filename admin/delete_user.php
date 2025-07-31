<?php
    include '../includes/db.php';
    $id = $_GET['id'];

    // sql to delete a record
    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: users.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
?>
