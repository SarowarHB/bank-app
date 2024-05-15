@extends('layouts.master')

@section('title', __('New User'))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Make Deposite</h4>

                    <form method="post" action="{{ route('transaction.deposit.create') }}"
                    enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                <div class="p-sm-3">

                                    <div class="form-group row @error('user_id') error @enderror">
                                        <label class="col-sm-3 col-form-label">{{ __('User')
                                            }}</label>
                                        <div class="col-sm-9">
                                            <select name="user_id" class="form-control" required>
                                                <option value="" selected disabled>Select One</option>
                                                @foreach($users as $key => $user)
                                                <option value="{{ $user->id }}" {{ old('user_id')==$user->id
                                                    ? "selected" : "" }}>
                                                    {{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row @error('amount') error @enderror">
                                        <label class="col-sm-3 col-form-label">{{ __('amount')
                                            }}</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="amount" step="any"
                                                value="{{ old('amount') }}"
                                                placeholder="{{ __('amount') }}" required>
                                            @error('amount')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@stop
