@extends('lr_template')
@section('content')
<a href="{{ route('ad_index') }}"><h1>Next</h1></a>
    <div class="text-center"><img src="{{ URL::asset('assets/img/lhi.png') }}" width="200" height="200">
        <h4 class="text-dark mb-4">Login</h4>

    </div>
    <form class="user">
        <div class="mb-3"><input class="form-control form-control-user" type="email" id="email"
                aria-describedby="emailHelp" placeholder="Enter Email Address" name="email" required=""></div>
        <div class="mb-3"><input class="form-control form-control-user" type="password" placeholder="Password"
                name="password" required=""></div>
        <div class="row mb-3">
            <p id="errorMsg" class="text-danger" style="display:none;">Paragraph</p>
        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn" type="submit">Login</button>
        <hr>
    </form>
    <div class="text-center"><a class="small" href="{{ route('register') }}">Create an Account!</a></div>
@endsection
