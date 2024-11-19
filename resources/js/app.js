const btnHeader = document.querySelector('.btn-header-menu');
const blockMenu = document.querySelector('.hidden-block-menu');


const btnListener = btnHeader.addEventListener('click', () => {

        blockMenu.classList.toggle('active-menu');
        removeEventListener(btnListener);
});
