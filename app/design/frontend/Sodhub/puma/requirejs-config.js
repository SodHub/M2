/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    deps: [
        'js/custom'

    ]
    ,
    map: {
        "*": {
            "owl-carousel": "js/thirdparty/owl.carousel.min"
        }
    },
    shim: {
        'owl-carousel': {
            deps: ['jquery']
        }
    }
};
