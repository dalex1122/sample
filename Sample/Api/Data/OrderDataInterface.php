<?php

namespace Alexsample\Sample\Api\Data;

interface OrderDataInterface
{
    const TABLE_NAME = 'alx_order_data';

    const ID = 'order_data_id';
    const ORDER_ID = 'order_id';
    const TOTAL_PREPARED = 'total_prepared';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return int
     */
    public function getOrderId();

    /**
     * @param int $value
     * @return $this
     */
    public function setOrderId($value);

    /**
     * @return float
     */
    public function getTotalPrepared();

    /**
     * @param float $value
     * @return $this
     */
    public function setTotalPrepared($value);
}