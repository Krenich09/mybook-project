<?php
    // start session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        // include header
        include 'includes/header.php';
    ?>
    <title>Contact Us - MyBooks</title>
</head>
<body>

    <main class="section">
        <div class="container">
            <h1 class="title">Contact Us</h1>
            <form action="contact.php" method="post">
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
                    <label class="label">Message</label>
                    <div class="control">
                        <textarea class="textarea" id="message" name="message" required></textarea>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-primary" type="submit">Send Message</button>
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
