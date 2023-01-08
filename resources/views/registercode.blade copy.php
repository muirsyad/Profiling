@extends('lr_template')
@section('content')
    {{--
    <div class="text-center">
        <h4 class="text-dark mb-4">Create an Account!</h4>
    </div>
    <form class="user" action="{{ route('adminR') }}" method="post">
        @csrf
        <div class="mb-3"><input name="name" class= "form-control form-control-user" type="text" placeholder="Name" required="">
        </div>
        <div class="mb-3"><input name="email" class="form-control form-control-user" type="email" id="email"
                placeholder="Email Address" required=""></div>
        <div class="row mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0"><input name="password" class="form-control form-control-user" type="password" id="password"
                    placeholder="Password" required=""></div>
            <div class="col-sm-6"><input name="password2" class="form-control form-control-user" type="password" id="verifyPassword"
                    placeholder="Repeat Password" required=""></div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0"><input name="department_id" class="form-control form-control-user" type="text"
                    placeholder="Department" required=""></div>
            <div class="col-sm-6"><input name="client_id" class="form-control form-control-user" type="text" placeholder="Company"
                    required=""></div>
        </div>
        <input type="hidden" name="role_id" value="1">
        <input type="hidden" name="status" value="1">
        <input type="hidden" name="date_created" value="{{ date('Y-m-d') }}">
        <div class="row mb-3">
            <p id="emailErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
            <p id="passwordErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn" type="submit">Register Account</button>
        <hr>
    </form>
    <div class="text-center"><a class="small" href="login.html">Already have an account? Login!</a></div> --}}

    <div class="card">
        <div class="card-body">
            <h1>Register</h1>
            <form method="POST" action="{{ route('adminR') }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="example: Muhammad Kasim" name="name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="department_id">Choose your departments:</label>
                    <select name="department_id" id="department_id">

                        @foreach ($dp as $dp)
                            <option value="{{ $dp->id }}">{{ $dp->department }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"
                        name="email">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" placeholder="************"
                        name="password">
                        <div class="mt-2">
                            <input type="checkbox" onclick="showPass()">Show Password
                        </div>

                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Password confirmation</label>
                    <input type="password" class="form-control" id="pass2" placeholder="************"
                        name="password_confirmation">
                        <div class="mt-2">
                            <input type="checkbox" onclick="showPass2()">Show Password
                        </div>
                    @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">No-tel</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="example: 01782726353" name="no-tel">

                        @error('no-tel')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div> --}}
                <input type="hidden" name="client_id" value='{{ $clients->id }}'>
                {{-- <input type="hidden" name="department_id" value="1"> --}}
                <input type="hidden" name="role_id" value="2">
                <input type="hidden" name="status" value="2">
                <input type="hidden" name="created_at" value="{{ date('Y-m-d') }}">
                <input type="hidden" name="is_delete" value="0">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function showPass() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function showPass2() {
            var x = document.getElementById("pass2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
