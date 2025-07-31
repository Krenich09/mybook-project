<?php
    include '../includes/db.php';
    $id = $_GET['id'];

    // sql to delete a record
    $sql = "DELETE FROM products WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: products.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
?>
