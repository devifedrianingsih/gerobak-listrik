// Initialize empty cart
let cart = [];

// Function to format price as Rp
function formatPrice(price) {
    return 'Rp ' + price.toLocaleString('id-ID');
}

// Function to update cart display
function updateCart() {
    const cartItems = document.querySelector('.cart-items');
    const cartTotal = document.querySelector('.cart-total');

    // Ambil data dari `localStorage` untuk sinkronisasi
    cart = JSON.parse(localStorage.getItem("selectedProducts")) || [];

    // Bersihkan tampilan keranjang
    cartItems.innerHTML = '';

    // Hitung total harga
    let totalPrice = 0;

    if (cart.length === 0) {
        cartItems.innerHTML = '<li>Keranjang kosong</li>';
    } else {
        cart.forEach((item, index) => {
            const li = document.createElement('li');
            li.className = 'cart-item';
            li.innerHTML = `
                ${item.name} - ${formatPrice(item.price)} 
                <span class="qty">Qty: <input type="number" class="qty-input" style="width: 30px;" value="${item.quantity}" data-index="${index}" min="1"></span>
                <span class="remove-btn" data-index="${index}">X</span>
            `;
            cartItems.appendChild(li);
            totalPrice += item.price * item.quantity;
        });
    }

    // Perbarui total harga di DOM
    cartTotal.textContent = `${formatPrice(totalPrice)}`;

    // Tambahkan event listener ke tombol hapus
    document.querySelectorAll('.remove-btn').forEach(button => {
        button.addEventListener('click', removeItemFromCart);
    });

    // Tambahkan event listener untuk mengubah qty
    document.querySelectorAll('.qty-input').forEach(input => {
        input.addEventListener('change', updateItemQuantity);
    });
}

// Function to add item to cart
function addToCart(event) {
    const productElement = event.target.parentElement;
    const productName = productElement.getAttribute('data-name');
    const productPrice = parseFloat(productElement.getAttribute('data-price').replace(/\./g, ''));

    if (!productName || isNaN(productPrice)) {
        alert("Data produk tidak valid");
        return;
    }

    const existingProductIndex = cart.findIndex(item => item.name === productName);

    if (existingProductIndex === -1) {
        // Produk belum ada, tambahkan produk baru dengan qty = 1
        cart.push({
            name: productName,
            price: productPrice,
            quantity: 1
        });
    } else {
        // Produk sudah ada, tambahkan qty-nya
        cart[existingProductIndex].quantity += 1;
    }

    // Simpan ke localStorage
    localStorage.setItem("selectedProducts", JSON.stringify(cart));

    // Update tampilan keranjang
    updateCart();
}

// Function to remove item from cart
function removeItemFromCart(event) {
    const itemIndex = event.target.getAttribute('data-index');
    cart.splice(itemIndex, 1);

    // Perbarui localStorage
    localStorage.setItem("selectedProducts", JSON.stringify(cart));

    // Perbarui tampilan keranjang
    updateCart();
}

// Function to update quantity
function updateItemQuantity(event) {
    const index = event.target.getAttribute('data-index');
    const newQuantity = parseInt(event.target.value, 10);

    // Jika jumlah tidak valid (kurang dari 1), kembalikan ke 1
    if (newQuantity < 1) {
        event.target.value = 1;
        return;
    }

    // Perbarui quantity item
    cart[index].quantity = newQuantity;

    // Simpan perubahan ke localStorage
    localStorage.setItem("selectedProducts", JSON.stringify(cart));

    // Update tampilan keranjang
    updateCart();
}

// Function to handle checkout
function handleCheckout() {
    if (cart.length === 0) {
        localStorage.removeItem("selectedProducts");
        alert("Keranjang Anda kosong. Silakan tambahkan barang sebelum checkout.");
    } else {
        window.location.href = '/checkout'; // Ganti dengan URL halaman checkout
    }
}

// Attach event listeners to 'Add to Cart' buttons
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', addToCart);
});

// Attach event listener to the checkout button
document.querySelector('.checkout-btn').addEventListener('click', handleCheckout);

// Muat data keranjang saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    updateCart(); // Panggil fungsi untuk memperbarui tampilan keranjang
});
