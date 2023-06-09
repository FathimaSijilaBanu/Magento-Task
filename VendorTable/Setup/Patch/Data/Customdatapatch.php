<?php

namespace Codilar\VendorTable\Setup\Patch\Data;
 
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
 
class Customdatapatch implements DataPatchInterface
{
    private $_moduleDataSetup;
     private $_eavSetupFactory;
 
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->_moduleDataSetup = $moduleDataSetup;
        $this->_eavSetupFactory = $eavSetupFactory;
    }
 
    public function apply()
    {
       /** @var EavSetup $eavSetup */
        $eavSetup = $this->_eavSetupFactory->create(['setup' => $this->_moduleDataSetup]);
 
        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'custom_datapatch', [
           'type' => 'text',
           'backend' => '',
           'frontend' => '',
           'label' => 'Model Number',
            'input' => 'text',
           'class' => 'custom_datapatch_class',
           'source' => \Magento\Catalog\Model\Product\Attribute\Source\Boolean::class,
           'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
           'visible' => true,
           'required' => true,
           'user_defined' => false,
           'default' => '',
           'searchable' => true,
           'filterable' => false,
           'comparable' => false,
           'visible_on_front' => true,
           'used_in_product_listing' => true,
           'unique' => false,
        ]);
    }
 
    public static function getDependencies()
    {
        return [];
    }
 
    public function getAliases()
    {
        return [];
    }
 
    public static function getVersion()
    {
        return '1.0.0';
    }
}
