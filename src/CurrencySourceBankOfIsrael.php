<?php

namespace vasilevich\currencyconverter;
require_once __DIR__ . "/CurrencySource.php";


class CurrencySourceBankOfIsrael extends CurrencySource
{
    public function __construct()
    {
        $this->currencyList = new CurrencyList("https://edge.boi.gov.il/FusionEdgeServer/sdmx/v2/data/dataflow/BOI.STATISTICS/EXR/1.0/?lastNObservations=1", "ILS");
        $this->loadAndParseCurrency();
    }

    protected function loadAndParseCurrency()
    {
        $url = $this->currencyList->getSource();
        $content = file_get_contents($url);
        preg_match_all('/<Series.*?<\/Series>/s', $content, $matches);
        $result = '<root>' . implode('', $matches[0]) . '</root>';
        $xml = simplexml_load_string($result);
        foreach ($xml as $element) {
            $UNIT_MEASURE = (string)$element['UNIT_MEASURE'];
            $dataSource = (string)$element['DATA_SOURCE'];
            if ($UNIT_MEASURE = 'ILS' && $dataSource === 'BOI_MRKT') {
                $currencyCode = (string)$element['BASE_CURRENCY'];
                $rate = (float)((string)$element->Obs['OBS_VALUE']);
                $this->currencyList->add($currencyCode, $rate);
            }
        }
        $this->updateTimeStamp();
    }

}
