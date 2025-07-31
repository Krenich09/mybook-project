<?php
    // start session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/header.php'; ?>
    <title>Shopping Cart - MyBooks</title>
</head>
<body>
    <header>
    </header>

    <main class="section">
        <div class="container">
            <h1 class="title">Shopping Cart</h1>
            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Option</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                </tbody>
            </table>
            <h3 class="title is-3">Total: $<span id="cart-total">0.00</span></h3>
            <a href="checkout.php" class="button is-primary">Proceed to Checkout</a>
        </div>
    </main>

    <footer class="footer">
        <div class="content has-text-centered">
            <?php include 'includes/footer.php'; ?>
        </div>
    </footer>

    <script>
        // display cart items
        function displayCart() {
            // get cart from local storage
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItems = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');
            let total = 0;

            // clear cart items
            cartItems.innerHTML = '';

            // check if cart is empty
            if (cart.length === 0) {
                cartItems.innerHTML = '<tr><td colspan="6">Your cart is empty.</td></tr>';
            } else {
                // loop through cart items and display them
                cart.forEach((item, index) => {
                    const subtotal = item.price * item.quantity;
                    total += subtotal;

                    cartItems.innerHTML += `
                        <tr>
                            <td>${item.name}</td>
                            <td>${item.option_name}</td>
                            <td><input class="input" type="number" value="${item.quantity}" min="0" onchange="updateQuantity(${index}, this.value)"></td>
                            <td>$${item.price}</td>
                            <td>$${subtotal.toFixed(2)}</td>
                            <td><button class="button is-danger" onclick="removeItem(${index})">Remove</button></td>
                        </tr>
                    `;
                });
            }

            // display total
            cartTotal.innerText = total.toFixed(2);
        }

        // remove item from cart
        function removeItem(index) {
            // get cart from local storage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            // remove item from cart
            cart.splice(index, 1);
            // save cart to local storage
            localStorage.setItem('cart', JSON.stringify(cart));
            // re-display cart
            displayCart();
        }

        // update quantity
        function updateQuantity(index, quantity) {
            // get cart from local storage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            // update quantity
            cart[index].quantity = parseInt(quantity);
            // if quantity is 0, remove item
            if (cart[index].quantity === 0) {
                cart.splice(index, 1);
            }
            // save cart to local storage
            localStorage.setItem('cart', JSON.stringify(cart));
            // re-display cart
            displayCart();
        }

        // display cart items on page load
        displayCart();
    </script>
</body>
</html>
