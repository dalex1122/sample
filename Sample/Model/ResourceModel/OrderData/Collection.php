<?php

namespace Alexsample\Sample\Model\ResourceModel\OrderData;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Alexsample\Sample\Api\Data\OrderDataInterface;

class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Alexsample\Sample\Model\OrderData::class,
            \Alexsample\Sample\Model\ResourceModel\OrderData::class
        );

        $this->_idFieldName = OrderDataInterface::ID;
    }
}
