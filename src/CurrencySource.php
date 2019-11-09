<?php

namespace vasilevich\currencyconverter;

use DateTime;

require_once __DIR__ . "/CurrencyList.php";

class CurrencySource implements \Serializable
{
    protected $currencyList;
    protected $timeStamp;

    public function __construct($source, $base)
    {
        $this->currencyList = new CurrencyList($source, $base);
        $this->loadAndParseCurrency();
    }

    protected function loadAndParseCurrency()
    {
        $this->updateTimeStamp();
    }

    protected function updateTimeStamp()
    {
        $dateTime = new DateTime();
        $this->timeStamp = $dateTime->getTimestamp();
    }

    /**
     * @return CurrencyList
     */
    public function getCurrencyList()
    {
        return $this->currencyList;
    }


    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return json_encode([
            "timeStamp" => $this->timeStamp,
            "currencyList" => $this->currencyList->serialize()
        ]);
    }

    /**
     * Constructs the object
     * @link https://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        $serialized = json_decode($serialized);
        $this->timeStamp = $serialized->timeStamp;
        $this->currencyList = new CurrencyList(null, null);
        $this->currencyList->unserialize($serialized->currencyList);
    }

}
