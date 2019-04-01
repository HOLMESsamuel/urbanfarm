var modal = document.getElementById('modal');
var close = document.getElementById('close');

window.addEventListener('click', closeModalExt);

function openModal() {
    modal.style.display = 'block';
}

function closeModal() {
    modal.style.display = 'none';
}

function closeModalExt(e) {
    if (e.target == modal) {
        modal.style.display = 'none';
    }
}