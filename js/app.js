import * as navigation from './navigation.js';

// TODO this will handle by user authentication
let isLoggedUser = true;

document.addEventListener('DOMContentLoaded', () => {
    setTimeout(hidePreLoader, 1000);
});

window.onload = (event) => {
    navigation.toggleMobileViewClass();
    navigation.menuBarsToggler();
    navigation.scrollToTop();

    !isLoggedUser ? document.querySelector('.avatar-li').remove() : document.querySelector('#regAndLogin').remove();
};

window.addEventListener('resize', () => {
    navigation.toggleMobileViewClass();
});

const hidePreLoader = () => {
    console.log('|================ DOM Content Loaded ================|');
    document.body.classList.remove('loading');
    document.querySelector('#preLoader').style.visibility = 'hidden';
}




