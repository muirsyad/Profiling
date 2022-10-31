<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <script src="{{ URL::asset('assets/js/html2canvas.min.js') }}"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script> --}}

    {{-- <script src="http://cdn.jsdelivr.net/npm/chart.js"></script> --}}
</head>

<body>
    <style>
        .page-break {
            page-break-after: always;
        }

        .reportGraph {
            width: 850px
        }
    </style>
    {{-- <h1 class="page-break">Test dom pdf</h1>
<h2 class="page-break">Anotger page1</h2>
<h2 class="page-break">Anotger page2</h2> --}}

    <h1>test111</h1>
    <h2>{{ $ch }}</h2>
    <h3>{{ $img }}</h3>
    <div class="page-break">
        <h1>1 img</h1>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/640px-Image_created_with_a_mobile_phone.png"
            width="200px" height="200px" alt="img">
    </div>
    <div class="page-break">
        <img src="{{ $img }}" width="400px" height="200px" alt="img">
    </div>
    <img src="{{ $line }}" alt="line chart">


    {{-- <img src="{{ $img }}" alt="img"> --}}




</body>

</html>
