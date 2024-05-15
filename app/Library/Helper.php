<?php

namespace App\Library;

use App\Models\User;
use App\Models\Transaction;

class Helper
{
    static function calculateRate($amount, User $user)
    {
        if($amount > 0){
            if($user->account_type == Enum::ACCOUNT_TYPE_INDIVIDUAL || $user->userTotalWithdrawAmount()>50000){
                //if user type is individual or total withdraw amount is getter then 50000
                return $amount*(0.015/(float)100);
            }else{
                 //if user type is Business and total withdraw amount is less then 50000
                return $amount*(0.025/(float)100);
            }
        }else{
            return 0.0;
        }
    }

    public static function chargeCalculate($amount, $user_id)
    {
        $amount = $amount-1000; //amount -1000 bcz every transaction has 1k free
        $user = User::find($user_id);

        if(date('D') == 'Fri'){
            return 0.0;
        }

        if($amount < 1){
            return 0.0;
        }else{
            $with_amount = Transaction::where('transaction_type',  Enum::TRANSACTION_TYPE_WITHDRAW)
                            ->where('user_id', $user_id)
                            ->whereBetween('date',[now()->startOfMonth(),now()])->sum('amount');
            if($with_amount>=5000){
                return self::calculateRate($amount, $user);
            }else{
                $remain_free_withdraw_amount = 5000-$with_amount;
                return self::calculateRate($amount-$remain_free_withdraw_amount, $user);
            }
        }
    }
}
