<?php


class TiendaMia_FirebasePushNotification_OrderNotificationController extends Mage_Core_Controller_Front_Action
{

    public function saveAction()
    {
        if (Mage::getModel('customer/session')->isLoggedIn()) {
            $orderNotification = Mage::getModel('tiendamia_firebasepushnotification/ordernotification');
            $token = $this->getRequest()->getParam('token');
            $orderNotification->setTokenId($token);
            $orderNotification->setUserId(Mage::getModel('customer/session')->getCustomer()->getId());
            $orderNotification->save();
            $response = [
                'status' => true
            ];
        } else {
            $response = [
                'status' => false
            ];
        }
        $this->getResponse()->clearHeaders()->setHeader('Content-Type', 'application-json', true);
        $this->getResponse()->setBody(json_encode($response));
    }
}