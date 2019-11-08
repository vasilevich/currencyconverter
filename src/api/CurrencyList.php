<?php

namespace vasilevich\currencyconverter;
require_once __DIR__ . "./Currency.php";

class CurrencyList
{
    private $source = "";
    private $currencies = [];
    private $base = "";

    /**
     * CurrencyList constructor.
     * @param $source
     * @param $base
     */
    public function __construct($source, $base)
    {
        $this->source = $source;
        $this->base = trim(strtoupper(($base)));
        //  $this->add($base, 1);
    }

    public function add($to, $rate)
    {
        $this->remove($to);
        array_push($this->currencies, new Currency($to, $rate));
    }

    public function remove($to)
    {
        $this->currencies = array_filter($this->currencies, function ($currency) use ($to) {
            return !$currency->isTo($to);
        });
    }

    public function convert($from, $to, $amount)
    {
        $from = trim(strtoupper($from));
        $to = trim(strtoupper($to));
        if ($from == $to)
            return $amount;
        else if ($from == $this->base) {
            return $this->getCurrency($to)->reverseConvert($amount);
        } else if ($to == $this->base) {
            return $this->getCurrency($from)->convert($amount);
        } else {
            return $this->convert($this->base, $to, $this->convert($from, $this->base, $amount));
        }
        return null;
    }

    /**
     * @param $code
     * @return Currency
     */
    public function getCurrency($code)
    {
        foreach ($this->currencies as $currency) {
            if ($currency->isTo($code))
                return $currency;
        }
        return null;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function getBase()
    {
        return $this->base;
    }
}
