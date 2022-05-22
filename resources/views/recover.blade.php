<x-layout>
    <div class="account-pages">
        <div class="accountbg" style="background: url('images/bg.jpg');background-size: cover;background-position: center;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card shadow-none">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box shadow-none p-4">
                            <div class="p-2">
                                <div class="text-center mt-4">
                                    <a href="index-2.html"><img src="{{asset('images/logo-dark.png')}}" height="22" alt="logo"></a>
                                </div>

                                <h4 class="font-size-18 mt-5 text-center">Reset Password</h4>

                              <form class="mt-4" action="#">
                                @csrf
                                <div class="alert alert-success mt-4" role="alert">
                                    Enter your Email and instructions will be sent to you!
                                </div>

                                <div class="form-group">
                                    <label for="useremail">Email</label>
                                    <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                </div>

                                <div class="form-group row ">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                    </div>
                                </div>

                                <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-3">
                                        <a href="{{url('/recover')}}"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                </div>

                            </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>Remember It ? <a href="{{url('/login')}}" class="font-weight-medium text-primary"> Sign In here </a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> all rights reserved.</p>
                            </div>

                        </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-layout>