<?php

namespace Bigbang\Api\Model;

use Bigbang\Common\Utils;

class SendTransferResult
{

    private $status;
    private $transferId;

    public static function create($parsed)
    {
        $result = new self();
        $result->setTransferId(Utils::tryGetValue($parsed, 'transfer_id'));
        $result->setStatus(Utils::tryGetValue($parsed, 'status'));

        return $result;
    }

    public function getTransferId()
    {
        return $this->transferId;
    }

    public function setTransferId($transferId)
    {
        $this->transferId = $transferId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
