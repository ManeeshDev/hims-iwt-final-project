import * as navigation from './navigation.js';
import * as common from './common.js';
import * as clientPolicy from './client-policy.js';

(function (doc) {
    'use strict';

    doc.addEventListener('DOMContentLoaded', () => {
        common.hidePreLoader(1000);
        navigation.toggleMobileViewClass();
        navigation.menuBarsToggler();
        navigation.toggleSearchInput();
        navigation.scrollToTop();
        common.closeNotificationCard();
        clientPolicy.setRandomImgToPolicyForm();
        clientPolicy.clientFormRequiredCheck();
    });

    window.addEventListener('resize', () => {
        navigation.toggleMobileViewClass();
    });

    window.addEventListener('scroll', () => {
        navigation.stickyNavBar();
    });

}(document));
