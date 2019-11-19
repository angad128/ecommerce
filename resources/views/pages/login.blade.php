@extends('layout')

@section('title')
Customer Login
@endsection

@section('content')
    <section id="cart_items">
        <div class="container col-sm-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Costumer Login</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="login-form form-group"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{url('/customer/login')}}" method="post">
                        @csrf
                        <input type="email" name="customer_email" placeholder="Email" required="" />
                        <input type="password" name="password" required="" />
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-5">
                    <div class="signup-form  form-group"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{url('/customer/registration')}}" method="post">
                        @csrf
                        <input type="text" name="customer_name" placeholder="Name" required="" />
                        <input type="email" name="customer_email" placeholder="Email Address" required="" />
                        <input type="password" name="password" placeholder="Password" required="" />
                        <input type="number" name="mobile_number" placeholder="Mobile Number" required="" />
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
@endsection

