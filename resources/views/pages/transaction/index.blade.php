@extends('layouts.master')

@section('title', __('Transactions'))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Transactions</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>User Name</th>
                              <th class="text-center">Type</th>
                              <th class="text-center">Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                              <td>#{{ $transaction->id }}</td>
                              <td>{{ $transaction->user->name }}</td>
                              <td class="text-center">{!! App\Library\Html::TransactionTypeBadge( $transaction->transaction_type) !!}</td>
                              <td class="text-center">{{ $transaction->amount }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@stop
