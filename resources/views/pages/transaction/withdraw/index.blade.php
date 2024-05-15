@extends('layouts.master')

@section('title', __('Withdraws'))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Withdraws</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>User Name</th>
                              <th class="text-center">Withdraw Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($withdraws as $withdraw)
                            <tr>
                              <td>#{{ $withdraw->id }}</td>
                              <td>{{ $withdraw->user->name }}</td>
                              <td class="text-center">{{ $withdraw->amount }}</td>
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
