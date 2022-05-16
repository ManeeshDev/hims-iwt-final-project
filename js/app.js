import * as navigation from './navigation.js';
import * as common from './common.js';

(function (doc) {
    'use strict';

    // TODO this will handle by user authentication
    let isLoggedUser = true;

    doc.addEventListener('DOMContentLoaded', () => {
        common.hidePreLoader(1000);
        navigation.toggleMobileViewClass();
        navigation.menuBarsToggler();
        navigation.toggleSearchInput();
        navigation.scrollToTop();

        !isLoggedUser ? doc.querySelector('.avatar-li').remove() : doc.querySelector('#regAndLogin').remove();
    });

    window.addEventListener('resize', () => {
        navigation.toggleMobileViewClass();
    });

    window.addEventListener('scroll', () => {
        navigation.stickyNavBar();
    });

}(document));




