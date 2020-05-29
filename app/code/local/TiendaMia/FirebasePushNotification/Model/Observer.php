<?php

class TiendaMia_FirebasePushNotification_Model_Observer
{

    public function sendNotification(Varien_Event_Observer $observer)
    {
        $order = $observer->getOrder();
        $state = $order->getState();
        $originState = $observer->getOrigData('state');
        if ($state != $originState) {
            $path = 'https://fcm.googleapis.com/fcm/send';
            $key = 'AAAAJY6FZLI:APA91bGlwXTxYlTRX01hQvzSf4BNoa0qYjinBxhL9kwYdBSYmyOmXPx1glP8XgkkgZp3LdhAwzblyhxjhBoNpDQ_GxMnmBx4lHw0xXVYk2ii9Mh9n9s_F2L4kZ-jZTpw-YAIS6GGC7Jg';
            $header = [
                'Content-Type: application/json',
                'Authorization: key=' . $key
            ];
            $tokens = Mage::getModel('tiendamia_firebasepushnotification/ordernotification')
                ->getCollection()->addFieldToFilter('user_id', $order->getCustomer()->getId());
            $curl = new Varien_Http_Adapter_Curl();
            $curl->setConfig(['timeout' => 10]);
            foreach ($tokens as $token){
                $params = [
                    'to' => $token->getTokenId(),
                    'notification' => [
                        'title' => 'Order Status',
                        'body' => 'Your order change to:' . strtoupper($state),
                        'click_action' => Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB)
                    ]
                ];
                $curl->write('POST', $path, '1.1', $header, json_encode($params));
                $curl->read();
            }
            $curl->close();
        }
    }
}