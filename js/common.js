
export const hidePreLoader = (time = 500) => {
    console.log('|================ DOM Content Loaded ================|');
    setTimeout(() => {
        document.body.classList.remove('loading');
        document.querySelector('#preLoader').style.visibility = 'hidden';
    }, time);
}

export const setRandomImgToPolicyForm = () => {
    if ((document.URL).includes('policy.php')) {
        const rndNo = Math.floor(Math.random() * 4) + 1;
        document.querySelector('.buy-policy-form>.policy-form-l-bg').style.backgroundImage = "url(../images/policy-form-img-" + rndNo + ".svg)";
    }
    return false;
}

export const closeNotificationCard = () => {
    let notificationCloseBtn = document.querySelector("#notificationCloseBtn");
    let notificationCard = document.querySelector("#notificationCard");
    notificationCloseBtn.addEventListener("click", (event) => {
        notificationCard.classList.add('slide-out');
        setTimeout(() => {
            notificationCard.remove();
        }, 1500);
    });
}