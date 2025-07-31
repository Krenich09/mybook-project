<?php
    // start session
    session_start();
    // check if user is logged in
    if (!isset($_SESSION['loggedin'])) {
        // redirect to login page
        header("Location: ../login.php");
        exit;
    }
    // check if user is admin
    if ($_SESSION['is_admin'] != 1) {
        // if not admin, show error message
        echo "You are not an admin, access denied.";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel - MyBooks</title>
    <?php include '../includes/header.php'; ?>
</head>
<body>
    <header class="has-text-centered">
        <h1 class="title">Admin Panel</h1>
        <a href="../index.php" class="button mb-6">Back to site</a>
    </header>

    <main class="section">
        <div class="container">
            <h2 class="title">Welcome, Admin!</h2>
            <div class="columns">
                <div class="column">
                    <a href="products.php" class="button is-primary is-fullwidth">Manage Products</a>
                </div>
                <div class="column">
                    <a href="users.php" class="button is-primary is-fullwidth">Manage Users</a>
                </div>
                <div class="column">
                    <a href="monitoring.php" class="button is-primary is-fullwidth">Monitoring Page</a>
                </div>
                <div class="column">
                    <a href="settings.php" class="button is-primary is-fullwidth">Site Settings</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>&copy; <?php echo date("Y"); ?> Krenich Studios. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
