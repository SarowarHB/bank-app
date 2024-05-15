<?php

namespace App\Library\Services;

use App\Library\Enum;
use Exception;
use App\Models\User;
use App\Library\Helper;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionService extends BaseService
{
    public function makeDeposit(array $data): bool
    {
        DB::beginTransaction();

        try {
            $data['transaction_type'] = Enum::TRANSACTION_TYPE_DEPOSIT;
            $data['date'] = now();
            Transaction::create($data);

            $user = User::find($data['user_id']);
            $user->balance = $user->balance + (float)$data['amount'];
            $user->save();

            DB::commit();

            return $this->handleSuccess('Make Deposit Successfully');
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }

    public function makeWithdraw(array $data): bool
    {
        DB::beginTransaction();

        try {
            $charge = Helper::chargeCalculate($data['amount'], (int)$data['user_id']);
            $data['transaction_type'] = Enum::TRANSACTION_TYPE_WITHDRAW;
            $data['date'] = now();
            Transaction::create($data);

            $user = User::find($data['user_id']);
            $user->balance = $user->balance - ((float)$data['amount'] + $charge);
            $user->save();

            DB::commit();

            return $this->handleSuccess('Make Withdraw Successfully');
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
