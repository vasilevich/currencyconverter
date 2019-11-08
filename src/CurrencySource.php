<?php

namespace vasilevich\currencyconverter;
require_once __DIR__ . "./CurrencyList.php";

class CurrencySource
{
    protected $currencyList;

    public function __construct($source, $base)
    {
        $this->currencyList = new CurrencyList($source, $base);
        $this->loadAndParseCurrency();
    }

    private function loadAndParseCurrency()
    {

    }

    /**
     * @return CurrencyList
     */
    public function getCurrencyList()
    {
        return $this->currencyList;
    }

}
