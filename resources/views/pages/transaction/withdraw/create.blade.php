@extends('layouts.master')

@section('title', __('Make Withdraw'))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Make Withdraw</h4>

                    <form method="post" action="{{ route('transaction.withdraw.create') }}"
                    enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                <div class="p-sm-3">

                                    <div class="form-group row @error('user_id') error @enderror">
                                        <label class="col-sm-3 col-form-label">{{ __('User')
                                            }}</label>
                                        <div class="col-sm-9">
                                            <select name="user_id" id="user_id" class="form-control" required>
                                                <option value="" selected disabled>Select One</option>
                                                @foreach($users as $key => $user)
                                                <option value="{{ $user->id }}"
                                                {{ old('user_id')==$user->id ? "selected" : "" }}
                                                data-balance="{{$user->balance}}">
                                                    {{ $user->name }}
                                                </option>
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
                                            <input type="number" class="form-control" id="amount" name="amount" step="any"
                                                value="{{ old('amount') }}" required
                                                placeholder="{{ __('amount') }}">
                                                <p id="alert-balance" class="error-message"></p>
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

@push('scripts')
<script>
    $(document).ready(function () {

        $("#user_id").change(function () {
            var balance = $(this).find(":selected").data("balance");
            console.log(balance);
            $("#alert-balance").html('Available Balance is :' + balance);
            $("#amount").attr({"max" : balance});

        });
    });
</script>
@endpush
