<?php

namespace Bigbang\Api\Model;

/**
 * 查询交易历史时附加的查询条件
 * Class ListTransferOptions
 * @package Bigbang\Api\Model
 */
class ListTransferOptions
{
    /**
     * 起始时间戳(秒)
     * @var int
     */
    private $startAt;
    /**
     * 截止时间戳(秒)
     * @var int
     */
    private $endAt;
    /**
     * 地址
     * @var string
     */
    private $address;
    private $status;
    /**
     * 交易类型 IN: 转入; OUT: 转出
     * @var string
     */
    private $transferType;

    /**
     * @return int
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * @param int $startAt
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;
    }

    /**
     * @return int
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * @param int $endAt
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;
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
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getTransferType()
    {
        return $this->transferType;
    }

    /**
     * @param string $transferType
     */
    public function setTransferType($transferType)
    {
        $this->transferType = $transferType;
    }
}
