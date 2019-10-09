<?php
namespace Badusha\Test\Setup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallSchema implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        
        $tableName = $setup->getTable('btesting');
        
        $data = [
            [
                'id' => NULL,
                'name' => 'Mohideen'
            ],
            [
                'id' => NULL,
                'name' => 'Hussain'
            ]
        ];
        foreach($data as $item){
            $setup->getConnection()->insert($tableName, $item);
        }        
        $setup->endSetup();
    }
}