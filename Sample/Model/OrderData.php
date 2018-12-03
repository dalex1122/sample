<?php

namespace Alexsample\Sample\Model;

use Magento\Framework\Model\AbstractModel;
use Alexsample\Sample\Api\Data\OrderDataInterface;

class OrderData extends AbstractModel implements OrderDataInterface
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Alexsample\Sample\Model\ResourceModel\OrderData::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->getData(self::ORDER_ID);
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setOrderId($value)
    {
        return $this->setData(self::ORDER_ID, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalPrepared()
    {
        return $this->getData(self::TOTAL_PREPARED);
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalPrepared($value)
    {
        return $this->setData(self::TOTAL_PREPARED, $value);
    }
}