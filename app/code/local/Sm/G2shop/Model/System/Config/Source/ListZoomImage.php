<?php
/*------------------------------------------------------------------------
 # SM Zen - Version 1.0
 # Copyright (c) 2014 The YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_G2shop_Model_System_Config_Source_ListZoomImage
{
	public function toOptionArray()
	{	
		return array(
			array('value'=>'1', 'label'=>Mage::helper('g2shop')->__('In')),
			array('value'=>'2', 'label'=>Mage::helper('g2shop')->__('Out'))
		);
	}
}
