<?php

namespace Alexsample\Sample\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Alexsample\Sample\Api\Data\OrderDataInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();
        $table = $installer->getConnection()->newTable(
            $installer->getTable(OrderDataInterface::TABLE_NAME)
        )
            ->addColumn(
                OrderDataInterface::ID,
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Order Data Id'
            )
            ->addColumn(
                OrderDataInterface::ORDER_ID,
                Table::TYPE_INTEGER,
                10,
                ['nullable' => false, 'unsigned' => true],
                'Entity Id'
            )
            ->addColumn(
                OrderDataInterface::TOTAL_PREPARED,
                Table::TYPE_DECIMAL,
                '12,4',
                [],
                'Total prepared'
            )->addForeignKey(
                $installer->getFkName(
                    OrderDataInterface::TABLE_NAME,
                    OrderDataInterface::ORDER_ID,
                    'sales_order',
                    'entity_id'
                ),
                OrderDataInterface::ORDER_ID,
                $installer->getTable('sales_order'),
                'entity_id',
                Table::ACTION_CASCADE
            );

        $installer->getConnection()->createTable($table);
    }
}
