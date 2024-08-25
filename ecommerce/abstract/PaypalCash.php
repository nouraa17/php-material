<?php

require_once 'PaymentAbstract.php';

class PaypalCash extends PaymentAbstract 
{
    public function payment()
    {
        $this -> get_info('Product 7,8,9');
        echo 'it is Paypal cach';
    }
}