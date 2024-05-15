@extends('layouts.master')

@section('title', __('Users'))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Users</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th class="text-center">Email</th>
                              <th class="text-center">Account Type</th>
                              <th class="text-center">Balance</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($users as $user)
                            <tr>
                              <td>#{{ $user->id }}</td>
                              <td>{{ $user->name }}</td>
                              <td class="text-center">{{ $user->email }}</td>
                              <td class="text-center">{!! App\Library\Html::AccountTypeBadge( $user->account_type) !!}</td>
                              <td class="text-center">{{ $user->balance }}</td>
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
