/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery',
   'owl-carousel',
    'mage/mage',
    'mage/ie-class-fixer',
    'domReady!puma'
], function ($) {
    'use strict';
console.log($("#owlslider"));
    $("#owlslider").owlCarousel({
        navigation : true, // Show next and prev buttons
        autoPlay: false, //Set AutoPlay to 3 seconds
        items : 5
    });
  console.log('hello from /app/design/frontend/Sodhub/puma/web/js/custom.js !');
});
