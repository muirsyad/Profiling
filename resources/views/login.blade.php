@extends('lr_template')
@section('content')
{{-- <a href="{{ route('ad_index') }}"><h1>Next</h1></a> --}}
    <div class="text-center"><img src="{{ URL::asset('assets/img/lhi.png') }}" width="200" height="200">
        <h4 class="text-dark mb-4">Login</h4>

    </div>
    {{-- <form action="post" action="{{ route('auth') }}">
        @csrf
        <div class="mb-3"><input class="form-control form-control-user" type="email" id="email"
                aria-describedby="emailHelp" placeholder="Enter Email Address" name="email" required=""></div>
        <div class="mb-3"><input class="form-control form-control-user" type="password" placeholder="Password"
                name="password" required=""></div>
        <div class="row mb-3">
            <p id="errorMsg" class="text-danger" style="display:none;">Paragraph</p>
        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn" type="submit">Login</button>
        <hr>
    </form> --}}

    <form method ="POST"action="{{ route('auth') }}">
        @csrf
        <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"
            name="email">

            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="************"
            name="password">

            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
    <span>Dont have an account? </span><a href="/register">Create now</a>
        </div>
        <div class="mb-3">
            <span>Dont have an account client? </span><a href="{{ route('register2') }}">Create now</a>
                </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">Login</button>
            </div>
    </form>
@endsection
