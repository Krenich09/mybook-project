<?php
    // start session
    session_start();
    // include database connection
    include 'includes/db.php';

    // get product id from url
    $id = $_GET['id'];
    // select product from database
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        // include header
        include 'includes/header.php';
    ?>
    <title><?php echo $row['name']; ?> - MyBooks</title>
</head>
<body>
    <header>
    </header>

    <main class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-half">
                    <figure class="image is-4by3">
                        <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                    </figure>
                </div>
                <div class="column is-half">
                    <h1 class="title"><?php echo $row['name']; ?></h1>
                    <p class="subtitle is-4">$<?php echo $row['price']; ?></p>
                    <div class="content">
                        <p><?php echo $row['description']; ?></p>
                    </div>
                    <div class="field">
                        <label class="label">Option</label>
                        <div class="control">
                            <div class="select">
                                <select id="option">
                                    <?php
                                        $sql_options = "SELECT * FROM product_options WHERE product_id = $id";
                                        $result_options = $conn->query($sql_options);
                                        while($row_option = $result_options->fetch_assoc()) {
                                            echo "<option value='" . $row_option['id'] . "'>" . $row_option['option_name'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Quantity</label>
                        <div class="control">
                            <input class="input" type="number" id="quantity" value="1" min="1">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary" onclick="addToCart(<?php echo $row['id']; ?>, '<?php echo $row['name']; ?>', <?php echo $row['price']; ?>, '<?php echo $row['image']; ?>')">Add to Cart</button>
                        </div>
                    </div>
                </div>
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
    <script>
        // add item to cart
        function addToCart(id, name, price, image) {
            // get selected option and quantity
            const option = document.getElementById('option');
            const option_id = option.value;
            const option_name = option.options[option.selectedIndex].text;
            const quantity = parseInt(document.getElementById('quantity').value);

            // get cart from local storage or create new one
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // check if item is already in cart
            const itemIndex = cart.findIndex(item => item.id === id && item.option_id === option_id);
            if (itemIndex > -1) {
                // update quantity
                cart[itemIndex].quantity += quantity;
            } else {
                // add new item
                cart.push({ id, name, price, image, option_id, option_name, quantity });
            }

            // save cart to local storage
            localStorage.setItem('cart', JSON.stringify(cart));
            // redirect to cart page
            window.location.href = 'cart.php';
        }
    </script>
</body>
</html>
