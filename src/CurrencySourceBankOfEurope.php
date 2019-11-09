<?php

namespace vasilevich\currencyconverter;
require_once __DIR__ . "/CurrencySource.php";

class CurrencySourceBankOfEurope extends CurrencySource
{
    public function __construct()
    {
        $this->currencyList = new CurrencyList("https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml", "EUR");
        $this->loadAndParseCurrency();
    }

    protected function loadAndParseCurrency()
    {
        $url = $this->currencyList->getSource();
        $xml = simplexml_load_file($url);
        foreach ($xml->Cube->Cube->Cube as $element) {
            $this->currencyList->add($element->attributes()->currency->__toString(), 1 / (float)$element->attributes()->rate->__toString());
        }
        $this->updateTimeStamp();
    }

}
