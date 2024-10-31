
document.getElementById('button').addEventListener('click', function() {
    var menu = document.getElementById('dropdown-menu');
    if (menu.style.display === 'block') {
        menu.style.display = 'none';
    } else {
        menu.style.display = 'block';
    }
});

document.addEventListener('click', function(event) {
    var isClickInside = document.getElementById('button').contains(event.target);
    var menu = document.getElementById('dropdown-menu');

    if (!isClickInside) {
        menu.style.display = 'none';
    }
});
