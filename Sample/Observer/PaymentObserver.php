<?php

namespace Alexsample\Sample\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
use Alexsample\Sample\Api\Repository\OrderDataRepositoryInterface;
use Alexsample\Sample\Model\Config;

class PaymentObserver implements ObserverInterface
{
    /**
     * @var CollectionFactory
     */
    private $orderCollectionFactory;

    /**
     * @var OrderDataRepositoryInterface
     */
    private $orderDataRepository;

    /**
     * @var Config
     */
    private $config;

    public function __construct(
        CollectionFactory $orderCollectionFactory,
        OrderDataRepositoryInterface $orderDataRepository,
        Config $config
    ) {
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->orderDataRepository = $orderDataRepository;
        $this->config = $config;
    }

    /**
     * @param Observer $observer
     * @return bool
     */
    public function execute(Observer $observer)
    {

        if (!$this->config->isEnabled()) {
            return false;
        }

        if (($orderId = $observer->getEvent()->getInvoice()->getOrder()->getId())
            && ($totalPaid = $observer->getEvent()->getInvoice()->getOrder()->getTotalPaid())
        ) {
            $decimalFactor = $this->config->getDecimalFactor();
            $orderData = $this->orderDataRepository->create();
            $orderData->setOrderId($orderId)
                ->setTotalPrepared($totalPaid * $decimalFactor);
            $this->orderDataRepository->save($orderData);
            return true;
        }

        return false;
    }
}