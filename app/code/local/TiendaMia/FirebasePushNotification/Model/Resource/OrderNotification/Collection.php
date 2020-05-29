<?php

class Tiendamia_FirebasePushNotification_Model_Resource_OrderNotification_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{


    /**
     * Tiendamia_FirebasePushNotification_Model_Resource_OrderNotification_Collection constructor.
     */
    public function __construct()
    {
        parent::_construct();
        $this->_init('tiendamia_firebasepushnotification/ordernotification');
    }
}