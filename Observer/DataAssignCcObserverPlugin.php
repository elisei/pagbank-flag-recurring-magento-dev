<?php
/**
 * PagBank Flag Recurring Module.
 *
 * Copyright © 2023 PagBank. All rights reserved.
 *
 * @author    Bruno Elisei <brunoelisei@o2ti.com>
 * @license   See LICENSE for license details.
 */

namespace PagBank\FlagRecurringMagento\Observer;

use Magento\Payment\Observer\AbstractDataAssignObserver;
use Magento\Framework\DataObject;
use Magento\Quote\Api\Data\PaymentInterface;
use Magento\Framework\Event\Observer;
use PagBank\PaymentMagento\Observer\DataAssignCcObserver;

/**
 * Class Extend Data Assign Cc Observer - Capture credit card payment information.
 */
class DataAssignCcObserverPlugin
{
    /**
     * Método aroundExecute do Plugin para estender a função Execute do DataAssignCcObserver.
     *
     * @param DataAssignCcObserver $subject
     * @param callable $proceed
     * @param Observer $observer
     * @return void
     */
    public function aroundExecute(DataAssignCcObserver $subject, callable $proceed, Observer $observer)
    {
        // Execute o método original
        $result = $proceed($observer);

        // Recupere o paymentInfo e o dataObject
        $dataObject = $this->readDataArgument($observer);
        
        $paymentInfo = $this->readPaymentModelArgument($observer);

        $additionalData = $dataObject->getData(PaymentInterface::KEY_ADDITIONAL_DATA);

        if (isset($additionalData['recurring_type'])) {
            $paymentInfo->setAdditionalInformation(
                'recurring_type',
                $additionalData['recurring_type']
            );
        }

        return $result;
    }

    /**
     * Retorna o objeto de dados do evento.
     *
     * @param Observer $observer
     * @return mixed
     */
    protected function readDataArgument(Observer $observer)
    {
        $event = $observer->getEvent();
        return $event->getDataByKey(AbstractDataAssignObserver::DATA_CODE);
    }

    /**
     * Retorna o modelo de pagamento do evento.
     *
     * @param Observer $observer
     * @return mixed
     */
    protected function readPaymentModelArgument(Observer $observer)
    {
        $event = $observer->getEvent();
        return $event->getDataByKey(AbstractDataAssignObserver::MODEL_CODE);
    }
}