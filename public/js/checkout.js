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
    const phoneNumber = '6281295206633';  // Ganti dengan nomor WhatsApp tujuan (format internasional tanpa tanda +)
    
    // URL WhatsApp untuk mengirim pesan
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${message}`;
    
    // Buka WhatsApp
    window.open(whatsappUrl, '_blank');
});