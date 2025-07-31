<?php
    include '../includes/db.php';
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        if (!empty($_FILES["image"]["name"])) {
            $target_dir = "../images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $image = basename($_FILES["image"]["name"]);

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE products SET name='$name', description='$description', price='$price', image='$image' WHERE id=$id";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "File is not an image.";
            }
        } else {
            $sql = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id=$id";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: products.php");
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
    <title>Edit Product - Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <h1>Edit Product</h1>
    </header>

    <main>
        <?php
            $sql = "SELECT * FROM products WHERE id = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        ?>
        <form action="edit_product.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo $row['description']; ?></textarea>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" value="<?php echo $row['price']; ?>" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            <img src="../images/<?php echo $row['image']; ?>" width="100">

            <button type="submit">Update Product</button>
        </form>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Online Bookstore. All Rights Reserved.</p>
    </footer>
</body>
</html>
