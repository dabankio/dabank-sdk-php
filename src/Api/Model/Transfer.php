<?php


namespace Bigbang\Api\Model;

use Bigbang\Common\Utils;

class Transfer
{
    /**
     * 平台上交易id
     * @var int
     */
    private $transferId;
    /**
     * 币种
     * @var string
     */
    private $symbol;
    /**
     * @var string
     */
    private $fromAddress;
    /**
     * @var string
     */
    private $toAddress;
    /**
     * 交易金额
     * @var string
     */
    private $coins;
    /**
     * 手续费
     * @var string
     */
    private $fee;
    /**
     * 链上交易id
     * @var string
     */
    private $txId;
    /**
     * 确认数
     * @var int
     */
    private $confirms;
    /**
     * 确认时间
     * @var int
     */
    private $confirmedAt;
    /**
     * 上链时间
     * @var int
     */
    private $transferredAt;
    /**
     * 交易状态
     * @var string
     */
    private $status;

    public static function create(array $parsed)
    {
        $result = new self();
        $result->setTransferId(Utils::tryGetValue($parsed, 'transfer_id'));
        $result->setSymbol(Utils::tryGetValue($parsed, 'symbol'));
        $result->setFromAddress(Utils::tryGetValue($parsed, 'from_address'));
        $result->setToAddress(Utils::tryGetValue($parsed, 'to_address'));
        $result->setCoins(Utils::tryGetValue($parsed, 'coins'));
        $result->setFee(Utils::tryGetValue($parsed, 'fee'));
        $result->setTxId(Utils::tryGetValue($parsed, 'tx_id'));
        $result->setTxId(Utils::tryGetValue($parsed, 'confirms'));
        $result->setConfirmedAt(Utils::tryGetValue($parsed, 'confirmed_at'));
        $result->setTransferredAt(Utils::tryGetValue($parsed, 'transfer_at'));

        //貌似不支持其他状态
        $status = $result->getConfirmedAt() > 0 ? 'TRANSFER_SUCCESSFUL' : 'TRANSFER_PENDING';
        $result->setStatus($status);

        return $result;
    }

    /**
     * @return int
     */
    public function getTransferId()
    {
        return $this->transferId;
    }

    /**
     * @param int $transferId
     */
    public function setTransferId($transferId)
    {
        $this->transferId = $transferId;
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
    public function getFromAddress()
    {
        return $this->fromAddress;
    }

    /**
     * @param string $fromAddress
     */
    public function setFromAddress($fromAddress)
    {
        $this->fromAddress = $fromAddress;
    }

    /**
     * @return string
     */
    public function getToAddress()
    {
        return $this->toAddress;
    }

    /**
     * @param string $toAddress
     */
    public function setToAddress($toAddress)
    {
        $this->toAddress = $toAddress;
    }

    /**
     * @return string
     */
    public function getCoins()
    {
        return $this->coins;
    }

    /**
     * @param string $coins
     */
    public function setCoins($coins)
    {
        $this->coins = $coins;
    }

    /**
     * @return string
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param string $fee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;
    }

    /**
     * @return string
     */
    public function getTxId()
    {
        return $this->txId;
    }

    /**
     * @param string $txId
     */
    public function setTxId($txId)
    {
        $this->txId = $txId;
    }

    /**
     * @return int
     */
    public function getConfirms()
    {
        return $this->confirms;
    }

    /**
     * @param int $confirms
     */
    public function setConfirms($confirms)
    {
        $this->confirms = $confirms;
    }

    /**
     * @return int
     */
    public function getConfirmedAt()
    {
        return $this->confirmedAt;
    }

    /**
     * @param int $confirmedAt
     */
    public function setConfirmedAt($confirmedAt)
    {
        $this->confirmedAt = $confirmedAt;
    }

    /**
     * @return int
     */
    public function getTransferredAt()
    {
        return $this->transferredAt;
    }

    /**
     * @param int $transferredAt
     */
    public function setTransferredAt($transferredAt)
    {
        $this->transferredAt = $transferredAt;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}