<?php
require_once 'discount_fn_trait.php';
// composition 

class Discount
{
    use discount_fn_trait;
    public function get_dis($price)
    {
        if($price > 1000){
            return $price/10;
        }
        return 0;
    }
}