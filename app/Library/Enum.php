<?php

namespace App\Library;

class Enum
{
    //Vite Resources Path
    public const LOGO_PATH = 'resources/images/logo.png';

    /* ============== ACCOUNT Type ===================*/
    public const ACCOUNT_TYPE_INDIVIDUAL = 'individual';
    public const ACCOUNT_TYPE_BUSINESS = 'business';

    public static function getAccountType(mixed $type = null)
    {
        $types = [
            self::ACCOUNT_TYPE_INDIVIDUAL => 'Individual',
            self::ACCOUNT_TYPE_BUSINESS   => 'Business',
        ];

        if (is_array($type) && !empty($type)) {
            foreach ($type as $value) {
                $result[$value] = $types[$value];
            }

            return $result;
        }

        return $type ? $types[$type] : $types;
    }
    /* ============== ACCOUNT Type End ===================*/

    /* ============== Transaction Type ===================*/
    public const TRANSACTION_TYPE_DEPOSIT = 'deposit';
    public const TRANSACTION_TYPE_WITHDRAW = 'withdraw';

    public static function getTransactionType(mixed $type = null)
    {
        $types = [
            self::TRANSACTION_TYPE_DEPOSIT  => 'Deposit',
            self::TRANSACTION_TYPE_WITHDRAW => 'Withdraw',
        ];

        if (is_array($type) && !empty($type)) {
            foreach ($type as $value) {
                $result[$value] = $types[$value];
            }

            return $result;
        }

        return $type ? $types[$type] : $types;
    }
    /* ============== Transaction Type End ===================*/
}
