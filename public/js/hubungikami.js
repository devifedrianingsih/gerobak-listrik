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
    formMessage.textContent = 'Your message has been sent! Thank you.';
    formMessage.style.color = 'green';

    // Reset form
    form.reset();
  } else {
    formMessage.textContent = 'Please fill out all fields.';
    formMessage.style.color = 'red';
  }
});
