<?php
    // RAID KRENICH
    // 110139851
    // define a base path for the project
    $base_path = '/COMP3340/final_project/';
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="MyBooks is an online bookstore where you can buy your favorite books.">
<meta name="keywords" content="books, bookstore, online bookstore, buy books, mybooks">
<meta name="author" content="Raid Krenich">
<title>MyBooks</title>
<link rel="stylesheet" href="https://jenil.github.io/bulmaswatch/lumen/bulmaswatch.min.css">
<script src="https://kit.fontawesome.com/9abe29d3f9.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo $base_path; ?>css/style.css">
<link rel="stylesheet" href="<?php echo $base_path; ?>css/<?php echo isset($_SESSION['theme']) ? $_SESSION['theme'] : ''; ?>">
<link rel="icon" href="<?php echo $base_path; ?>images/favicon.ico" type="image/x-icon">
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="<?php echo $base_path; ?>index.php">
            <strong class="is-size-4">MyBooks</strong>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="<?php echo $base_path; ?>index.php">
                Home
            </a>

            <a class="navbar-item" href="<?php echo $base_path; ?>products.php">
                Products
            </a>

            <a class="navbar-item" href="<?php echo $base_path; ?>about.php">
                About
            </a>

            <a class="navbar-item" href="<?php echo $base_path; ?>contact.php">
                Contact
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                        <a class="button is-primary" href="<?php echo $base_path; ?>profile.php">
                            <strong>Profile</strong>
                        </a>
                        <a class="button is-light" href="<?php echo $base_path; ?>logout.php">
                            Log out
                        </a>
                        <?php if ($_SESSION['is_admin'] == 1): ?>
                            <a class="button is-warning" href="<?php echo $base_path; ?>admin">
                                Admin
                            </a>
                        <?php endif; ?>
                    <?php else: ?>
                        <a class="button is-primary" href="<?php echo $base_path; ?>register.php">
                            <strong>Sign up</strong>
                        </a>
                        <a class="button is-light" href="<?php echo $base_path; ?>login.php">
                            Log in
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="navbar-item">
                <!-- Cart button -->
                <a class="button is-info" href="<?php echo $base_path; ?>cart.php">
                    <span class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </span>
                    <span>Cart</span>
                </a>
            </div>
        </div>
    </div>
</nav>
