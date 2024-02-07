@extends('layout.default')
@section("myblock")

<style>
    .reg1 {
        background: #007bff;
        background: linear-gradient(to right, #0062E6, #33AEFF);
    }

    .card-img-left {
        width: 45%;
        /* Link to your background image using in the property below! */
        background: scroll center url('https://source.unsplash.com/WEQbe2jBg40/414x512');
        background-size: cover;
    }

    .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
    }

    .btn-google {
        color: white !important;
        /* background-color: #ea4335; */

    }

    .btn-facebook {
        color: white !important;
        /* background-color: #3b5998; */

    }
</style>

<div class="reg1">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
                        <form method="post" action="{{url('/')}}/register">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="floatingInputUsername" placeholder="myname"  autofocus>
                                <label for="floatingInputUsername">Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com">
                                <label for="floatingInputEmail">Email address</label>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="mobile">
                                <label for="mobile">Mobile</label>
                            </div>

                            <div class=" mb-3">
                                Role:<select name="role" id="" class="form-control">
                                    <option value="0" hidden>-select-</option>
                                    <option value="student">Student</option>
                                    <option value="faculty">Faculty</option>

                                </select>
                                <!-- <label for="mobile"></label> -->
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>


                            <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit" name="register">Register</button>
                            </div>

                            <a class="d-block text-center mt-2 small" href="#">Have an account? Sign In</a>

                            <hr class="my-4">

                            <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-danger btn-google btn-login fw-bold text-uppercase" type="submit">
                                    <i class="fab fa-google me-2"></i> Sign up with Google
                                </button>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary btn-facebook btn-login fw-bold text-uppercase" type="submit">
                                    <i class="fab fa-facebook-f me-2"></i> Sign up with Facebook
                                </button>
                            </div>

                        </form>
                        <p>{{isset($message)?$message:''}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

<!--Display Validation message  -->

@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif