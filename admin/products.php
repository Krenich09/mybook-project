<?php
    // start session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Products - MyBooks</title>
    <?php
        // include header
        include '../includes/header.php';
    ?>
</head>
<body>
    <header class="has-text-centered">
        <h1 class="title">Manage Products</h1>
    </header>

    <main class="section">
        <div class="container">
        <a href="index.php" class="button is-pulled-right">Back to Admin</a>
            <a href="add_product.php" class="button is-primary">Add New Product</a>
            <table class="table is-fullwidth is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // include database connection
                        include '../includes/db.php';
                        // select all products
                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);

                        // check if there are any products
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>";
                                echo "<a href='edit_product.php?id=" . $row['id'] . "' class='button is-info is-small'>Edit</a> ";
                                echo "<a href='delete_product.php?id=" . $row['id'] . "' class='button is-danger is-small'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No products found</td></tr>";
                        }
                        // close connection
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>&copy; <?php echo date("Y"); ?> Krenich Studios. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
