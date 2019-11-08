<?php

namespace vasilevich\currencyconverter;
class Currency implements \Serializable
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

    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return json_encode([
            "to" => $this->to,
            "rate" => $this->rate
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
        $this->to = $serialized->to;
        $this->rate = $serialized->rate;
    }
}
