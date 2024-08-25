<?php

require_once 'PaymentAbstract.php';

class VodafoneCash extends PaymentAbstract 
{
    public function payment()
    {
        $this -> get_info('Product 4,5,6');
        echo 'it is Vodafone cach';
    }
}