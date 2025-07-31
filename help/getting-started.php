<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../includes/header.php'; ?>
    <title>Getting Started - MyBooks</title>
</head>
<body>
    <header>
    </header>

    <main class="section">
        <div class="container">
            <h1 class="title">Getting Started</h1>
            <div class="content">
                <p>Welcome to MyBooks! This guide will help you get started with our online bookstore.</p>
                <h2>Creating an Account</h2>
                <p>To get started, you'll need to create an account. Click on the "Register" link in the navigation bar and fill out the form. Once you've created an account, you can log in using the "Login" link.</p>
                <h2>Browsing Products</h2>
                <p>You can browse our products by clicking on the "Products" link in the navigation bar. You can view the details of each product by clicking on the "View Details" button.</p>

                <h2>See Also</h2>
                <ul>
                    <li><a href="admin-guide.php">Admin Guide</a></li>
                    <li><a href="shopping-cart.php">Shopping Cart</a></li>
                    <li><a href="checkout.php">Checkout</a></li>
                    <li><a href="user-profile.php">User Profile</a></li>
                </ul>
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
