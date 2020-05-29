<?php

class Tiendamia_FirebasePushNotification_Model_Resource_OrderNotification extends Mage_Core_Model_Resource_Db_Abstract
{


    /**
     * Tiendamia_FirebasePushNotification_Model_Resource_OrderNotification constructor.
     */
    public function _construct()
    {
        $this->_init('tiendamia_firebasepushnotification/ordernotification', 'id');
    }
}