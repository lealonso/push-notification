<?php

class Tiendamia_FirebasePushNotification_Model_OrderNotification extends Mage_Core_Model_Abstract
{


    /**
     * Tiendamia_FirebasePushNotification_Model_OrderNotification constructor.
     */
    public function __construct()
    {
        parent::_construct();
        $this->_init('tiendamia_firebasepushnotification/ordernotification');
    }
}