<?php


namespace Bigbang\Api\Model;
use Bigbang\Common\Utils;

class TransactionStats
{
    /**
     * 币种
     * @var string
     */
    private $symbol;
    /**
     * 手续费币种
     * @var string
     */
    private $feeSymbol;
    /**
     * 手续费
     * @var float
     */
    private $fee;
    /**
     * 充币成功数量
     * @var int
     */
    private $inSuccessfulCoin;
    /**
     * 充币成功笔数
     * @var int
     */
    private $inSuccessfulCount;
    /**
     * 充值确认中数量
     * @var float
     */
    private $inPendingCoin;
    /**
     * 充值确认中笔数
     * @var int
     */
    private $inPendingCount;
    /**
     * 提币成功数量
     * @var float
     */
    private $outSuccessfulCoin;
    /**
     * 提币成功笔数
     * @var int
     */
    private $outSuccessfulCount;
    /**
     * 提币失败数量
     * @var float
     */
    private $outFailedCoin;
    /**
     * 提币失败笔数
     * @var int
     */
    private $outFailedCount;
    /**
     * 提币确认中数量
     * @var float
     */
    private $outPendingCoin;
    /**
     * 提币确认中笔数
     * @var int
     */
    private $outPendingCount;

    public static function create($parsed) {
        $result = new self();
        $result->setSymbol(Utils::tryGetValue($parsed, 'symbol'));
        $result->setFeeSymbol(Utils::tryGetValue($parsed, 'fee_symbol'));
        $result->setFee(Utils::tryGetValue($parsed, 'fee', 0));
        $result->setInSuccessfulCoin(Utils::tryGetValue($parsed, 'in_successful_coin', 0));
        $result->setInSuccessfulCount(Utils::tryGetValue($parsed, 'in_successful_count', 0));
        $result->setInPendingCoin(Utils::tryGetValue($parsed, 'in_pending_coin', 0));
        $result->setInPendingCount(Utils::tryGetValue($parsed, 'in_pending_count', 0));
        $result->setOutSuccessfulCoin(Utils::tryGetValue($parsed, 'out_successful_coin', 0));
        $result->setOutSuccessfulCount(Utils::tryGetValue($parsed, 'out_successful_count', 0));
        $result->setOutFailedCoin(Utils::tryGetValue($parsed, 'out_failed_coin', 0));
        $result->setOutFailedCount(Utils::tryGetValue($parsed, 'out_failed_count', 0));
        $result->setOutPendingCoin(Utils::tryGetValue($parsed, 'out_pending_coin', 0));
        $result->setOutPendingCount(Utils::tryGetValue($parsed, 'out_pending_count', 0));

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
    public function getFeeSymbol()
    {
        return $this->feeSymbol;
    }

    /**
     * @param string $feeSymbol
     */
    public function setFeeSymbol($feeSymbol)
    {
        $this->feeSymbol = $feeSymbol;
    }

    /**
     * @return float
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param float $fee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;
    }

    /**
     * @return int
     */
    public function getInSuccessfulCoin()
    {
        return $this->inSuccessfulCoin;
    }

    /**
     * @param int $inSuccessfulCoin
     */
    public function setInSuccessfulCoin($inSuccessfulCoin)
    {
        $this->inSuccessfulCoin = $inSuccessfulCoin;
    }

    /**
     * @return int
     */
    public function getInSuccessfulCount()
    {
        return $this->inSuccessfulCount;
    }

    /**
     * @param int $inSuccessfulCount
     */
    public function setInSuccessfulCount($inSuccessfulCount)
    {
        $this->inSuccessfulCount = $inSuccessfulCount;
    }

    /**
     * @return float
     */
    public function getInPendingCoin()
    {
        return $this->inPendingCoin;
    }

    /**
     * @param float $inPendingCoin
     */
    public function setInPendingCoin($inPendingCoin)
    {
        $this->inPendingCoin = $inPendingCoin;
    }

    /**
     * @return int
     */
    public function getInPendingCount()
    {
        return $this->inPendingCount;
    }

    /**
     * @param int $inPendingCount
     */
    public function setInPendingCount($inPendingCount)
    {
        $this->inPendingCount = $inPendingCount;
    }

    /**
     * @return float
     */
    public function getOutSuccessfulCoin()
    {
        return $this->outSuccessfulCoin;
    }

    /**
     * @param float $outSuccessfulCoin
     */
    public function setOutSuccessfulCoin($outSuccessfulCoin)
    {
        $this->outSuccessfulCoin = $outSuccessfulCoin;
    }

    /**
     * @return int
     */
    public function getOutSuccessfulCount()
    {
        return $this->outSuccessfulCount;
    }

    /**
     * @param int $outSuccessfulCount
     */
    public function setOutSuccessfulCount($outSuccessfulCount)
    {
        $this->outSuccessfulCount = $outSuccessfulCount;
    }

    /**
     * @return float
     */
    public function getOutFailedCoin()
    {
        return $this->outFailedCoin;
    }

    /**
     * @param float $outFailedCoin
     */
    public function setOutFailedCoin($outFailedCoin)
    {
        $this->outFailedCoin = $outFailedCoin;
    }

    /**
     * @return int
     */
    public function getOutFailedCount()
    {
        return $this->outFailedCount;
    }

    /**
     * @param int $outFailedCount
     */
    public function setOutFailedCount($outFailedCount)
    {
        $this->outFailedCount = $outFailedCount;
    }

    /**
     * @return float
     */
    public function getOutPendingCoin()
    {
        return $this->outPendingCoin;
    }

    /**
     * @param float $outPendingCoin
     */
    public function setOutPendingCoin($outPendingCoin)
    {
        $this->outPendingCoin = $outPendingCoin;
    }

    /**
     * @return int
     */
    public function getOutPendingCount()
    {
        return $this->outPendingCount;
    }

    /**
     * @param int $outPendingCount
     */
    public function setOutPendingCount($outPendingCount)
    {
        $this->outPendingCount = $outPendingCount;
    }
}