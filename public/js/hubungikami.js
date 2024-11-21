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
            `*===============*\n` +
            `*HUBUNGI KAMI*\n` +
            `*===============*\n` +
            `Nama: ${name}%0A\n` +
            `Email: ${email}%0A\n` +
            `Pesan: ${message}\n`
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
