<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Login | E-Shopper</title>

    @extends('layout.app')

    @section('content')
        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Login to your account</h2>
                            <form action="{{ route('admin.login') }}" method="post">
                                @csrf
                                <input name="email" type="email" placeholder="Email Address" />
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <input name="password" type="password" placeholder="Password"/>
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                                <button type="submit" class="btn btn-default">Login</button>
                            </form>
                        </div><!--/login form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->
@endsection






