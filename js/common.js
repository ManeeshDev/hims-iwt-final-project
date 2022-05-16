
export const hidePreLoader = (time = 500) => {
    console.log('|================ DOM Content Loaded ================|');
    setTimeout(() => {
        document.body.classList.remove('loading');
        document.querySelector('#preLoader').style.visibility = 'hidden';
    }, time);
}
