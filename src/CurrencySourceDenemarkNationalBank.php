<?php

namespace vasilevich\currencyconverter;
require_once __DIR__ . "/CurrencySource.php";

class CurrencySourceDenemarkNationalBank extends CurrencySource
{
    public function __construct()
    {
        $this->currencyList = new CurrencyList("http://www.nationalbanken.dk/_vti_bin/DN/DataService.svc/CurrencyRatesXML?lang=en", "DKK");
        $this->loadAndParseCurrency();
    }

    protected function loadAndParseCurrency()
    {
        $url = $this->currencyList->getSource();
        $xml = simplexml_load_file($url);
        foreach ($xml->dailyrates->currency as $element) {
            $this->currencyList->add($element->attributes()->code->__toString(), (float)$element->attributes()->rate->__toString());
        }
        $this->updateTimeStamp();
    }

}
