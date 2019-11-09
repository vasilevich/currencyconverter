<?php


use vasilevich\currencyconverter\CurrencySourceDenemarkNationalBank;

require_once __DIR__ . "/vendor/autoload.php";

require_once __DIR__ . "/src/CurrencySourceBankOfIsrael.php";
require_once __DIR__ . "/src/CurrencySourceBankOfEurope.php";
require_once __DIR__ . "/src/CurrencySourceDenemarkNationalBank.php";
require_once __DIR__ . "/src/CurrencySourceFromSerialization.php";

$converter = new CurrencySourceDenemarkNationalBank();

var_dump($converter->getCurrencyList()->convert("USD", "ILS", 1));
var_dump($converter->getCurrencyList()->convert("USD", "ILS", 1));
