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
    // include database connection
    include '../includes/db.php';

    // check database connection
    if ($conn->connect_error) {
        $db_status = "Offline";
    } else {
        $db_status = "Online";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>System Monitoring - MyBooks</title>
    <?php include '../includes/header.php'; ?>
</head>
<body>
    <header class="has-text-centered">
        <h1 class="title">Website Status</h1>
    </header>

    <main class="section">
        <div class="container">
            <a href="index.php" class="button">Back to Admin</a>
            <table class="table is-fullwidth is-striped">
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Database</td>
                        <td><span class="tag <?php echo ($db_status == 'Online') ? 'is-success' : 'is-danger'; ?>"><?php echo $db_status; ?></span></td>
                    </tr>
                    <tr>
                        <td>Web Server</td>
                        <td><span class="tag is-success">Online</span></td>
                    </tr>
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
