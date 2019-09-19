<?php


namespace Bigbang\Api\Model;

use Bigbang\Common\Utils;

class Transfer
{
    private $transferId;
    private $symbol;
    private $fromAddress;
    private $toAddress;
    private $coins;
    private $fee;
    private $txId;
    private $confirms;
    private $confirmedAt;
    private $transferredAt;
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
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getConfirmedAt()
    {
        return $this->confirmedAt;
    }

    /**
     * @param mixed $confirmedAt
     */
    public function setConfirmedAt($confirmedAt): void
    {
        $this->confirmedAt = $confirmedAt;
    }

    /**
     * @return mixed
     */
    public function getTransferId()
    {
        return $this->transferId;
    }

    /**
     * @param mixed $transferId
     */
    public function setTransferId($transferId): void
    {
        $this->transferId = $transferId;
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
    public function setSymbol($symbol): void
    {
        $this->symbol = $symbol;
    }

    /**
     * @return mixed
     */
    public function getFromAddress()
    {
        return $this->fromAddress;
    }

    /**
     * @param mixed $fromAddress
     */
    public function setFromAddress($fromAddress): void
    {
        $this->fromAddress = $fromAddress;
    }

    /**
     * @return mixed
     */
    public function getToAddress()
    {
        return $this->toAddress;
    }

    /**
     * @param mixed $toAddress
     */
    public function setToAddress($toAddress): void
    {
        $this->toAddress = $toAddress;
    }

    /**
     * @return mixed
     */
    public function getCoins()
    {
        return $this->coins;
    }

    /**
     * @param mixed $coins
     */
    public function setCoins($coins): void
    {
        $this->coins = $coins;
    }

    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param mixed $fee
     */
    public function setFee($fee): void
    {
        $this->fee = $fee;
    }

    /**
     * @return mixed
     */
    public function getTxId()
    {
        return $this->txId;
    }

    /**
     * @param mixed $txId
     */
    public function setTxId($txId): void
    {
        $this->txId = $txId;
    }

    /**
     * @return mixed
     */
    public function getConfirms()
    {
        return $this->confirms;
    }

    /**
     * @param mixed $confirms
     */
    public function setConfirms($confirms): void
    {
        $this->confirms = $confirms;
    }

    /**
     * @return mixed
     */
    public function getTransferredAt()
    {
        return $this->transferredAt;
    }

    /**
     * @param mixed $transferredAt
     */
    public function setTransferredAt($transferredAt): void
    {
        $this->transferredAt = $transferredAt;
    }
}