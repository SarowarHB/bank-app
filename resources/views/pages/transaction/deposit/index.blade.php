@extends('layouts.master')

@section('title', __('Deposits'))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Deposits</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>User Name</th>
                              <th class="text-center">Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($deposits as $deposit)
                            <tr>
                              <td>#{{ $deposit->id }}</td>
                              <td>{{ $deposit->user->name }}</td>
                              <td class="text-center">{{ $deposit->amount }}</td>
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
