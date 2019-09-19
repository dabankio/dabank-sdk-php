<?php

namespace Bigbang\Api\Model;

use Bigbang\Common\Utils;

class AddressBalance
{

    private $symbol;
    private $address;
    private $balance;

    public static function create(array $parsed)
    {
        $result = new self();
        $result->setSymbol(Utils::tryGetValue($parsed, 'symbol'));
        $result->setAddress(Utils::tryGetValue($parsed, 'address'));
        $result->setBalance(Utils::tryGetValue($parsed, 'balance'));

        return $result;
    }

    /**
     * @return mixed
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param mixed $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }
}
