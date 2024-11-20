const form = document.getElementById('contact-form');
const formMessage = document.getElementById('form-message');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    // Ambil data dari form
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    // Validasi input
    if (name && email && message) {
        // Simulasikan pengiriman data
        formMessage.textContent = 'Pesan Anda telah dikirim! Terima kasih.';
        formMessage.style.color = 'green';

        // Format pesan WhatsApp dengan line break yang benar
        const whatsappMessage = encodeURIComponent(
            `*Hubungi Kami*%0A%0A` +
            `Nama: ${name}%0A` +
            `Email: ${email}%0A` +
            `Pesan: ${message}`
        );

        // Nomor telepon tujuan
        const phoneNumber = '6281295206633';  // Ganti dengan nomor WhatsApp tujuan (format internasional tanpa tanda +)

        // URL WhatsApp untuk mengirim pesan
        const whatsappUrl = `https://wa.me/${phoneNumber}?text=${whatsappMessage}`;

        // Buka WhatsApp
        window.open(whatsappUrl, '_blank');

        // Reset form
        form.reset();
    } else {
        formMessage.textContent = 'Mohon isi semua kolom.';
        formMessage.style.color = 'red';
    }
});
