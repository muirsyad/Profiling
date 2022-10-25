@extends('admin_template')
@section('content')
    <div class="card mx-auto w-50">
        <div class="card-header p-3 text-center">
            <h3>Invite Participants by email</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('smail', $clients->link_code) }}" method="post" id="form_email"
                class="p-3 mb-3 d-flex justify-content-center">
                @csrf
                <div class="row" id="row1">
                    <div class="col-12" id="col1">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email1" id="exampleFormControlInput1"
                                placeholder="name@example.com">
                        </div>
                    </div>
                </div>
            </form>
            <div class="mb-2 d-flex justify-content-end">
                <button id="addrow()" onclick="addrow()" class="btn btn-success text-light">Add row</button>
            </div>
            <div class="mb-2 d-flex justify-content-end">
                <button id="add" onclick="add()" class="btn btn-success text-light">add</button>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" form="form_email">Submit</button>
            </div>
        </div>
    </div>
    <p>Create a p element with some text:</p>

    <script>
        var count = 1;
        // var html ="22";
        function addrow() {
            console.log(count);
            count += 1;

            var html = '<div class="col-12" id="col' + count + '">\
                                            <div class="mb-3">\
                                                <label for="exampleFormControlInput1" class="form-label">Email address</label>\
                                                <input type="email" name="email' + count + '" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">\
                                            </div>\
                                        </div>';
            //var html = 'tt' + count + '" tt';
            console.log(html);

            //var form = document.getElementById('form_email')form.innerHTML += html;
            var form = document.getElementById("row1").innerHTML += html;

        }


        // Create element:
        console.log('test');
        let newEle = document.createElement('div');
        console.log(newEle);
    </script>
@endsection
