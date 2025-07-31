<?php
    // start session
    session_start();

    // check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // set theme in session
        $_SESSION['theme'] = $_POST['theme'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Site Settings - MyBooks</title>
    <?php include '../includes/header.php'; ?>
</head>
<body>
    <header class="has-text-centered">
        <h1 class="title">Site Settings</h1>
    </header>

    <section class="section">
        <div class="container">
            <a href="index.php" class="button mb-6">Back to Admin</a>
            <div class="box" style="margin-top: 30px !important;">
                <form action="settings.php" method="post">
                    <div class="field">
                        <label class="label">Select a theme:</label>
                        <div class="control">
                            <div class="select">
                <select name="theme" id="theme">
                    <option value="style.css">Regular</option>
                    <option value="christmas.css">Christmas</option>
                    <option value="summer.css">Summer</option>
                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary" type="submit">Save Settings</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>&copy; <?php echo date("Y"); ?> Krenich Studios. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
