<?php

namespace Alexsample\Sample\Api\Repository;

use Alexsample\Sample\Api\Data\OrderDataInterface;

interface OrderDataRepositoryInterface
{
    /**
     * @return OrderDataInterface
     */
    public function create();

        /**
     * @param OrderDataInterface $model
     * @return OrderDataInterface
     */
    public function save(OrderDataInterface $model);
}