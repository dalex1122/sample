<?php

namespace Alexsample\Sample\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Alexsample\Sample\Api\Data\OrderDataInterface;

class OrderData extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(OrderDataInterface::TABLE_NAME, OrderDataInterface::ID);
    }
}
