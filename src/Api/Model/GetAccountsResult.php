<?php

namespace Bigbang\Api\Model;

class GetAccountsResult
{
    private $accounts;

    public static function create(array $parsed)
    {
        return array_map('Bigbang\Api\Model\AddressBalance::create', $parsed);
    }

    /**
     * @return mixed
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * @param mixed $accounts
     */
    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;
    }
}