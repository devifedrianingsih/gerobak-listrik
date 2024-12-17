// Ambil produk yang dipilih dari localStorage
const selectedProducts = JSON.parse(localStorage.getItem("selectedProducts")) || [];

// Elemen untuk menampilkan rangkuman pembelian
const summaryContainer = document.getElementById("summary");
let total = 0;

// Format harga sebagai mata uang
function formatPrice(price) {
    return "Rp " + price.toLocaleString("id-ID");
}

// Tampilkan rangkuman produk dan hitung total harga
selectedProducts.forEach((product) => {
    const productElement = document.createElement("p");

    // Hitung total harga untuk setiap produk
    const productTotalPrice = product.price * product.quantity;

    productElement.innerHTML = `${product.name}: <span>${formatPrice(product.price)}</span> (Qty: ${product.quantity})`;
    summaryContainer.appendChild(productElement);

    // Tambahkan total harga produk ke total keseluruhan
    total += productTotalPrice;
});

// Tampilkan total harga di halaman
document.getElementById("total-display").innerHTML = `Total: <strong>${formatPrice(total)}</strong>`;

// Tambahkan total harga ke input tersembunyi untuk backend
document.getElementById("total").value = total;

// Buat struktur JSON untuk produk_list
const produkList = selectedProducts.map((product) => ({
    nama_produk: product.name,
    harga_produk: parseInt(product.price, 10), // Pastikan harga dalam format angka
    kuantitas: parseInt(product.quantity, 10), // Pastikan kuantitas dalam format angka
}));

// Masukkan JSON produk_list ke input tersembunyi yang sudah ada
document.getElementById("produk-list").value = JSON.stringify(produkList);

// Inisialisasi peta dan marker
let map;
let marker;

function initMap() {
    // Inisialisasi peta dengan lokasi default
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -6.5570598, lng: 106.7663379 }, // Lokasi default
        zoom: 14,
    });

    // Tambahkan marker untuk lokasi pengguna
    marker = new google.maps.Marker({
        map: map,
    });
}

// Fungsi untuk mendapatkan lokasi pengguna
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Set marker ke lokasi pengguna
                marker.setPosition({ lat: latitude, lng: longitude });

                // Pindahkan peta ke lokasi pengguna
                map.setCenter({ lat: latitude, lng: longitude });

                // Gunakan Geocoder untuk mendapatkan alamat dari koordinat
                const geocoder = new google.maps.Geocoder();
                const latLng = { lat: latitude, lng: longitude };

                geocoder.geocode({ location: latLng }, function (results, status) {
                    if (status === google.maps.GeocoderStatus.OK && results[0]) {
                        const address = results[0].formatted_address;
                        document.getElementById("manual-address").value = address;

                        // Sembunyikan input manual jika lokasi otomatis berhasil
                        document.getElementById("manualAddress").style.display = "none";
                    } else {
                        alert("Alamat tidak ditemukan.");
                        document.getElementById("manualAddress").style.display = "block";
                    }
                });
            },
            function () {
                alert("Gagal mengambil lokasi.");
                document.getElementById("manualAddress").style.display = "block";
            }
        );
    } else {
        alert("Geolocation tidak didukung oleh browser ini.");
        document.getElementById("manualAddress").style.display = "block";
    }
}

// Event listener untuk tombol checkout
document.getElementById("checkout-btn").addEventListener("click", function () {
    // Ambil data dari formulir
    const name = document.getElementById("name").value;
    const address = document.getElementById("manual-address").value;
    const city = document.getElementById("city").value;
    const postal = document.getElementById("postal").value;
    const phone = document.getElementById("phone").value;
    const paymentMethod = document.getElementById("payment-method").value;

    // Validasi input
    if (!name || !address || !city || !postal || !phone || !paymentMethod) {
        alert("Harap lengkapi semua informasi pengiriman dan pembayaran.");
        return;
    }

    // Kirim form jika semua validasi berhasil
    document.querySelector("form").submit();
});

// Inisialisasi peta saat halaman dimuat
window.onload = initMap;
