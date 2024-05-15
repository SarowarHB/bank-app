<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    @include('assets.css')
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                  <div class="brand-logo">
                    <img src="../../images/logo.svg" alt="logo">
                  </div>
                  <h4>New here?</h4>
                  <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

                  <form class="pt-3" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                      <input type="text" name="name" :value="old('name')" required class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <input  type="email" name="email" :value="old('email')" required class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <select name="account_type" class="form-control form-control-lg" id="exampleFormControlSelect2">
                            <option value="" selected disabled>Select One</option>
                            @foreach(\App\Library\Enum::getAccountType() as $key => $type)
                            <option value="{{ $key }}" {{ old('account_type')==$key
                                ? "selected" : "" }}>
                                {{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <input type="password" name="password" required class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password_confirmation" required class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Comfirm Password">
                      </div>

                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                    </div>
                    <div class="text-center mt-4 font-weight-light">
                      Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>

   @include('assets.js')
</body>

</html>


