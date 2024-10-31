// Initialize empty cart
let cart = [];

// Function to update cart display
function updateCart() {
    const cartItems = document.querySelector('.cart-items');
    const cartTotal = document.querySelector('.cart-total');

    // Clear the current cart items
    cartItems.innerHTML = '';

    // Calculate total price
    let totalPrice = 0;

    if (cart.length === 0) {
        // Display message if cart is empty
        cartItems.innerHTML = '<li>Cart is empty</li>';
    } else {
        cart.forEach(item => {
            const li = document.createElement('li');
            li.textContent = `${item.name} - $${item.price.toFixed(2)}`;
            cartItems.appendChild(li);
            totalPrice += item.price;
        });
    }

    // Update total price in the DOM
    cartTotal.textContent = `Total: $${totalPrice.toFixed(2)}`;
}

// Function to add item to cart and redirect to checkout
function addToCart(event) {
    const productElement = event.target.parentElement;
    const productName = productElement.getAttribute('data-name');
    const productPrice = parseFloat(productElement.getAttribute('data-price'));

    if (!productName || isNaN(productPrice)) {
        alert("Invalid product data");
        return;
    }

    // Add product to cart array
    cart.push({
        name: productName,
        price: productPrice
    });

    // Update cart UI
    updateCart();

    // Show a notification to the user (optional)
    alert(`${productName} has been added to your cart.`);

    // Redirect to checkout page
    window.location.href = '/checkout'; // Change this to your actual checkout URL
}

// Attach event listeners to 'Add to Cart' buttons
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', addToCart);
});
