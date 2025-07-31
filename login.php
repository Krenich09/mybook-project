<?php
    // start session
    session_start();
    // include database connection
    include 'includes/db.php';

    // check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // get form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // check if user exists
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        // if user exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // verify password
            if (password_verify($password, $row['password'])) {
                // set session variables
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['is_admin'] = $row['is_admin'];
                // redirect to home page
                header("Location: index.php");
            } else {
                // if password is wrong
                echo "Invalid password.";
            }
        } else {
            // if user does not exist
            echo "No user found with that email.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/header.php'; ?>
    <title>Login - MyBooks</title>
</head>
<body>
    <main class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-half">
                    <h1 class="title">Login</h1>
                    <form action="login.php" method="post">
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="email" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input" type="password" id="password" name="password" required>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button class="button is-primary" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="content has-text-centered">
            <?php include 'includes/footer.php'; ?>
        </div>
    </footer>

</body>
</html>
