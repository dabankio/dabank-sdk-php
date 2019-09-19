<?php


namespace Bigbang\Api\Model;
use Bigbang\Common\Utils;

class AccountBalanceStats
{
    /**
     * 币种
     * @var string
     */
    private $symbol;
    /**
     * 可用余额
     * @var float
     */
    private $available;
    /**
     * 冻结金额
     * @var float
     */
    private $freeze;

    public static function create($parsed) {
        $result = new self();
        $result->setSymbol(Utils::tryGetValue($parsed, 'symbol'));
        $result->setAvailable(Utils::tryGetValue($parsed, 'available_balance'));
        $result->setFreeze(Utils::tryGetValue($parsed, 'freeze'));

        return $result;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    /**
     * @return float
     */
    public function getAvailable(): float
    {
        return $this->available;
    }

    /**
     * @param float $available
     */
    public function setAvailable(float $available): void
    {
        $this->available = $available;
    }

    /**
     * @return float
     */
    public function getFreeze(): float
    {
        return $this->freeze;
    }

    /**
     * @param float $freeze
     */
    public function setFreeze(float $freeze): void
    {
        $this->freeze = $freeze;
    }
}