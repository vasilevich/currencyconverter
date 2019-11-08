<?php


use CurrencyConverter\CurrencySourceBankOfEurope;
use CurrencyConverter\CurrencySourceBankOfIsrael;

require_once __DIR__ . "./vendor/autoload.php";

require_once __DIR__ . "./src/api/CurrencySourceBankOfIsrael.php";
require_once __DIR__ . "./src/api/CurrencySourceBankOfEurope.php";


$converter = new CurrencySourceBankOfEurope();

var_dump($converter->getCurrencyList()->convert("EUR", "USD", 1)); // -> 1 euro to israeli shekels through Europe bank
var_dump($converter->getCurrencyList()->convert("USD", "EUR", 1)); // -> 1 euro to israeli shekels through Europe bank
var_dump($converter->getCurrencyList()->convert("ILS", "EUR", 1)); // -> 1 euro to israeli shekels through Europe bank
var_dump($converter->getCurrencyList()->convert("EUR", "ILS", 1)); // -> 1 euro to israeli shekels through Europe bank
$converter = new CurrencySourceBankOfIsrael();
var_dump($converter->getCurrencyList()->convert("EUR", "USD", 1)); // -> 1 euro to israeli shekels through Europe bank
var_dump($converter->getCurrencyList()->convert("USD", "EUR", 1)); // -> 1 euro to israeli shekels through Europe bank
var_dump($converter->getCurrencyList()->convert("ILS", "EUR", 1)); // -> 1 euro to israeli shekels through Europe bank
var_dump($converter->getCurrencyList()->convert("EUR", "ILS", 1)); // -> 1 euro to israeli shekels through Europe bank
