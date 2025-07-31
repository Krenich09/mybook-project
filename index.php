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
</head>
<body>
    <header class="hero is-primary">
        <div class="hero-head">
        </div>
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1">Welcome to MyBooks</h1>
                <h2 class="subtitle is-3">Find your next favorite book here.</h2>
            </div>
        </div>
    </header>

    <main class="section">
        <div class="container">
            <h2 class="title is-2 has-text-centered">Featured Books</h2>
            <div class="columns is-centered">
                <?php
                    // include database connection
                    include 'includes/db.php';
                    // select 3 random products
                    $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
                    $result = $conn->query($sql);

                    // check if there are any products
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='column is-one-quarter'>";
                            echo "<div class='card'>";
                            echo "<div class='card-image'>";
                            echo "<figure class='image is-4by3'>";
                            echo "<img src='images/" . $row['image'] . "' alt='" . $row['name'] . "'>";
                            echo "</figure>";
                            echo "</div>";
                            echo "<div class='card-content'>";
                            echo "<p class='title is-4'>" . $row['name'] . "</p>";
                            echo "<p class='subtitle is-6'>$" . $row['price'] . "</p>";
                            echo "</div>";
                            echo "<footer class='card-footer'>";
                            echo "<a href='product.php?id=" . $row['id'] . "' class='card-footer-item'>View Details</a>";
                            echo "</footer>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "0 results";
                    }
                    // close connection
                    $conn->close();
                ?>
            </div>
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
