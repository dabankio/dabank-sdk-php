<?php


namespace Bigbang\Api\Model;
use Bigbang\Common\Utils;

class ListTransferResult
{
    /**
     * 总记录数目
     * @var int
     */
    private $total;
    /**
     * 当前页数据集
     * @var array
     */
    private $transfers;

    public static function create(array $parsed)
    {
        $result = new self();
        $result->setTotal(Utils::tryGetValue($parsed, 'total', 0));
        $transfers = array_map('Bigbang\Api\Model\Transfer::create', Utils::tryGetValue($parsed, 'transfers', []));
        $result->setTransfers($transfers);

        return $result;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getTransfers()
    {
        return $this->transfers;
    }

    /**
     * @param mixed $transfe
     */
    public function setTransfers($transfers): void
    {
        $this->transfers = $transfers;
    }
}