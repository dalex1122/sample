<?php

namespace Alexsample\Sample\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->storeId = $storeManager->getStore()->getStoreId();
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->scopeConfig->getValue(
            'alex_sample/general/enabled',
            ScopeInterface::SCOPE_STORE,
            $this->storeId
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getDecimalFactor()
    {
        $decimalFactor = $this->scopeConfig->getValue(
            'alex_sample/general/decimal_factor',
            ScopeInterface::SCOPE_STORE,
            $this->storeId
        );

        if ($decimalFactor === null || empty(trim($decimalFactor))) {
            $decimalFactor = 1;
        }

        return $decimalFactor;
    }
}
