<?php

namespace Bigbang\Api\Model;

class SumTransferOptions
{
    private $startAt;
    private $endAt;

    public function getStartAt()
    {
        return $this->startAt;
    }

    public function getEndAt()
    {
        return $this->endAt;
    }
}
