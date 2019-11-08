<?php

require_once __DIR__ . "./vendor/autoload.php";

require_once __DIR__ . "./src/api/CurrencySourceBankOfIsrael.php";
require_once __DIR__ . "./src/api/CurrencySourceBankOfEurope.php";


$converter = new CurrencySourceBankOfEurope();

var_dump($converter->getCurrencyList()->convert("EUR", "ILS", 1));
