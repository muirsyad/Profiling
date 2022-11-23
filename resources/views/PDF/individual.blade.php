@extends('PDF.in_header')
@section('content')
    <h1 class="title mb-8">Key Report Summary</h1>
    <div class="divt inline-block">
        <h4 class="text-center">Personal Graphs</h4>
        <img class="img-small" src="{{ $line }}" alt="">
    </div>
    <div class="divt inline-block">
        <h4 class="text-center">Team Graphs</h4>
    </div>
    <div class="divt block lcen">
        <h4 class="text-center">Organization Graphs</h4>
    </div>
@endsection
