<?php


namespace Bigbang\Api\Model;
use Bigbang\Common\Utils;

class StatsResult
{
    private $transactions;
    private $balances;

    public static function create(array $parsed) {
        $result = new self();

        $rawTxs = Utils::tryGetValue($parsed, 'statistics', []);
        $result->setTransactions(array_map('Bigbang\Api\Model\TransactionStats::create', $rawTxs));

        $rawBalances = Utils::tryGetValue($parsed, 'realtime_balance', []);
        $result->setBalances(array_map('Bigbang\Api\Model\AccountBalanceStats::create', $rawBalances));

        return $result;
    }

    /**
     * @return mixed
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param mixed $transactions
     */
    public function setTransactions($transactions): void
    {
        $this->transactions = $transactions;
    }

    /**
     * @return mixed
     */
    public function getBalances()
    {
        return $this->balances;
    }

    /**
     * @param mixed $balances
     */
    public function setBalances($balances): void
    {
        $this->balances = $balances;
    }
}