@extends('admin_template')
@section('content')
    <h1 class="title2 mb-3"> <i class="fas fa-bookmark"></i> Individual Report Template</h1>
    <h4 class="title2 mb-3"><i class="fas fa-home"></i> <a href="{{ route('ad_index') }}">Dashboard</a> / <a
            href="{{ route('key') }}">Motivation </a></h4>

    {{-- start form --}}
        <div class="d-flex justify-content-evenly mb-3">
            <button id="btn-D" type="button" class="btn btn-primary">Show D</button>
            <button id="btn-i" type="button" class="btn btn-primary">Show i</button>
            <button id="btn-S" type="button" class="btn btn-primary">Show S</button>
            <button id="btn-C" type="button" class="btn btn-primary">Show C</button>
        </div>
    {{-- <form action="{{ route('keywordsstore') }}" method="post" id="form_template">
        @csrf --}}
        <div id="tab-D" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Motivation Template</h3>

            </div>

            <div class="card-body">
                <div class="d-flex justify-content-evenly mb-3">
                    <button id="btn-motivate" type="button" class="btn btn-primary">Motivate</button>
                    <button id="btn-best" type="button" class="btn btn-primary">Your Best</button>
                    <button id="btn-demotivate" type="button" class="btn btn-primary">Demotivate</button>
                    <button id="btn-worst" type="button" class="btn btn-primary">Your Worst</button>
                </div>

                <h3 class="text-primary mb-3">Dominance (D)</h3>
                <span style="color: red;" ><sup>*</sup>Please save first before edit other value tab</span>
                {{-- <div class="row">
                    <div class="col">
                        <p>High</p>
                        <input type="hidden" name="style" value="D">
                        <div id="inputcon" class="exampleD">

                            <span id="ch">{{ $count_kd }}</span>
                            @foreach ($keyD as $i=>$keyD )
                                @if($i>4)
                                    @break
                                @endif
                            <div class="mb-3">
                                <input type="text" value="{{ $keyD }}" class="form-control" id="keyD{{ $i+1 }}"
                                    placeholder="soalan" name="keyD{{ $i+1 }}">
                            </div>
                            @endforeach



                        </div>


                    </div>
                    <div class="d-flex justify-content-between">

                        @if($i <4)
                            <button type="button" class="btn btn-primary" onclick="addro('High','D')">Add row H </button>
                        @else
                            <button disabled type="button" class="btn btn-primary" onclick="addro('High','D')">Add row H </button>
                        @endif


                    </div>
                    <div class="p-4">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div> --}}
                <div id="tab-motivate"  >
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wmotivate">
                        <input type="hidden" name="style" value="D">
                        @foreach ( $styleD[0] as $i =>$motivate )
                        <div class="mb-3">
                            <input type="text" value="{{ $motivate }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-best" style="display: none">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wbest">
                        <input type="hidden" name="style" value="D">
                        @foreach ( $styleD[1] as $i =>$best )
                        <div class="mb-3">
                            <input type="text" value="{{ $best }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-demotivate" style="display: none">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wdemotive">
                        <input type="hidden" name="style" value="D">
                        @foreach ( $styleD[2] as $i =>$demotive )
                        <div class="mb-3">
                            <input type="text" value="{{ $demotive }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-worst" style="display: none">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wworst">
                        <input type="hidden" name="style" value="D">
                        @foreach ( $styleD[3] as $i =>$worst )
                        <div class="mb-3">
                            <input type="text" value="{{ $worst }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>



            </div>
        </div>

        <div style="display: none" id="tab-i" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Behaviour Template</h3>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-evenly mb-3">
                    <button id="btn-motivate1" type="button" class="btn btn-primary">Motivate</button>
                    <button id="btn-best1" type="button" class="btn btn-primary">Your Best</button>
                    <button id="btn-demotivate1" type="button" class="btn btn-primary">Demotivate</button>
                    <button id="btn-worst1" type="button" class="btn btn-primary">Your Worst</button>
                </div>

                <h3 class="text-primary mb-3">Influance (i)</h3>
                <span style="color: red;" ><sup>*</sup>Please save first before edit other value tab</span>

                <div id="tab-motivate1"  >
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wmotivate">
                        <input type="hidden" name="style" value="I">
                        @foreach ( $styleI[0] as $i =>$motivate )
                        <div class="mb-3">
                            <input type="text" value="{{ $motivate }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-best1" style="display: none">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wbest">
                        <input type="hidden" name="style" value="I">
                        @foreach ( $styleI[1] as $i =>$best )
                        <div class="mb-3">
                            <input type="text" value="{{ $best }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-demotivate1" style="display: none">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wdemotive">
                        <input type="hidden" name="style" value="I">
                        @foreach ( $styleI[2] as $i =>$demotive )
                        <div class="mb-3">
                            <input type="text" value="{{ $demotive }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-worst1" style="display: none">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wworst">
                        <input type="hidden" name="style" value="I">
                        @foreach ( $styleI[3] as $i =>$worst )
                        <div class="mb-3">
                            <input type="text" value="{{ $worst }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>



            </div>
        </div>

        <div style="display: none" id="tab-S" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Behaviour Template</h3>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-evenly mb-3">
                    <button id="btn-motivate2" type="button" class="btn btn-primary">Motivate</button>
                    <button id="btn-best2" type="button" class="btn btn-primary">Your Best</button>
                    <button id="btn-demotivate2" type="button" class="btn btn-primary">Demotivate</button>
                    <button id="btn-worst2" type="button" class="btn btn-primary">Your Worst</button>
                </div>

                <h3 class="text-primary mb-3">Steadiness (S)</h3>
                <span style="color: red;" ><sup>*</sup>Please save first before edit other value tab</span>

                <div id="tab-motivate2">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wmotivate">
                        <input type="hidden" name="style" value="S">
                        @foreach ( $styleS[0] as $i =>$motivate )
                        <div class="mb-3">
                            <input type="text" value="{{ $motivate }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-best2" style="display: none">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wbest">
                        <input type="hidden" name="style" value="S">
                        @foreach ( $styleS[1] as $i =>$best )
                        <div class="mb-3">
                            <input type="text" value="{{ $best }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-demotivate2" style="display: none">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wdemotive">
                        <input type="hidden" name="style" value="S">
                        @foreach ( $styleS[2] as $i =>$demotive )
                        <div class="mb-3">
                            <input type="text" value="{{ $demotive }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-worst2" style="display: none">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wworst">
                        <input type="hidden" name="style" value="S">
                        @foreach ( $styleS[3] as $i =>$worst )
                        <div class="mb-3">
                            <input type="text" value="{{ $worst }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>



            </div>
        </div>

        <div style="display: none" id="tab-C" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Behaviour Template</h3>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-evenly mb-3">
                    <button id="btn-motivate3" type="button" class="btn btn-primary">Motivate</button>
                    <button id="btn-best3" type="button" class="btn btn-primary">Your Best</button>
                    <button id="btn-demotivate3" type="button" class="btn btn-primary">Demotivate</button>
                    <button id="btn-worst3" type="button" class="btn btn-primary">Your Worst</button>
                </div>

                <h3 class="text-primary mb-3">Compliance (C)</h3>
                <span style="color: red;" ><sup>*</sup>Please save first before edit other value tab</span>

                <div id="tab-motivate3">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wmotivate">
                        <input type="hidden" name="style" value="C">
                        @foreach ( $styleC[0] as $i =>$motivate )
                        <div class="mb-3">
                            <input type="text" value="{{ $motivate }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-best3" style="display: none">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wbest">
                        <input type="hidden" name="style" value="C">
                        @foreach ( $styleC[1] as $i =>$best )
                        <div class="mb-3">
                            <input type="text" value="{{ $best }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-demotivate3" style="display: none">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wdemotive">
                        <input type="hidden" name="style" value="C">
                        @foreach ( $styleC[2] as $i =>$demotive )
                        <div class="mb-3">
                            <input type="text" value="{{ $demotive }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-worst3" style="display: none">
                    <form action="{{ route('motivatestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Wworst">
                        <input type="hidden" name="style" value="C">
                        @foreach ( $styleC[3] as $i =>$worst )
                        <div class="mb-3">
                            <input type="text" value="{{ $worst }}" class="form-control" id="keyI"
                                placeholder="soalan" name="value{{ $i }}">
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>



            </div>
        </div>





        {{-- end form --}}
    {{-- </form> --}}


{{-- <x-t_function/> --}}

    <script src="{{ URL::asset('assets/js/functionjs.js') }}"></script>


@endsection
