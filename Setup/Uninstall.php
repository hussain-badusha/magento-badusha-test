<?php
namespace Badusha\Test\Setup;
use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\App\Config\ConfigResource\ConfigInterface;

class Uninstall implements UninstallInterface
{
    protected $resourceConfig;
    public function __construct(ConfigInterface $resourceConfig){
        $this->resourceConfig = $resourceConfig;
    }
    /**
     * Module uninstall code
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function uninstall(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
        ) {
            $setup->startSetup();
            if ($setup->tableExists('btesting')) {
                $connection = $setup->getConnection();
                $connection->dropTable($setup->getTable("btesting"));
                $setup->endSetup();
            }
            
            $this->resourceConfig->deleteConfig(
                'test/general/enable',
                \Magento\Framework\App\Config\ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
                \Magento\Store\Model\Store::DEFAULT_STORE_ID
            );
    }
}