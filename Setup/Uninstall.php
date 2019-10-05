<?php
namespace Badusha\Test\Setup;

class Uninstall implements \Magento\Framework\Setup\UninstallInterface
{
    public function uninstall(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
        ) {
            if ($setup->tableExists('badusha_test_table')) {
                $setup->getConnection()->dropTable('badusha_test_table');
            }
    }
}