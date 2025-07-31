<?php
    // start session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Users - MyBooks</title>
    <?php
        // include header
        include '../includes/header.php';
    ?>
</head>
<body>
    <header class="has-text-centered">
        <h1 class="title">Manage Users</h1>
    </header>

    <main class="section">
        <div class="container">
        <a href="index.php" class="button">Back to Admin</a>
            <table class="table is-fullwidth is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // include database connection
                        include '../includes/db.php';
                        // select all users
                        $sql = "SELECT * FROM users";
                        $result = $conn->query($sql);

                        // check if there are any users
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . ($row['is_admin'] ? 'Yes' : 'No') . "</td>";
                                echo "<td>";
                                echo "<a href='edit_user.php?id=" . $row['id'] . "' class='button is-info is-small'>Edit</a> ";
                                echo "<a href='delete_user.php?id=" . $row['id'] . "' class='button is-danger is-small'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No users found</td></tr>";
                        }
                        // close connection
                        $conn->close();
                    ?>
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
