/**
 * PagBank Flag Recurring Module.
 *
 * Copyright © 2023 PagBank. All rights reserved.
 *
 * @author    Bruno Elisei <brunoelisei@o2ti.com>
 * @license   See LICENSE for license details.
 */

var config = {
    config: {
        mixins: {
            'PagBank_PaymentMagento/js/view/payment/method-renderer/cc': {
                'PagBank_FlagRecurringMagento/js/view/payment/method-renderer/recurring-data-mixin': true
            },
            'PagBank_PaymentMagento/js/view/payment/method-renderer/vault': {
                'PagBank_FlagRecurringMagento/js/view/payment/method-renderer/recurring-data-mixin': true
            }
        }
    }
};
