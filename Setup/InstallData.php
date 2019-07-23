<?php

namespace Syedzaidi\CustomAttrProduct\Setup;


use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * InstallData constructor.
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->addAttribute(Product::ENTITY, 'office_sku', [
            'group' => 'General',
            'type' => 'varchar',
            'label' => 'Office Sku',
            'input' => 'text',
            'frontend' => 'Syedzaidi\CustomAttrProduct\Model\Attribute\Frontend\OfficeSku',
            'backend' => 'Syedzaidi\CustomAttrProduct\Model\Attribute\Backend\OfficeSku',
            'required' => false,
            'sort_order' => 30,
            'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'visible' => true,
            'is_html_allowed_on_front' => true,
            'visible_on_front' => true,
            'system' => false,
            'is_user_defined' => 1,
        ]);
    }
}