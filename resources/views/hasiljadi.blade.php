<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <title>Produk</title>
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <script src="https://kit.fontawesome.com/4a1b340fe5.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
        <div class="container">
            <div class="logo">
                <a href="/">Gerobak Listrik</a>
            </div>
            <nav>
                <a href="/">Home</a>
                <a href="/sejarah">Sejarah</a>
                <a href="/cart">Produk</a>
                <a href="/artikel">Artikel</a>
                <a href="/hubungi">Hubungi Kami</a>
            </nav>
        </div>
    </header>

    <section class="product-selection">
    <div class="container">
            <div class="container-product">
                <div class="title">
                    Pilihlah Produk PilihanMu!
                    <p>Pilihlah Produk PilihanMu!</p>
                </div>
                <button id="button">Pilih Paket!</button>
                <ul id="dropdown-menu" class="dropdown">
                    <li><a href="/paketfranchise">Paket Franchise</a></li>
                    <li><a href="/produk">Paket Hasil Jadi</a></li>
                </ul>
            </div>

            <div class="products-cart-container">
                <section class="products">
                    @foreach ($product as $pd)
                        <div class="product" data-name="{{ $pd->ProductName }}" data-price="{{ $pd->Price }}">
                            <img src="{{ $pd->ProductImage }}" alt="Gambar {{ $pd->ProductName }}">
                            <h2>{{ $pd->ProductName }}</h2>
                            <p>{{ $pd->ProductDescription }}</p>
                            <h4>Price:Rp.{{ $pd->Price }},-</h4>
                            <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
                        </div>
                    @endforeach
                </section>
       </section>
       <section class="cart">
        <h2>Shopping Cart</h2>
        <ul class="cart-items">
            <!-- Items will be dynamically added here -->
        </ul>
        <div class="cart-summary">
            <p>Total: <span class="cart-total">0</span></p>
            <button class="checkout-btn">Checkout</button>
        </div>
    </section>
    </main>

    <!-- <footer>
        <div class="container">
            <div class="footer-info">
                <div>
                    <h3>Gerobak Listrik</h3>
                    <ul>
                        <li><a href="/profil">Profil Perusahaan</a></li>
                        <li><a href="/menu">Menu Kami</a></li>
                        <li><a href="/produk">Produk Kami</a></li>
                        <li><a href="/mitra">Bergabung Mitra</a></li>
                        <li><a href="/franchise">Franchise</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h3>Map</h3>
                    <img src="{{ asset('img/maps.png') }}" alt="Gerobak Listrik">
                </div>
                <div>
                    <h3>Media Sosial</h3>
                    <a href="https://wa.me/088926312910"><img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp"></a>
                    <a href="https://www.instagram.com"><img src="https://img.icons8.com/color/48/000000/instagram-new.png" alt="Instagram"></a>
                    <a href="mailto:example@gmail.com"><img src="https://img.icons8.com/color/48/000000/gmail.png" alt="Gmail"></a>
                    <a href="https://www.facebook.com"><img src="https://img.icons8.com/color/48/000000/facebook-new.png" alt="Facebook"></a>
                </div>
            </div>
        </div>
    </footer> -->

    <script src="{{asset('js/product.js') }}"></script>

    <script>
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
            cart = JSON.parse(localStorage.getItem("selectedProductsHasil")) || [];

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
            localStorage.setItem("selectedProductsHasil", JSON.stringify(cart));

            // Update tampilan keranjang
            updateCart();
        }

        // Function to remove item from cart
        function removeItemFromCart(event) {
            const itemIndex = event.target.getAttribute('data-index');
            cart.splice(itemIndex, 1);

            // Perbarui localStorage
            localStorage.setItem("selectedProductsHasil", JSON.stringify(cart));

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
            localStorage.setItem("selectedProductsHasil", JSON.stringify(cart));

            // Update tampilan keranjang
            updateCart();
        }

        // Function to handle checkout
        function handleCheckout() {
            if (cart.length === 0) {
                localStorage.removeItem("selectedProductsHasil");
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
    </script>
</body>
</html>
