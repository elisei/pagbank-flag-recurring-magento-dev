<?php
/**
 * PagBank Flag Recurring Module.
 *
 * Copyright © 2023 PagBank. All rights reserved.
 *
 * @author    Bruno Elisei <brunoelisei@o2ti.com>
 * @license   See LICENSE for license details.
 */

namespace PagBank\FlagRecurringMagento\Model\Adminhtml\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class Type Recurring - Defines the types of recurring flag.
 */
class TypeRecurring implements ArrayInterface
{
    /**
     * Returns Options.
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            null            => __('Not Recurring'),
            'INITIAL'       => __('Inittial'),
            'SUBSEQUENT'    => __('Subsequent'),
        ];
    }
}
