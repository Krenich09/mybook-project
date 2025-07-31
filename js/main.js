// main javascript file

// bulma navbar burger functionality
document.addEventListener('DOMContentLoaded', () => {

    // get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

        // add a click event on each of them
        $navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {

                // get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });
    }

});

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
