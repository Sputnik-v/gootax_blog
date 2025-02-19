const btnHeader = document.querySelector('.btn-header-menu');
const blockMenu = document.querySelector('.hidden-block-menu');


if (btnHeader) {
    const btnListener = btnHeader.addEventListener('click', (e) => {

        blockMenu.classList.toggle('active-menu');
        removeEventListener(btnListener);
    });
}



