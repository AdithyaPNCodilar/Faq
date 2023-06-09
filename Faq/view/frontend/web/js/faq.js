define([
    'uiComponent',
    'ko',
    'jquery'
], function (Component, ko, $) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Codilar_Faq/faq'
        },

        faqs: ko.observableArray([]),

        initialize: function () {
            this._super();
            var self = this;

            var productId = $('#codliar-knockout-faq').data('id');

            $.ajax({
                url: '/faq/index/getfaq',
                type: 'POST',
                dataType: 'json',
                data: {
                    product_id: productId
                },
                success: function (response) {
                    self.faqs(response);
                }
            });
        }
    });
});
