<?php
/**
 * aheadWorks Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://ecommerce.aheadworks.com/AW-LICENSE.txt
 *
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This software is designed to work with Magento community edition and
 * its use on an edition other than specified is prohibited. aheadWorks does not
 * provide extension support in case of incorrect edition use.
 * =================================================================
 *
 * @category   AW
 * @package    AW_Onsale
 * @version    2.5.3
 * @copyright  Copyright (c) 2010-2012 aheadWorks Co. (http://www.aheadworks.com)
 * @license    http://ecommerce.aheadworks.com/AW-LICENSE.txt
 */


class AW_Onsale_Model_System_Config_Source_Position
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => 'TL',
                'label' => Mage::helper('adminhtml')->__('Top-Left')
            ),
            array(
                'value' => 'TC',
                'label' => Mage::helper('adminhtml')->__('Top-Center')
            ),
            array(
                'value' => 'TR',
                'label' => Mage::helper('adminhtml')->__('Top-Right')
            ),
            array(
                'value' => 'ML',
                'label' => Mage::helper('adminhtml')->__('Middle-Left')
            ),
            array(
                'value' => 'MC',
                'label' => Mage::helper('adminhtml')->__('Middle-Center')
            ),
            array(
                'value' => 'MR',
                'label' => Mage::helper('adminhtml')->__('Middle-Right')
            ),
            array(
                'value' => 'BL',
                'label' => Mage::helper('adminhtml')->__('Bottom-Left')
            ),
            array(
                'value' => 'BC',
                'label' => Mage::helper('adminhtml')->__('Bottom-Center')
            ),
            array(
                'value' => 'BR',
                'label' => Mage::helper('adminhtml')->__('Bottom-Right')
            )
        );
    }
}