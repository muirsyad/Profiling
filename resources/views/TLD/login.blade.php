@extends('TLD.LR_template')
@section('content')
    <div class="mx-auto my-14 p-4  max-w-sm rounded-lg bg-slate-50 ">
        <h1 class="text-center py-10 drop-shadow-xl text-xl font-bold">Login</h1>
        <form action="#">
            @csrf
            <img class=" mx-auto h-60 w-60" src="{{ URL::asset('assets/img/lhi.png') }}" alt="logo">
            <div class="mb-4 ">
                <p for="#" class="font-bold mb-2.5 ml-4">Email address</p>
                <input class="w-full border-2 border-emerald-800 rounded-full p-3" type="email" placeholder="Your Email...">
            </div>
            <div class="mb-4 ">
                <p for="#" class="font-bold mb-2.5 ml-4">Password</p>
                <input class="w-full border-2 border-emerald-800 rounded-full p-3" type="email" placeholder="**************************">
            </div>
            <div class="mb-4 flex justify-center">
                <button class="px-4 py-2 rounded-full text-slate-50 bg-green-500">Submit</button>
            </div>
        </form>
    </div>
@endsection