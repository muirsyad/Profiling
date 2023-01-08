@extends('lr_template')
@section('content')
    <style>
        form {
            margin-top: 100px;
            
        }
    </style>
    <form method="POST" action="{{ route('adminR') }}">
        @csrf
        <div class="form-body">

            <div class="title mb-3 text-white text-center">
                <h1 class="nomar fw-bold">Create an account</h1>
                <span>Complete registeration to take DiSC Assement</span>
            </div>

            <form action="#">
                <div class="row ">
                    <div class="col col-lg-6 p-4 mx-auto">
                        <div class="form-floating mb-3">
                            <input name="name" type="text" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Name</label>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select name="department_id" class="form-select" id="floatingSelect"
                                aria-label="Floating label select example">
                                @foreach ($dp as $dp)
                                    <option value="{{ $dp->id }}">{{ $dp->department }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Your departments</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-floating mb-3">
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        @error('password')
                        
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-floating mb-3">
                            <input name="password_confirmation" type="password" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="hidden" name="client_id" value='{{ $clients->id }}'>
                        {{-- <input type="hidden" name="department_id" value="1"> --}}
                        <input type="hidden" name="role_id" value="2">
                        <input type="hidden" name="status" value="2">
                        <input type="hidden" name="created_at" value="{{ date('Y-m-d') }}">
                        <input type="hidden" name="is_delete" value="0">
                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button class="btn btn-success" type="submit">Submit</button>

                        </div>


                    </div>
                </div>

            </form>
        </div>
    </form>
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
