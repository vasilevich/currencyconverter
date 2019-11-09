<?php

namespace vasilevich\currencyconverter;
require_once __DIR__ . "/CurrencyList.php";

class CurrencySourceFromSerialization extends CurrencySource
{
    public function __construct($serialization)
    {
        $this->unserialize($serialization);
    }

}
