<?php

namespace Bigbang\Api\Model;

use Bigbang\Common\Utils;

/**
 * 地址余额
 * Class AddressBalance
 * @package Bigbang\Api\Model
 */
class AddressBalance
{

    /**
     * 币种
     * @var string
     */
    private $symbol;
    /**
     * 地址
     * @var string
     */
    private $address;
    /**
     * 余额
     * @var float
     */
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
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }
}
