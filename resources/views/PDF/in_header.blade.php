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
        @page {
            size: a4 potrait;
            margin: 0.9;
            padding: 0.9; // you can set margin and padding 0
        }

        .page-break {
            page-break-after: always;
        }

        .reportGraph {
            width: 850px
        }

        .btn {
            background-color: red;
            border-radius: 12px
        }

        .title {
            text-align: center;
            color: #05572f;
        }

        .log-center {
            margin: auto;
            width: 50%;
            margin-left: 24%
        }

        hr.green {
            border: 5px solid rgb(101, 185, 101);
            width: 90%;


        }

        .mb-3 {
            margin-bottom: 60px;
        }

        .mb-2 {
            margin-bottom: 20px;
        }

        .mt-3 {
            margin-top: 60px;
        }

        .mt-2 {
            margin-top: 20px;
        }

        .namebox {
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            padding: 12px;
            text-align: center;
        }

        .header-green {
            border: 1px solid green;
            background-color: rgb(101, 185, 101);
            height: 8%;
            width: 80%;


        }

        .header-scnd-green {
            font-family: Arial, Helvetica, sans-serif;
            width: 70%;
            height: 7%;
            padding: 12px;
            border: 1px solid #000000;
            background-color: rgb(101, 185, 101);

        }

        .header-sub {
            background-color: #05572f;
            width: 73.3%;
            height: 3%;
        }

        .text-white {
            color: white;
            word-wrap: break-word;
            padding: 1px;
            text-align: center;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
            /* display: block; */
        }

        .text-center {
            text-align: center;
        }

        .text-size-md {

            font-family: Arial, Helvetica, sans-serif;
            word-wrap: break-word;
            font-size: 25px;
            text-align: center;
            margin-left: 35px;
            margin-right: 35px;

        }

        .text-size-md2 {
            font-family: Arial, Helvetica, sans-serif;
            word-wrap: break-word;
            font-size: 19px;
        }

        .subtopic {
            color: #05572f;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 25px;
        }

        .sub-container {
            /* border: 1px solid black; */
            width: 88%;
            margin-top: 4%;
            margin-left: auto;
            margin-right: auto;

        }

        .small-box {
            word-wrap: break-word;
            width: auto;
            background-color: #4b8569;
        }

        ul {
            font-size: 20px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
            /* border: 1px solid black; */
        }

        .point {
            background-color: black;
            border-radius: 23px;
        }

        .txtbox {
            color: white;
            background-color: rgb(31, 97, 147);
            height: 30px;
            width: 30px;
            padding: 12px;
            border-radius: 12px;
            text-align: center;

        }

        .inline {
            display: inline;
        }

        .mb-8 {
            margin-bottom: 80px;
        }

        .inline-block {
            display: inline-block;


        }

        .block {
            display: block;

        }

        .center-block {
            position: absolute;
            left: 4%;
        }

        .img-graphs2 {
            width: 300px;
            border: 1px solid #000000;
            display: block;
            margin-left: 8%;
        }

        .img-center {
            width: 300px;
            margin-left: 200px;
            border: 1px solid #000000;
        }

        .img-small {

            /* margin-left: 40px; */
            border: 1px solid #000000;

        }

        .img-three {

            border: 1px solid #000000;
        }

        .divt {
            width: 390px;
            border: 1px solid #000000;
            margin-left: 1px;

        }

        .lcen {
            margin-left: 200px;
        }

        /* table,
        th,
        td {
            border: 1px solid #000000;
            border-collapse: collapse;
        } */

        .p-10 {
            padding: 10px;
        }

        .textbox-l {
            border: 1px solid #000000;
            width: 750px;
        }

        .textbox2-l {
            border: 1px solid #000000;
            width: 370px;
        }

        .textbox2-r {
            position: relative;
            width: 370px;
            left: 400px;
            top: -163px;
            border: 1px solid #000000;
        }

        .textbox3-r {
            position: relative;
            width: 370px;
            left: 400px;
            top: -150px;
            border: 1px solid #000000;
        }

        .m-boxl {
            margin-left: 20px;
        }

        table.sum {
            /* border-collapse: separate;
            border-spacing: 50px 0; */
            background: rgb(212, 244, 215);
            border: 1px solid #000000;
            margin: 12px;
            width: 97%;
            text-align: center;

        }

        td.sum {
            padding: 10px;
            background: rgb(255, 255, 255);
            width: 48.5%;
            border: 1px solid #000000;
            /* Remove this line to disable grey background color */
        }

        table.flot-r {
            float: right;
            margin-top: -10px;
        }

        .font-sm {
            font-size: 12px;
        }
        table.footnote{
            margin-top: 315px;
            border: 1px solid #000000;
        }
        tr.footnote{
            color: red;
        }

    </style>
    {{-- page 1     --}}
    <div class="page-break">
        <h1 class="title">DiSC Profiling Report</h1>
        <img src="C:\laragon\www\LHI\Profiling\public\assets\img\lhi.png" width="300px" height="300px" class="log-center"
            alt="t">
        <hr class="green mb-3">
        <div class="namebox mb-3">
            <h4>Name :{{ $user->name }}</h4>
            <h4>Email: {{ $user->email }}</h4>
            <h4>Department: {{ $user->department }}</h4>
            <h4>Date: {{ $user->created_at }}</h4>
        </div>
        <hr class="green mb-3">
    </div>

    @yield('content')

</body>

</html>
