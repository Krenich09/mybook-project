<?php
    include '../includes/db.php';
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;

        $sql = "UPDATE users SET name='$name', email='$email', is_admin='$is_admin' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: users.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <h1>Edit User</h1>
    </header>

    <main>
        <?php
            $sql = "SELECT * FROM users WHERE id = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        ?>
        <form action="edit_user.php?id=<?php echo $id; ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

            <label for="is_admin">Admin:</label>
            <input type="checkbox" id="is_admin" name="is_admin" <?php if($row['is_admin']) echo 'checked'; ?>>

            <button type="submit">Update User</button>
        </form>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Online Bookstore. All Rights Reserved.</p>
    </footer>
</body>
</html>
