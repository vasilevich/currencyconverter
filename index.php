<?php


require_once __DIR__ . "./vendor/autoload.php";

require_once __DIR__ . "./src/CurrencySourceBankOfIsrael.php";
require_once __DIR__ . "./src/CurrencySourceBankOfEurope.php";
require_once __DIR__ . "./src/CurrencySourceFromSerialization.php";

$converter = new \vasilevich\currencyconverter\CurrencySourceBankOfEurope();


$serializedConverter = $converter->serialize(); // converts the object ready for caching by your own logic
$unserializedConverter = new \vasilevich\currencyconverter\CurrencySourceFromSerialization($serializedConverter); //deserialize the converter back into use
var_dump($unserializedConverter->getCurrencyList()->convert("ILS", "USD", "4"));  //test converter
