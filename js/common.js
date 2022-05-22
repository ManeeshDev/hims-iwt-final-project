
export const hidePreLoader = (time = 500) => {
    console.log('|================ DOM Content Loaded ================|');
    setTimeout(() => {
        document.body.classList.remove('loading');
        document.querySelector('#preLoader').style.visibility = 'hidden';
    }, time);
}

export const closeNotificationCard = () => {
    let notificationCloseBtn = document.querySelector("#notificationCloseBtn");
    let notificationCard = document.querySelector("#notificationCard");
    if (notificationCloseBtn && notificationCard) {
        notificationCloseBtn.addEventListener("click", (event) => {
            notificationCard.classList.remove('slide-in');
            notificationCard.classList.add('slide-out');
            setTimeout(() => notificationCard.remove(), 1500);
        });
        setTimeout(() => notificationCard.classList.add('slide-out'), 11000);
        setTimeout(() => notificationCard.remove(), 14000);
    }
}
