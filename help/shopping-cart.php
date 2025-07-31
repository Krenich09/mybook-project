<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../includes/header.php'; ?>
    <title>Shopping Cart - MyBooks</title>
</head>
<body>
    <header>
    </header>

    <main class="section">
        <div class="container">
            <h1 class="title">Shopping Cart</h1>
            <div class="content">
                <p>This guide will explain how to use the shopping cart.</p>
                <h2>Adding Items to Your Cart</h2>
                <p>To add an item to your cart, navigate to the product's page and click the "Add to Cart" button. You can then view your cart by clicking on the "Cart" link in the navigation bar.</p>
                <h2>Updating and Removing Items</h2>
                <p>In your shopping cart, you can update the quantity of each item or remove it completely. To update the quantity, change the number in the quantity field. To remove an item, click the "Remove" button.</p>
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
