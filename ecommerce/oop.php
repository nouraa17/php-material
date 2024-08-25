<?php
require_once 'classes/Products.php';

// $product = new Products ( name: 'car', price: '15000$');
// echo $product->get_name();
// echo $product->get_price();
// echo '<br>';
// $product->delivery( item: 'car');

/////////////////////////////////////////////////////////////////////////

// static
// using static without craeting new object
Products::$name = 'mobile samsung';
Products::get_info('1200');
/////////////////////////////////////////////////////////////////////////

// polymorphism
require_once 'interfaces/ArabicLanguage.php';
require_once 'interfaces/EnglishLanguage.php';

echo '<br>';
$lang = 'English';
if ($lang == 'Arabic') {
    $obj = new ArabicLanguage();
} else if ($lang == 'English') {
    $obj = new EnglishLanguage();
}
$obj->lang_logic();

echo '<br>';

$product = new Products();
echo $product->discount->get_dis(1000);
echo '<br>';
echo $product->discount->discount_for_best_people();
echo '<br>';
/////////////////////////////////////////////////////////////////////////

//abstract
require_once 'abstract/EtisalatCash.php';
require_once 'abstract/VodafoneCash.php';
require_once 'abstract/PaypalCash.php';

$payment = 'Vodafone';

$obj = new ($payment.'Cash')();
// if($payment=='Vodafone'){
//     $obj= new VodafoneCash();
// }
// else if($payment=='Etisalat'){
//     $obj= new EtisalatCash();
// }

$obj -> payment();