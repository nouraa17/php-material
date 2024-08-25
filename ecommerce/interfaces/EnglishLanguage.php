
<?php

require_once 'LanguageInterface.php';
require_once 'StatisticsInterface.php';

class EnglishLanguage implements LanguageInterface , StatisticsInterface {

public function lang_logic()

{
    echo 'my lang is english';
}

             
public function lang_style ()
{
    echo 'my style is english.css';
}

public function get()
{
    echo 100;
}
}