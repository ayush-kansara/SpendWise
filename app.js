const hamburger = document.getElementById('hamburger');
const nav = document.querySelector('#navContainer');

hamburger.addEventListener('click', () => {
    nav.classList.toggle('active');
});
