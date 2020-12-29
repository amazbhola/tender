
@include('frontend.partials.header')

<!-- ========================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->
 <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" action="{{ route('adminstore') }}" method="post">
      @csrf
        <div class="card">
            <div class="card-header">
              @if (session()->has('status'))
              <div class="alert alert-success">
                  {{ session()->get('status') }}
              </div>
              @endif
              @include('backend.partials.massege')
                <h3 class="mb-1">Registrations Form</h3>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="name" required="" placeholder="Username or Mobile no" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" id="password" type="password" required="" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg"  type="password"required="" id="confirm_password" placeholder="Confirm">
                    <span>
                        <p id="msg"></p>
                    </span>
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary"   id="button1" type="submit">Register My Account</button>
                </div>
                {{-- <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                    </label>
                </div>
                <div class="form-group row pt-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                        <button class="btn btn-block btn-social btn-facebook " type="button">Facebook</button>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn  btn-block btn-social btn-twitter" type="button">Twitter</button>
                    </div>
                </div>
            </div> --}}
            <div class="card-footer bg-white">
                <p>Already member? <a href="{{ route('adminlogin') }}" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
@include('frontend.partials.footer')
