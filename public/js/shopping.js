document.addEventListener("DOMContentLoaded", function() {
    const priceElement = document.querySelector(".price");
    const quantityInput = document.querySelector(".quantity");
    const totalPriceElement = document.getElementById("total-price");

    // Menghitung Total Harga
    function updateTotal() {
        const price = parseInt(priceElement.textContent);
        const quantity = parseInt(quantityInput.value);
        const totalPrice = price * quantity;
        totalPriceElement.textContent = totalPrice.toLocaleString();
    }

    // Event Listener untuk perubahan jumlah produk
    quantityInput.addEventListener("input", updateTotal);

    // Tombol Checkout
    const checkoutButton = document.getElementById("checkout-button");
    checkoutButton.addEventListener("click", function() {
        const name = document.getElementById("name").value;
        const address = document.getElementById("address").value;
        const phone = document.getElementById("phone").value;

        if (name && address && phone) {
            alert(`Terima kasih, ${name}! Pesanan Anda telah diproses.`);
        } else {
            alert("Harap lengkapi semua informasi pengiriman.");
        }
    });
});
