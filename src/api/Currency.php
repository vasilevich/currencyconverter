<?php


class Currency
{

    private $to;
    private $rate;

    public function __construct($to = "", $rate = 0)
    {
        $this->to = trim(strtoupper($to));
        $this->rate = $rate;
    }

    public function convert($fromAmount)
    {
        return $fromAmount * $this->rate;
    }

    public function reverseConvert($fromAmount)
    {
        return $fromAmount / $this->rate;
    }

    public function isTo($to)
    {
        return $this->to == $to;
    }
}
