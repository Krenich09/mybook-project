<?php
    // start session
    session_start();
    // include database connection
    include 'includes/db.php';

    // check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // check if passwords match
        if ($password == $confirm_password) {
            // hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            // insert user into database
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
            if ($conn->query($sql) === TRUE) {
                // redirect to login page
                header("Location: login.php");
            } else {
                // if error
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            // if passwords do not match
            echo "Passwords do not match.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/header.php'; ?>
    <title>Register - MyBooks</title>
</head>
<body>
    <main class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-half">
                    <h1 class="title">Register</h1>
                    <form action="register.php" method="post">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input" type="text" id="name" name="name" required>
                            </div>
                        </div>

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
                            <label class="label">Confirm Password</label>
                            <div class="control">
                                <input class="input" type="password" id="confirm_password" name="confirm_password" required>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button class="button is-primary" type="submit">Register</button>
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
