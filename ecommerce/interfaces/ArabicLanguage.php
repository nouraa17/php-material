
<?php

require_once 'LanguageInterface.php';
require_once 'StatisticsInterface.php';

class ArabicLanguage implements LanguageInterface , StatisticsInterface {

public function lang_logic()

{
    echo 'my lang is arabic';
}

             
public function lang_style ()
{
    echo 'my style is arabic.css';
}

public function get()
{
    echo 200;
}
}