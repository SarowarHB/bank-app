<?php

namespace App\Library;

class Html
{

    public static function AccountTypeBadge($type)
    {
        $class = [
            Enum::ACCOUNT_TYPE_INDIVIDUAL  => 'badge-success',
            Enum::ACCOUNT_TYPE_BUSINESS    => 'badge-warning',
        ];

        return '<div class="badge ' . $class[$type] . '">' . Enum::getAccountType($type) . '</div>';
    }

    public static function TransactionTypeBadge($type)
    {
        $class = [
            Enum::TRANSACTION_TYPE_DEPOSIT  => 'badge-success',
            Enum::TRANSACTION_TYPE_WITHDRAW    => 'badge-warning',
        ];

        return '<div class="badge ' . $class[$type] . '">' . Enum::getTransactionType($type) . '</div>';
    }
}
