currencyconverter
==============

Another simple self hosted currency converter based only on    
free government data sources but any other data source can be added as-well.    

Installation
------------
First, you will need to install [Composer](http://getcomposer.org/) following the instructions on their site.

Then, simply run the following command:

```sh
composer require vasilevich/currencyconverter
```
Usage Example
-------------

```php
<?php
require_once __DIR__ . "./vendor/autoload.php";
use CurrencyConverter\CurrencySourceBankOfEurope;
use CurrencyConverter\CurrencySourceBankOfIsrael;

$converter = new CurrencySourceBankOfEurope(); // use european bank
var_dump($converter->getCurrencyList()->convert("EUR", "USD", 1)); // -> 1 euro to usd through Europe bank
var_dump($converter->getCurrencyList()->convert("USD", "EUR", 1)); // -> 1 usd to euro through Europe bank
var_dump($converter->getCurrencyList()->convert("ILS", "EUR", 1)); // -> 1 ils to euro through Europe bank
var_dump($converter->getCurrencyList()->convert("EUR", "ILS", 1)); // -> 1 euro to ils through Europe bank
$converter = new CurrencySourceBankOfIsrael(); //use israeli bank
var_dump($converter->getCurrencyList()->convert("EUR", "USD", 1)); // -> 1 euro to usd through Israel Bank
var_dump($converter->getCurrencyList()->convert("USD", "EUR", 1)); // -> 1 usd to euro through Israel Bank
var_dump($converter->getCurrencyList()->convert("ILS", "EUR", 1)); // -> 1 ils to euro through Israel Bank
var_dump($converter->getCurrencyList()->convert("EUR", "ILS", 1)); // -> 1 euro to ils through Israel Bank

```
