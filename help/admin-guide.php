<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../includes/header.php'; ?>
    <title>Admin Guide - MyBooks</title>
</head>
<body>
    <header>
    </header>

    <main class="section">
        <div class="container">
            <h1 class="title">Admin Guide</h1>
            <div class="content">
                <p>This guide is for administrators of the online bookstore.</p>
                <h2>Accessing the Admin Panel</h2>
                <p>You can access the admin panel by clicking on the "Admin" link in the navigation bar when you are logged in as an administrator.</p>
                <h2>Managing Products</h2>
                <p>In the admin panel, you can add, edit, and delete products. To add a new product, click on the "Add New Product" button and fill out the form, including a name, description, price, and an image of the product. To edit or delete a product, use the links in the product table.</p>
                <h2>Managing Users</h2>
                <p>You can also manage users in the admin panel. You can edit user information and make other users administrators.</p>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="content has-text-centered">
            <?php include '../includes/footer.php'; ?>
        </div>
    </footer>
</body>
</html>
