define([
    'jquery',
    'jquery/ui',
    'jquery/validate',
    'mage/translate'
], function ($) {
    "use strict";

    return function () {
        $.validator.addMethod(
            'validate-decimal-factor',
            function (v) {
                return Validation.get('IsEmpty').test(v)
                    || (!isNaN(parseNumber(v)) && /^0+\.[0-9]{1,}$/.test(v));
            },
            $.mage.__('Try to use something similar to following: ' + '<br/>' +
                '0.1' + '<br/>' +
                '0.92' + '<br/>' +
                '0.823' + '<br/>' +
                '0.2456' + '<br/>' +
                ' etc.')
        );
    }
});