define([
    'uiComponent',
    'ko',
    'jquery',
    'Magento_Customer/js/customer-data'
], function (Component, ko, $, customerData) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Codilar_Faq/faq'
        },

        faqs: ko.observableArray([]),

        initialize: function () {
            this._super();
            var self = this;
            var customer = customerData.get('customer');

            $.ajax({
                url: '/faq/index/getfaq',
                type: 'POST',
                data: {customer_id: customer().id},
                dataType: 'json',
                success: function (response) {
                    self.faqs(response);
                }
            });
        }
    });
});
