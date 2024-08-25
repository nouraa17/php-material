<?php

require_once 'PaymentAbstract.php';

class EtisalatCash extends PaymentAbstract 
{
    public function payment()
    {
        $this -> get_info('Product 1,2,3');
        echo 'it is etisalat cach';
    }
}