<?php


require_once __DIR__ . "./vendor/autoload.php";

require_once __DIR__ . "./src/CurrencySourceBankOfIsrael.php";
require_once __DIR__ . "./src/CurrencySourceBankOfEurope.php";


$converter = new \vasilevich\currencyconverter\CurrencySourceBankOfEurope();

var_dump($converter->getCurrencyList()->convert("EUR", "USD", 1)); // -> 1 euro to israeli shekels through Europe bank
var_dump($converter->getCurrencyList()->convert("USD", "EUR", 1)); // -> 1 euro to israeli shekels through Europe bank
var_dump($converter->getCurrencyList()->convert("ILS", "EUR", 1)); // -> 1 euro to israeli shekels through Europe bank
var_dump($converter->getCurrencyList()->convert("EUR", "ILS", 1)); // -> 1 euro to israeli shekels through Europe bank
$converter = new \vasilevich\currencyconverter\CurrencySourceBankOfIsrael();
var_dump($converter->getCurrencyList()->convert("EUR", "USD", 1)); // -> 1 euro to israeli shekels through Europe bank
var_dump($converter->getCurrencyList()->convert("USD", "EUR", 1)); // -> 1 euro to israeli shekels through Europe bank
var_dump($converter->getCurrencyList()->convert("ILS", "EUR", 1)); // -> 1 euro to israeli shekels through Europe bank
var_dump($converter->getCurrencyList()->convert("EUR", "ILS", 1)); // -> 1 euro to israeli shekels through Europe bank
