<?php

namespace Alexsample\Sample\Repository;

use Alexsample\Sample\Api\Data\OrderDataInterface;
use Alexsample\Sample\Api\Data\OrderDataInterfaceFactory;
use Alexsample\Sample\Api\Repository\OrderDataRepositoryInterface;
use Alexsample\Sample\Model\ResourceModel\OrderData as OrderDataResource;
use Magento\Framework\Exception\CouldNotSaveException;

class OrderDataRepository implements OrderDataRepositoryInterface
{
    /**
     * @var OrderDataInterfaceFactory
     */
    private $factory;
    /**
     * @var OrderDataResource
     */
    private $orderDataResource;

    public function __construct(
        OrderDataInterfaceFactory $factory,
        OrderDataResource $orderDataResource
    ) {
        $this->factory = $factory;
        $this->orderDataResource = $orderDataResource;
    }

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        return $this->factory->create();
    }

    /**
     * {@inheritdoc}
     */
    public function save(OrderDataInterface $model)
    {
        try {
            $this->orderDataResource->save($model);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__('Unable to save order data #%1', $model->getId()));
        }

        return $model;
    }
}