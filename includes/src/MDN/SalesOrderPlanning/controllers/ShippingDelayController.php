<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @copyright  Copyright (c) 2009 Maison du Logiciel (http://www.maisondulogiciel.com)
 * @author : Olivier ZIMMERMANN
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class MDN_SalesOrderPlanning_ShippingDelayController extends Mage_Adminhtml_Controller_Action
{
	//Liste des taux de tax
	public function ListAction()
	{
    	$this->loadLayout();

        $this->_setActiveMenu('erp');
        $this->getLayout()->getBlock('head')->setTitle($this->__('Shipping delays'));

        $this->renderLayout();
	}
	
	/**
	 * Update carriers
	 *
	 */
	public function UpdateCarriersAction()
	{
		mage::helper('SalesOrderPlanning/ShippingDelay')->updateCarriers();
		
	    //confirme
    	Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Carriers list updated'));
    	
    	//Redirige vers la fiche creee
    	$this->_redirect('SalesOrderPlanning/ShippingDelay/List');
	}
	
	/**
	 * Save changes
	 *
	 */
	public function SaveAction()
	{
		//save values
		$collection = mage::getModel('SalesOrderPlanning/ShippingDelay')->getCollection();
		foreach ($collection as $item)
		{
			$id = $item->getId();
			$item->setpsd_default($this->getRequest()->getPost('psd_default'.$id));
			$item->setpsd_exceptions($this->getRequest()->getPost('psd_exceptions'.$id));
			$item->save();
		}
		
	    //confirme
    	Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Data saved'));
    	
    	//Redirige vers la fiche creee
    	$this->_redirect('SalesOrderPlanning/ShippingDelay/List');
	}
}