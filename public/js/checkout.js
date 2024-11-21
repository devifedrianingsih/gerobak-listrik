// Ambil data dari localStorage
const selectedProducts = JSON.parse(localStorage.getItem("selectedProducts")) || [];

// Tampilkan data di halaman checkout
const summaryContainer = document.getElementById("summary");
let total = 0;

function formatPrice(price) {
    return 'Rp ' + price.toLocaleString('id-ID');
}

// Periksa setiap produk dan hitung total berdasarkan quantity
selectedProducts.forEach(product => {
    const productElement = document.createElement("p");

    // Hitung harga total untuk produk berdasarkan quantity
    const productTotalPrice = product.price * product.quantity;

    productElement.innerHTML = `${product.name}: <span>${formatPrice(product.price)}</span> (Qty: ${product.quantity})`;
    summaryContainer.appendChild(productElement);

    // Tambahkan harga total ke total keseluruhan
    total += productTotalPrice;
});

// Tampilkan total harga
document.getElementById("total").innerHTML = `Total: <strong>${formatPrice(total)}</strong>`;

// Inisialisasi peta dan marker
let map;
let marker;

function initMap() {
    // Inisialisasi peta dengan lokasi default (Alamat STP)
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -6.5570598, lng: 106.7663379 }, // Jakarta
        zoom: 14
    });

    // Tambahkan marker untuk lokasi pengguna
    marker = new google.maps.Marker({
        map: map
    });
}

// Fungsi untuk mendapatkan lokasi pengguna
function getLocation() {
    if (navigator.geolocation) {
        // Mengambil lokasi pengguna
        navigator.geolocation.getCurrentPosition(function(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Set marker ke lokasi pengguna
            marker.setPosition({ lat: latitude, lng: longitude });

            // Pindahkan peta ke lokasi pengguna
            map.setCenter({ lat: latitude, lng: longitude });

            // Gunakan Geocoder untuk mendapatkan alamat dari koordinat
            const geocoder = new google.maps.Geocoder();
            const latLng = { lat: latitude, lng: longitude };

            geocoder.geocode({ location: latLng }, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK && results[0]) {
                    const address = results[0].formatted_address;
                    document.getElementById("address").value = address;  // Set alamat ke input

                    // Menyembunyikan input manual jika alamat ditemukan otomatis
                    document.getElementById("manualAddress").style.display = "none";
                } else {
                    alert("Alamat tidak ditemukan.");
                    // Tampilkan input manual jika geolocation gagal
                    document.getElementById("manualAddress").style.display = "block";
                }
            });
        }, function() {
            alert("Gagal mengambil lokasi.");
            // Tampilkan input manual jika geolocation gagal
            document.getElementById("manualAddress").style.display = "block";
        });
    } else {
        alert("Geolocation tidak didukung oleh browser ini.");
        // Tampilkan input manual jika geolocation tidak didukung
        document.getElementById("manualAddress").style.display = "block";
    }
}

// Mengatur event listener untuk tombol checkout
document.getElementById("checkout-btn").addEventListener("click", function() {
    // Ambil data formulir
    const name = document.getElementById("name").value;
    const address = document.getElementById("address").value;
    const city = document.getElementById("city").value;
    const postal = document.getElementById("postal").value;
    const phone = document.getElementById("phone").value;
    const paymentMethod = document.getElementById("payment-method").value;
    
    // Ambil data rangkuman pembelian
    const summary = document.getElementById("summary");
    const totalPrice = document.getElementById("total").innerText.replace('Total: ', '').trim();
    
    // Format pesan WhatsApp dengan line break yang benar
    const message = encodeURIComponent(
        `*===============*\n` +
        `*RANGKUMAN PEMBELIAN*\n` +
        `*===============*\n\n` +
        `*Data Pembeli:*\n` +
        `Nama: ${name}\n` +
        `Alamat: ${address}\n` +
        `Kota: ${city}\n` +
        `Kode Pos: ${postal}\n` +
        `Telepon: ${phone}\n` +
        `Metode Pembayaran: ${paymentMethod}\n\n` +
        `*Rangkuman Produk:*\n` +
        `${summary.innerText.replace(/\n/g, '\n')}\n\n` +
        `*Total Harga:*\n` +
        `*${totalPrice}*\n\n` +
        `*===============*`
    );

    // Nomor telepon tujuan
    const phoneNumber = '6281918999460';  // Ganti dengan nomor WhatsApp tujuan (format internasional tanpa tanda +)
    
    // URL WhatsApp untuk mengirim pesan
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${message}`;
    
    // Buka WhatsApp
    window.open(whatsappUrl, '_blank');
});

// Inisialisasi peta ketika halaman selesai dimuat
window.onload = initMap;
