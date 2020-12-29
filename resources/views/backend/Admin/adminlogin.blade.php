@include('frontend.partials.header')


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
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.html"><h2>Login Search Tender</h2></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form method="post" action="{{url('/admindashboard')}}" >
                    {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control form-control-lg" id="email" name="email" type="text" placeholder="email" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                    </form>
                </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('adminregister') }}" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('adminforgotpassword') }}" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>


@include('frontend.partials.footer')
