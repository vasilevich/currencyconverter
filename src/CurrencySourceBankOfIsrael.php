<?php

namespace vasilevich\currencyconverter;
require_once __DIR__ . "./CurrencySource.php";

class CurrencySourceBankOfIsrael extends CurrencySource
{
    public function __construct()
    {
        $this->currencyList = new CurrencyList("https://www.boi.org.il/currency.xml", "ILS");
        $this->loadAndParseCurrency();
    }

    protected function loadAndParseCurrency()
    {
        $url = $this->currencyList->getSource();
        $xml = simplexml_load_file($url);
        foreach ($xml as $element) {
            if (isset($element->NAME)) {
                $this->currencyList->add($element->CURRENCYCODE->__toString(), (float)$element->RATE->__toString());
            }
        }
    }

}
