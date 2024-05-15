@extends('layouts.master')

@section('title', __('Bank App'))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Total User</p>
                                <p class="fs-30 mb-2">{{\App\Models\User::count()}}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Transaction</p>
                                <p class="fs-30 mb-2">{{\App\Models\Transaction::count()}}</p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
