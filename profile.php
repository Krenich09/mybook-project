<?php
    // start session
    session_start();
    // include database connection
    include 'includes/db.php';

    // check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // get form data
        $name = $_POST['name'];
        $id = $_SESSION['id'];

        // update user's name in database
        $sql = "UPDATE users SET name = '$name' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            // update session variable
            $_SESSION['name'] = $name;
            // refresh page
            header("Location: profile.php");
        } else {
            // if error
            echo "Error updating record: " . $conn->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        // include header
        include 'includes/header.php';
    ?>
    <title>Profile - MyBooks</title>
</head>
<body>
    <header>
        <h1 class="title">Profile</h1>
    </header>

    <main class="section">
        <div class="container">
            <h1 class="title">Welcome, <?php echo $_SESSION['name']; ?>!</h1>
            <p>This is your profile page.</p>

            <form action="profile.php" method="post">
                <div class="field">
                    <label class="label">Change Your Name</label>
                    <div class="control">
                        <input class="input" type="text" name="name" value="<?php echo $_SESSION['name']; ?>" required>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-primary" type="submit">Update Name</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="content has-text-centered">
            <?php
                // include footer
                include 'includes/footer.php';
            ?>
        </div>
    </footer>

</body>
</html>
