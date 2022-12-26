<?php


use vasilevich\currencyconverter\CurrencySourceDenemarkNationalBank;

require_once __DIR__ . "/vendor/autoload.php";

require_once __DIR__ . "/src/CurrencySourceBankOfIsrael.php";
require_once __DIR__ . "/src/CurrencySourceBankOfEurope.php";
require_once __DIR__ . "/src/CurrencySourceDenemarkNationalBank.php";
require_once __DIR__ . "/src/CurrencySourceFromSerialization.php";

$converter = new CurrencySourceDenemarkNationalBank();
echo "DENMARK: 1 ILS TO USD: ";
var_dump($converter->getCurrencyList()->convert("ILS", "USD", 1));
echo "DENMARK: 1 USD TO ILS: ";
var_dump($converter->getCurrencyList()->convert("USD", "ILS", 1));

$converter = new \vasilevich\currencyconverter\CurrencySourceBankOfIsrael();
echo "ISRAEL: 1 ILS TO USD: ";
var_dump($converter->getCurrencyList()->convert("ILS", "USD", 1));
echo "ISRAEL: 1 USD TO ILS: ";
var_dump($converter->getCurrencyList()->convert("USD", "ILS", 1));


$converter = new \vasilevich\currencyconverter\CurrencySourceBankOfEurope();
echo "EUROPE: 1 ILS TO USD: ";
var_dump($converter->getCurrencyList()->convert("ILS", "USD", 1));
echo "EUROPE: 1 USD TO ILS: ";
var_dump($converter->getCurrencyList()->convert("USD", "ILS", 1));
