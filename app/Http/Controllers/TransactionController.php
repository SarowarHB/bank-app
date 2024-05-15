<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Library\Enum;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Library\Services\TransactionService;
use App\Http\Requests\Transaction\DepositCreateRequest;
use App\Http\Requests\Transaction\WithdrawCreateRequest;

class TransactionController extends Controller
{
    private $transaction_service;

    public function __construct(TransactionService $transaction_service)
    {
        $this->transaction_service = $transaction_service;
    }

    public function index()
    {
        return view('pages.transaction.index', [
            'transactions' => Transaction::all(),
        ]);
    }

    public function deposit()
    {
        return view('pages.transaction.deposit.index', [
            'deposits' => Transaction::where('transaction_type', Enum::TRANSACTION_TYPE_DEPOSIT)->get(),
        ]);
    }

    public function showDepositCreateForm()
    {
        return view('pages.transaction.deposit.create',[
            'users' => User::all(),
        ]);
    }

    public function depositCreate(DepositCreateRequest $request)
    {
        $result = $this->transaction_service->makeDeposit($request->validated());

        if ($result) {
            return redirect()->route('transaction.deposit.index')->with('success', $this->transaction_service->message);
        }

        return back()->withInput($request->all())->with('error', $this->transaction_service->message);
    }

    public function withdraw()
    {
        return view('pages.transaction.withdraw.index', [
            'withdraws' => Transaction::where('transaction_type', Enum::TRANSACTION_TYPE_WITHDRAW)->get(),
        ]);
    }

    public function showWithdrawCreateForm()
    {
        return view('pages.transaction.withdraw.create',[
            'users' => User::all(),
        ]);
    }

    public function withdrawCreate(WithdrawCreateRequest $request)
    {
        // dd($request->all());
        $result = $this->transaction_service->makeWithdraw($request->validated());

        if ($result) {
            return redirect()->route('transaction.withdraw.index')->with('success', $this->transaction_service->message);
        }

        return back()->withInput($request->all())->with('error', $this->transaction_service->message);
    }

}
