<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register | E-Shopper</title>

    @extends('layout.app')

    @section('content')
        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>New User Signup!</h2>
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <input name="name" type="text" placeholder="First Name"/>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <input name="last_name" type="text" placeholder="Last Name"/>
                                @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <label for="dob">Date of birth</label>
                                <input name="dob" type="date" />
                                @error('dob')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <input name="email" type="email" placeholder="Email Address"/>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <input name="password" type="password" placeholder="Password"/>
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <input name="password_confirmation" type="password" placeholder="Confirm Password"/>
                                @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <button type="submit" class="btn btn-default">Signup</button>
                            </form>
                        </div><!--/sign up form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->
@endsection
