<?php

/*
 * @copyright  Copyright (c) 2013 by  ESS-UA.
 */

class Ess_M2ePro_Model_Servicing_Task_Cron extends Ess_M2ePro_Model_Servicing_Task
{
    // ########################################

    public function getPublicNick()
    {
        return 'cron';
    }

    // ########################################

    public function isAllowed()
    {
        $helper = Mage::helper('M2ePro/Module_Cron');

        if (is_null($helper->getLastAccess())) {
            return true;
        }

        if ($helper->isTypeService() && $helper->isLastAccessMoreThan(900)) {
            return true;
        }

        if ($helper->isTypeMagento()) {

            $currentTimeStamp = Mage::helper('M2ePro')->getCurrentGmtDate(true);
            $lastTypeChange = $helper->getLastTypeChange();
            $lastRun = Mage::helper('M2ePro/Module')->getCacheConfig()
                           ->getGroupValue('/servicing/cron/', 'last_run');

            if ((is_null($lastTypeChange) || $currentTimeStamp > strtotime($lastTypeChange) + 86400)  &&
                (is_null($lastRun) || $currentTimeStamp > strtotime($lastRun) + 86400)) {

                Mage::helper('M2ePro/Module')->getCacheConfig()
                    ->setGroupValue('/servicing/cron/', 'last_run', Mage::helper('M2ePro')->getCurrentGmtDate());
                return true;
            }
        }

        return false;
    }

    // -----------------------------------------

    public function getRequestData()
    {
        return array(
            'base_url' => Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_LINK)
        );
    }

    public function processResponseData(array $data)
    {
        if (!isset($data['auth_key'])) {
            return;
        }

        Mage::helper('M2ePro/Module')->getConfig()
                                     ->setGroupValue('/cron/service/', 'auth_key', $data['auth_key']);
    }

    // ########################################
}