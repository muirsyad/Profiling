@extends('PDF.in_header')
@section('content')
    <style>
        .topbase {
            position: relative;
            width: 794px;
            height: 82px;
            background: #004718;

        }

        .sub-topbase {
            position: relative;
            width: 794px;
            height: 33px;
            background: #1AFF68
        }

        .text-style1 {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-size: 24px;
            line-height: 29px;
            text-align: center;
            margin-left: 100px;
            margin-top: 100px;

            color: #FFFFFF;
        }

        .box-up-left {
            position: absolute;
            width: 357px;
            height: 446px;
            left: 32px;
            top: 145px;

            background: #D9D9D9;
            border-radius: 20px;
        }
        .box-up-right {
            position: absolute;
            width: 357px;
            height: 446px;
            left: 405px;
            top: 145px;

            background: #D9D9D9;
            border-radius: 20px;
        }
        .box-down-left {
            position: absolute;
            width: 357px;
            height: 446px;
            left: 32px;
            top: 600px;

            background: #D9D9D9;
            border-radius: 20px;
        }
        .box-down-right {
            position: absolute;
            width: 357px;
            height: 446px;
            left: 405px;
            top: 600px;

            background: #D9D9D9;
            border-radius: 20px;
        }
    </style>
    <div class="page-break">
        <h1 class="title mb-8">Key Report Summary</h1>


        <table class="center mb-2">
            <tr>
                <th>Personal Graphs</th>
                <th>Team Graphs</th>
                <th>OrganizationGraphs</th>
            </tr>
            <tr>
                <td><img src="{{ $line }}" alt=""></td>
                <td><img src="{{ $teamChart }}" alt=""></td>
                <td><img src="{{ $companyChart }}" alt=""></td>
            </tr>

        </table>


        <table class="sum">
            <tr>
                <td class="sum">Strength</td>
                <td class="sum">Motivation management</td>
            </tr>

            <tr>
                <td>

                    <ul class="text-size-md2">

                        @foreach ($stg as $i => $srtg)
                            @if ($i > 1)
                            @break
                        @endif
                        <li class="font-sm">{{ $srtg }}</li>
                    @endforeach

                </ul>
            </td>


            <td>
                <h4>What Motivates You</h4>

                <ul class="text-size-md2">

                    @foreach ($Wmotivate as $i => $motivate)
                        @if ($i > 1)
                        @break
                    @endif
                    <li class="font-sm">{{ $motivate }}</li>
                @endforeach

            </ul>
            <h4>You are at your best</h4>
            <ul>
                @foreach ($Wbest as $i => $mbest)
                    @if ($i > 1)
                    @break
                @endif
                <li class="font-sm"> {{ $mbest }}</li>
            @endforeach
        </ul>
    </td>
</tr>
</table>
<table class="sum flot-r" style="width: 48.5%;">
<tr>
    <td class="sum">Performance Management</td>
</tr>
<tr>
    <h4>Your Personal Improvement</h4>
    <ul>

        @foreach ($A_improve as $i => $improve)
            @if ($i > 1)
            @break
        @endif
        <li class="font-sm">{{ $improve }}</li>
    @endforeach
</ul>
<h4>How Others Can Work Better With You</h4>
<ul>
    @foreach ($O_better as $i => $better)
        @if ($i > 1)
        @break
    @endif
    <li class="font-sm">{{ $better }}</li>
@endforeach
</ul>
</tr>
<tr>
test
</tr>
</table>
<table class="remarks">
<span class="remarks">Remarks:</span>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
</table>
<table class="footnote">
<span>Notes;</span>
<tr class="footnote">
<td><span> x % of person in organization has the same profile as you</span></td>
<td><span>You higest type is x and x that describe you as </span></td>
<td><span>Your main keywords that describe you
    @foreach ($keywords as $i => $key)
        @if ($i > 3)
        @break
    @endif
    <strong style="color: red;">{{ $key }}</strong>
@endforeach
</span></td>
</tr>
<tr>
<span>This page only summary of the report. For details of the report you</span>
</tr>
</table>

</div>
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">DESCRIPTION BASED ON EACH DIMENSION OF BEHAVIOR</h2>
</div>
<div class="header-sub">
</div>
<div class="sub-container">
    <div class="box-up-left">
        <h3 class="text-center">Dominance</h3>
        <ul>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. Est eiusmod mollit ex esse amet officia veniam aliqua.</li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure o</li>
        </ul>

    </div>
    <div class="box-up-right">
        <h3 class="text-center">Influance</h3>
        <ul>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. Est eiusmod mollit ex esse amet officia veniam aliqua.</li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure o</li>
        </ul>
    </div>
    <div class="box-down-left">
        <h3 class="text-center">Steadiness</h3>
        <ul>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. Est eiusmod mollit ex esse amet officia veniam aliqua.</li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure o</li>
        </ul>

    </div>
    <div class="box-down-right">
        <h3 class="text-center">Dominance</h3>
        <ul>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. Est eiusmod mollit ex esse amet officia veniam aliqua.</li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure o</li>
        </ul>

    </div>

</div>

</div>
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">MOTIVATION MANAGEMENT</h2>
</div>
<div class="header-sub">
</div>
<div class="sub-container">
    <div class="box-up-left">
        <h3 class="text-center">What Motivates You</h3>
        <ul>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. Est eiusmod mollit ex esse amet officia veniam aliqua.</li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure o</li>
        </ul>

    </div>
    <div class="box-up-right">
        <h3 class="text-center">What You are at your Best</h3>
        <ul>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. Est eiusmod mollit ex esse amet officia veniam aliqua.</li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure o</li>
        </ul>
    </div>
    <div class="box-down-left">
        <h3 class="text-center">What Demotivates you</h3>
        <ul>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. Est eiusmod mollit ex esse amet officia veniam aliqua.</li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure o</li>
        </ul>

    </div>
    <div class="box-down-right">
        <h3 class="text-center">What you are at your worst</h3>
        <ul>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. Est eiusmod mollit ex esse amet officia veniam aliqua.</li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure o</li>
        </ul>

    </div>

</div>

</div>
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">PERFORMANCE MANAGEMENT</h2>
</div>
<div class="header-sub">
</div>
<div class="sub-container">
    <div class="box-up-left">
        <h3 class="text-center">Your Area For Personal Improvement</h3>
        <ul>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. Est eiusmod mollit ex esse amet officia veniam aliqua.</li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure o</li>
        </ul>

    </div>
    <div class="box-up-right">
        <h3 class="text-center">How Others Can Work Better With You</h3>
        <ul>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. Est eiusmod mollit ex esse amet officia veniam aliqua.</li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure o</li>
        </ul>
    </div>
    <div class="box-down-left">
        <h3 class="text-center">Things Others Should Avoid</h3>
        <ul>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. Est eiusmod mollit ex esse amet officia veniam aliqua.</li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure o</li>
        </ul>

    </div>
    <div class="box-down-right">
        <h3 class="text-center">Your Preferred Working Environment</h3>
        <ul>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat </li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure occaecat ea dolore aliqua pariatur cupidatat laborum. Est eiusmod mollit ex esse amet officia veniam aliqua.</li>
            <li>TestAliquip anim sit magna fugiat ex. Proident proident irure o</li>
        </ul>

    </div>

</div>

</div>
<div class="LAST">
<div class="header-scnd-green">
<h2 class="text-white">TECHNICAL REPORT</h2>
</div>
<div class="header-sub">
</div>
<div class="sub-container">
test
</div>

</div>




{{-- <img src="{{ $img }}" alt="img"> --}}
@endsection
