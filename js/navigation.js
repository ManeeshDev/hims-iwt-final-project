import { numRound } from './helper.js';

export const toggleMobileViewClass = () => {
    // this is like adding Media Queries for required css classes
    if (window.innerWidth < 860) {
        document.body.classList.add('mobile-view');
    } else {
        document.body.classList.remove('mobile-view');
    }
}

export const menuBarsToggler = () => {
    let menuBars = document.querySelector('.menu-bars');
    let mobileNav = document.querySelector('.nav-list');
    let bars = document.querySelectorAll('.menu-bars span');
    let isActive = false;

    menuBars.addEventListener('click', () => {
        mobileNav.classList.toggle('open');
        if (isActive) {
            bars[0].style.transform = 'rotate(0deg)';
            bars[1].style.opacity = '1';
            bars[2].style.transform = 'rotate(0deg)';
            isActive = false;
        } else {
            bars[0].style.transform = 'rotate(45deg)';
            bars[1].style.opacity = '0';
            bars[2].style.transform = 'rotate(-45deg)';
            isActive = true;
        }
    });
}

export const scrollToTop = () => {
    let scrollToTopBtn = document.querySelector('.scroll-to-top-btn');
    let rootElement = document.documentElement;

    const handleScroll = () => {
        // 0.15 is the percentage the page has to scroll before the button appears
        let scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
        if ((rootElement.scrollTop / scrollTotal) > 0.15) {
            scrollToTopBtn.classList.add('show-scroll-up-btn');
        } else {
            scrollToTopBtn.classList.remove('show-scroll-up-btn');
        }
    }

    const scrollToTop = () => {
        rootElement.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }
    scrollToTopBtn.addEventListener('click', scrollToTop);
    document.addEventListener('scroll', handleScroll);
}

export const toggleSearchInput = () => {
    let searchBtnBox = document.querySelector(".search-btn-box");
    searchBtnBox.addEventListener("click", (event) => {
        document.querySelector(".search-input-box").classList.toggle("search-active");
    });
}

export const stickyNavBar = () => {
    let header = document.querySelector('#headerBanner');
    let headerHeight = getComputedStyle(header).height.split('px')[0];
    let navbar = document.querySelector('.navbar');
    let scrollValue = window.scrollY;

    let bodyHeight = numRound( getComputedStyle(document.querySelector('body')).height.split('px')[0] );
    let footerHeight = numRound( getComputedStyle(document.querySelector('footer')).height.split('px')[0] ) + 200;

    if (scrollValue > headerHeight) {
        navbar.classList.add('is-fixed');
    } else if (scrollValue < headerHeight) {
        navbar.classList.remove('is-fixed');
    }
    // when scrolled to near to the footer
    if (scrollValue > (bodyHeight - footerHeight)) {
        navbar.classList.remove('is-fixed');
    }
    // when scrolled to bottom of the page
    // if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
    //     if (navbar.classList.contains('is-fixed')) navbar.classList.remove('is-fixed');
    // }
}


// export const toggleAvatarMenu = () => {
//     let avatarMain = document.querySelector(".avatar-li");
//     avatarMain.addEventListener("click", (event) => event.currentTarget.classList.toggle("avatar-active"));
// }
