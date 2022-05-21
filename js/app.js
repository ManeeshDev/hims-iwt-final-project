import * as navigation from './navigation.js';
import * as common from './common.js';

(function (doc) {
    'use strict';

    doc.addEventListener('DOMContentLoaded', () => {
        common.hidePreLoader(1000);
        navigation.toggleMobileViewClass();
        navigation.menuBarsToggler();
        navigation.toggleSearchInput();
        navigation.scrollToTop();
        common.setRandomImgToPolicyForm();
        common.closeNotificationCard();
    });

    window.addEventListener('resize', () => {
        navigation.toggleMobileViewClass();
    });

    window.addEventListener('scroll', () => {
        navigation.stickyNavBar();
    });

}(document));
