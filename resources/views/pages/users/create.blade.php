@extends('layouts.master')

@section('title', __('New User'))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">New User</h4>

                    <form method="post" action="{{ route('user.create') }}"
                    enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                <div class="p-sm-3">

                                    <div class="form-group row @error('name') error @enderror">
                                        <label class="col-sm-3 col-form-label">{{ __('Name')
                                            }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}"
                                                placeholder="{{ __('User Name') }}">
                                            @error('name')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row @error('email') error @enderror">
                                        <label class="col-sm-3 col-form-label">{{ __('Email Address')
                                            }}</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email') }}"
                                                placeholder="{{ __('Email Address') }}">
                                            @error('email')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row @error('password') error @enderror">
                                        <label class="col-sm-3 col-form-label">{{ __('Password')
                                            }}</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password"
                                                value="{{ old('password') }}"
                                                placeholder="{{ __('Password') }}">
                                            @error('password')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row @error('password_confirmation') error @enderror">
                                        <label class="col-sm-3 col-form-label">{{ __('Password Confirmation')
                                            }}</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password_confirmation"
                                                value="{{ old('password_confirmation') }}"
                                                placeholder="{{ __('Confirm password') }}">
                                            @error('password_confirmation')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row @error('account_type') error @enderror">
                                        <label class="col-sm-3 col-form-label">{{ __('Account Type')
                                            }}</label>
                                        <div class="col-sm-9">
                                            <select name="account_type" class="form-control">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach(\App\Library\Enum::getAccountType() as $key => $type)
                                                <option value="{{ $key }}" {{ old('account_type')==$key
                                                    ? "selected" : "" }}>
                                                    {{ $type }}</option>
                                                @endforeach
                                            </select>
                                            @error('account_type')
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
