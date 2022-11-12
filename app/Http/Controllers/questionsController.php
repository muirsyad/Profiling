<?php

namespace App\Http\Controllers;

use SPDF;
use QuickChart;
use App\Models\Groups;
use App\Models\Clients;
use App\Models\Questions;
// use Barryvdh\DomPDF\Facade\Pdf;
// use PDF;
use App\Models\Departments;

use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\templates_report;
use App\Models\Templates_summary;
use Illuminate\Support\Facades\DB;
use App\Models\Answer_records as record;

class questionsController extends Controller
{
    //
    public function index()
    {
        $record = DB::table('answer_records')->where('user_id', auth()->user()->id)->count();

        return view('user.index', [
            ''
        ]);
    }
    public function quiz()
    {
        $record = DB::table('answer_records')->where('user_id', auth()->user()->id)->count();

        if ($record > 0) {
            return redirect('/home')->with('error', 'Your already answer');
        } else {
            return view('user.Bqust');
        }
        dd($record);
    }
    public function quiz2()
    {

        $Question = Questions::all();
        $Groups = Groups::all();
        $Cgroup = $Groups->count();
        //$Cgroup = gettype($Cgroup);
        //dd($Cgroup);
        //xdd($Question);
        return view(
            'user.quizz',
            [
                'questions' => $Question,
                'groups' => $Groups,
                'countG' => $Cgroup,
            ]

        );
    }
    public function Squiz()
    {
        $Question = Questions::all();
        $Groups = Groups::all();
        $Cgroup = $Groups->count();
        //$Cgroup = gettype($Cgroup);
        //dd($Cgroup);
        //xdd($Question);
        return view(
            'user.in',
            [
                'questions' => $Question,
                'groups' => $Groups,
                'countG' => $Cgroup,
            ]

        );
    }

    public function storQ(Request $request)
    {
        //dd($request);
        $formFields = $request->validate(
            [

                'Q1' => 'required',
                'Q2' => 'required',
                'Q3' => 'required',
                'Q4' => 'required',
                'Q5' => 'required',
                'Q6' => 'required',
                'Q7' => 'required',
                'Q8' => 'required',
                'Q9' => 'required',
                'Q10' => 'required',
                'Q11' => 'required',
                'Q12' => 'required',
                'Q13' => 'required',
                'Q14' => 'required',
                'Q15' => 'required',
                'Q16' => 'required',
                'Q17' => 'required',
                'Q18' => 'required',
                'Q19' => 'required',
                'Q20' => 'required',
                'Q21' => 'required',
                'Q22' => 'required',
                'Q23' => 'required',
                'Q24' => 'required',
            ]
        );

        $compile = array();
        $compilevar = array();
        $varD = $varI = $varS = $varC = 0;
        for ($i = 1; $i < 25; $i++) {
            $num = 'Q' . $i;
            //dd($num);
            $Q = $request->$num;


            // if(strcmp($Q,'D')){
            //     $varD++;
            // } else if(strcmp($Q,'I')){
            //     $varI++;
            // } else if(strcmp($Q,'S')){
            //     $varS++;
            // } else if(strcmp($Q,'C')){
            //     $varC++;
            // }

            switch ($Q) {
                case "D":
                    $varD++;
                    break;
                case "I":
                    $varI++;
                    break;
                case "S":
                    $varS++;
                    break;
                case "C":
                    $varC++;
                    break;
                default:
                    break;
            }
            //dd($Q);
            array_push($compile, $Q);
        }
        array_push($compilevar, $varD, $varI, $varS, $varC);


        $str = implode(", ", $compile);
        //dd($varD,$varI,$varS,$varC,$str);

        //dd(auth()->user()->id);
        //$clientid = auth()->user()->client_id;
        $record = new record;
        $record->answer_records = $str;
        $record->created_at = date('Y-m-d');
        $record->user_id = auth()->user()->id;
        $record->client_id = auth()->user()->client_id;
        $record->D = $varD;
        $record->I = $varI;
        $record->S = $varS;
        $record->C = $varC;
        $record->plot = "";
        //dd($record);
        $record->save();

        //return redirect('/home')->with('success', 'Your have answer the test');
        return redirect('/results')->with('success', 'Your have answer the test');
    }

    public function maxsort($arrbsort)
    {
        for ($i = 0; $i < count($arrbsort); $i++) {

            switch ($arrbsort[$i]) {

                case $copy[0]:
                    $arrbsort[$i] = 'D';
                    break;
                case $copy[1]:
                    $arrbsort[$i] = 'I';
                    break;
                case $copy[2]:
                    $arrbsort[$i] = 'S';
                    break;
                case $copy[3]:
                    $arrbsort[$i] = 'C';
                    break;
                default:
                    dd("error");
            }
        }
    }
    public function results()
    {
        $record = record::where('user_id', auth()->user()->id)->first();
        //dd($record);
        $high = 0;
        $highV = "";

        if ($record->D > $high) {
            $high = $record->D;
            $highV = 'D';
        }
        if ($record->I > $high) {
            $high = $record->I;
            $highV = 'I';
        }
        if ($record->S > $high) {
            $high = $record->S;
            $highV = 'S';
        }
        if ($record->C > $high) {
            $high = $record->C;
            $highV = 'C';
        }
        $plot = array();

        switch ($record->D) {
            case 0;
                array_push($plot, 2);
                break;
            case 1;
                array_push($plot, 5);
                break;
            case 2;
                array_push($plot, 9);
                break;
            case 3;
                array_push($plot, 12);
                break;
            case 4;
                array_push($plot, 14);
                break;
            case 5;
                array_push($plot, 17);
                break;
            case 6;
                array_push($plot, 19);
                break;
            case 7;
                array_push($plot, 21);
                break;
            case 8;
                array_push($plot, 24);
                break;
            case 9;
                array_push($plot, 27);
                break;
            case 10;
                array_push($plot, 32);
                break;
            case 11;
                array_push($plot, 33);
                break;
            case 12;
                array_push($plot, 34);
                break;
            case 13;
                array_push($plot, 36);
                break;
            case 14;
                array_push($plot, 38);
                break;
            case 15;
                array_push($plot, 44);
                break;
            case 16;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }

        switch ($record->I) {
            case 0;
                array_push($plot, 3);
                break;
            case 1;
                array_push($plot, 6);
                break;
            case 2;
                array_push($plot, 13);
                break;
            case 3;
                array_push($plot, 16);
                break;
            case 4;
                array_push($plot, 23);
                break;
            case 5;
                array_push($plot, 28);
                break;
            case 6;
                array_push($plot, 31);
                break;
            case 7;
                array_push($plot, 37);
                break;
            case 8;
                array_push($plot, 40);
                break;
            case 9;
                array_push($plot, 43);
                break;
            case 10;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }

        switch ($record->S) {
            case 0;
                array_push($plot, 4);
                break;
            case 1;
                array_push($plot, 8);
                break;
            case 2;
                array_push($plot, 10);
                break;
            case 3;
                array_push($plot, 14);
                break;
            case 4;
                array_push($plot, 18);
                break;
            case 5;
                array_push($plot, 22);
                break;
            case 6;
                array_push($plot, 25);
                break;
            case 7;
                array_push($plot, 29);
                break;
            case 8;
                array_push($plot, 31);
                break;
            case 9;
                array_push($plot, 35);
                break;
            case 10;
                array_push($plot, 39);
                break;
            case 11;
                array_push($plot, 42);
                break;
            case 12;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }

        switch ($record->C) {
            case 0;
                array_push($plot, 1);
                break;
            case 1;
                array_push($plot, 7);
                break;
            case 2;
                array_push($plot, 11);
                break;
            case 3;
                array_push($plot, 15);
                break;
            case 4;
                array_push($plot, 23);
                break;
            case 5;
                array_push($plot, 26);
                break;
            case 6;
                array_push($plot, 30);
                break;
            case 7;
                array_push($plot, 37);
                break;
            case 8;
                array_push($plot, 41);
                break;
            case 9;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }


        //dd($plot, $record->D,$record->I, $record->S,$record->C);

        //dd($record->D,$record->I,$record->S,$record->C,$high,$highV);
        //dd(auth()->user()->id);

        $darray = $plot;
        // $integerIDs = array_map('intval', $darray);
        //sort
        $sorted = $this->vsort($darray);
        //dd($sorted, "sorted");

        $deptm = auth()->user()->department_id;
        $splot = join(",", $plot);
        $update = record::where('user_id', $record->user_id)->update(['department_id' => $deptm]);
        $update = record::where('user_id', $record->user_id)->update(['plot' => $splot]);
        $update = record::where('user_id', $record->user_id)->update(['High' => $sorted[0]]);
        $update = record::where('user_id', $record->user_id)->update(['Low' => $sorted[1]]);
        $dept = Departments::find(auth()->user()->department_id);
        //dd($dept->department);



        return view('user.results', [
            'record' => $record,
            'high' => $highV,
            'department' => $dept->department,
            'plot' => $plot,
        ]);
    }
    public function results2()
    {
        $record = record::where('user_id', auth()->user()->id)->first();
        //dd($record);
        $high = 0;
        $highV = "";

        if ($record->D > $high) {
            $high = $record->D;
            $highV = 'D';
        }
        if ($record->I > $high) {
            $high = $record->I;
            $highV = 'I';
        }
        if ($record->S > $high) {
            $high = $record->S;
            $highV = 'S';
        }
        if ($record->C > $high) {
            $high = $record->C;
            $highV = 'C';
        }
        $plot = array();

        switch ($record->D) {
            case 0;
                array_push($plot, 2);
                break;
            case 1;
                array_push($plot, 5);
                break;
            case 2;
                array_push($plot, 9);
                break;
            case 3;
                array_push($plot, 12);
                break;
            case 4;
                array_push($plot, 14);
                break;
            case 5;
                array_push($plot, 17);
                break;
            case 6;
                array_push($plot, 19);
                break;
            case 7;
                array_push($plot, 21);
                break;
            case 8;
                array_push($plot, 24);
                break;
            case 9;
                array_push($plot, 27);
                break;
            case 10;
                array_push($plot, 32);
                break;
            case 11;
                array_push($plot, 33);
                break;
            case 12;
                array_push($plot, 34);
                break;
            case 13;
                array_push($plot, 36);
                break;
            case 14;
                array_push($plot, 38);
                break;
            case 15;
                array_push($plot, 44);
                break;
            case 16;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }

        switch ($record->I) {
            case 0;
                array_push($plot, 3);
                break;
            case 1;
                array_push($plot, 6);
                break;
            case 2;
                array_push($plot, 13);
                break;
            case 3;
                array_push($plot, 16);
                break;
            case 4;
                array_push($plot, 23);
                break;
            case 5;
                array_push($plot, 28);
                break;
            case 6;
                array_push($plot, 31);
                break;
            case 7;
                array_push($plot, 37);
                break;
            case 8;
                array_push($plot, 40);
                break;
            case 9;
                array_push($plot, 43);
                break;
            case 10;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }

        switch ($record->S) {
            case 0;
                array_push($plot, 4);
                break;
            case 1;
                array_push($plot, 8);
                break;
            case 2;
                array_push($plot, 10);
                break;
            case 3;
                array_push($plot, 14);
                break;
            case 4;
                array_push($plot, 18);
                break;
            case 5;
                array_push($plot, 22);
                break;
            case 6;
                array_push($plot, 25);
                break;
            case 7;
                array_push($plot, 29);
                break;
            case 8;
                array_push($plot, 31);
                break;
            case 9;
                array_push($plot, 35);
                break;
            case 10;
                array_push($plot, 39);
                break;
            case 11;
                array_push($plot, 42);
                break;
            case 12;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }

        switch ($record->C) {
            case 0;
                array_push($plot, 1);
                break;
            case 1;
                array_push($plot, 7);
                break;
            case 2;
                array_push($plot, 11);
                break;
            case 3;
                array_push($plot, 15);
                break;
            case 4;
                array_push($plot, 23);
                break;
            case 5;
                array_push($plot, 26);
                break;
            case 6;
                array_push($plot, 30);
                break;
            case 7;
                array_push($plot, 37);
                break;
            case 8;
                array_push($plot, 41);
                break;
            case 9;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }


        //dd($plot, $record->D,$record->I, $record->S,$record->C);

        //dd($record->D,$record->I,$record->S,$record->C,$high,$highV);
        //dd(auth()->user()->id);

        $darray = $plot;
        // $integerIDs = array_map('intval', $darray);
        //sort
        $sorted = $this->vsort($darray);
        //dd($sorted, "sorted");

        $deptm = auth()->user()->department_id;
        $splot = join(",", $plot);
        $update = record::where('user_id', $record->user_id)->update(['department_id' => $deptm]);
        $update = record::where('user_id', $record->user_id)->update(['plot' => $splot]);
        $update = record::where('user_id', $record->user_id)->update(['High' => $sorted[0]]);
        $update = record::where('user_id', $record->user_id)->update(['Low' => $sorted[1]]);
        $dept = Departments::find(auth()->user()->department_id);
        //dd($dept->department);



        return view('user.results2', [
            'record' => $record,
            'high' => $highV,
            'department' => $dept->department,
            'plot' => $plot,
        ]);
    }

    public function pdf()
    {
        $pdf = Pdf::loadView('dom');

        return $pdf->stream('invoice.pdf');
        return $pdf->download('invoice.pdf');

        // return view('dom');
    }


    public function com_best($best)
    {
        $best = DB::table('templates_reports')->where('Behaviour_type', $best)->pluck('H_temp')->first();
        return $best;
    }
    public function com_D($D_value)
    {
        if ($D_value > 0) {
            $D_value = DB::table('templates_reports')->where('Behaviour_type', 'D')->pluck('H_temp')->first();
        } else {
            $D_value = DB::table('templates_reports')->where('Behaviour_type', 'D')->pluck('L_temp')->first();
        }
        return $D_value;
    }

    public function com_I($I_value)
    {
        if ($I_value > 0) {
            $I_value = DB::table('templates_reports')->where('Behaviour_type', 'I')->pluck('H_temp')->first();
        } else {
            $I_value = DB::table('templates_reports')->where('Behaviour_type', 'I')->pluck('L_temp')->first();
        }
        return $I_value;
    }

    public function com_S($S_value)
    {
        if ($S_value > 0) {
            $S_value = DB::table('templates_reports')->where('Behaviour_type', 'S')->pluck('H_temp')->first();
        } else {
            $S_value = DB::table('templates_reports')->where('Behaviour_type', 'S')->pluck('L_temp')->first();
        }
        return $S_value;
    }

    public function com_C($C_value)
    {
        if ($C_value > 0) {
            $C_value = DB::table('templates_reports')->where('Behaviour_type', 'C')->pluck('H_temp')->first();
        } else {
            $C_value = DB::table('templates_reports')->where('Behaviour_type', 'C')->pluck('L_temp')->first();
        }
        return $C_value;
    }

    public function assign_minmax($value)
    {

        if ($value > 20) {
            $value = 1;
        } else {
            $value = 0;
        }
        return $value;
    }

    public function max($plot, $max)
    {

        $b_val = "";
        if ($plot[0] >= $max) {
            $b_val = 'D';
        }
        if ($plot[1] >= $max) {
            $b_val = 'I';
        }
        if ($plot[2] >= $max) {
            $b_val = 'S';
        }
        if ($plot[3] >= $max) {
            $b_val = 'C';
        }

        return $b_val;
    }

    public function highlow($hl)
    {
        if ($hl > 0) {
            $hl = 'High';
        } else {
            $hl = 'Low';
        }
        return $hl;
    }


    public function removearr($array, $max)
    {

        if (($key = array_search($max, $array)) !== false) {
            unset($array[$key]);
        }
        return $array;
    }
    public function bsort($bsort)
    {
        $max = 0;
        $scnd = 0;
        $third = 0;
        $forth = 0;

        $copy = $bsort;


        //delete element in array by value "green"
        // if (($key = array_search($max, $bsort)) !== false) {
        //     unset($bsort[$key]);
        // }
        $max = max($bsort);
        $bsort = $this->removearr($bsort, $max);
        $scnd = max($bsort);
        $bsort = $this->removearr($bsort, $scnd);
        $third = max($bsort);
        $bsort = $this->removearr($bsort, $third);
        $forth = max($bsort);
        $bsort = $this->removearr($bsort, $scnd);
        //$bsort=$this->removearr($bsort,$scnd);

        //$scnd=max($bsort);


        $arrbsort = array();

        array_push($arrbsort, $max, $scnd, $third, $forth);
        $temparr = $arrbsort;


        $copybs = $arrbsort;
        for ($i = 0; $i < count($arrbsort); $i++) {

            switch ($arrbsort[$i]) {

                case $copy[0]:
                    $arrbsort[$i] = 'D';
                    break;
                case $copy[1]:
                    $arrbsort[$i] = 'I';
                    break;
                case $copy[2]:
                    $arrbsort[$i] = 'S';
                    break;
                case $copy[3]:
                    $arrbsort[$i] = 'C';
                    break;
                default:
                    dd("error");
            }
        }
        //dd($copy,$bsort,$max,$scnd,$third,$forth,$copybs,$arrbsort);
        //dd($arrbsort, $temparr);
        return $arrbsort;
    }
    function vsort($bsort)
    {


        $max = 0;
        $scnd = 0;
        $third = 0;
        $forth = 0;

        $copy = $bsort;


        //delete element in array by value "green"
        // if (($key = array_search($max, $bsort)) !== false) {
        //     unset($bsort[$key]);
        // }
        $max = max($bsort);
        $bsort = $this->removearr($bsort, $max);
        $scnd = max($bsort);
        $bsort = $this->removearr($bsort, $scnd);
        $third = max($bsort);
        $bsort = $this->removearr($bsort, $third);
        $forth = max($bsort);
        $bsort = $this->removearr($bsort, $scnd);
        //$bsort=$this->removearr($bsort,$scnd);

        //$scnd=max($bsort);


        $arrbsort = array();

        array_push($arrbsort, $max, $scnd, $third, $forth);
        $temparr = $arrbsort;


        $copybs = $arrbsort;

        //dd($arrbsort[3]);
        for ($i = 0; $i < count($arrbsort); $i++) {

            switch ($arrbsort[$i]) {

                case $copy[0]:
                    $arrbsort[$i] = 'D';
                    break;
                case $copy[1]:
                    $arrbsort[$i] = 'I';
                    break;
                case $copy[2]:
                    $arrbsort[$i] = 'S';
                    break;
                case $copy[3]:
                    $arrbsort[$i] = 'C';
                    break;
                default:
                    dd("error");
            }
        }
        //dd($copy,$bsort,$max,$scnd,$third,$forth,$copybs,$arrbsort);
        //dd($copybs,"bs");

        if ($copybs[3] <= 20) {
            $lowsort = $arrbsort[3];
        } else {
            $lowsort = "NO";
        }
        $sortmax = $arrbsort[0];
        $maxlow = array();
        array_push($maxlow, $sortmax, $lowsort);
        //dd($arrbsort, $arrbsort[3],$sortmax,$lowsort,$copybs,$maxlow);
        return $maxlow;
    }
    public function tpdf()
    {
        $uderid = 20;
        $bt = 'C';
        $bvalue = 2;
        $auth = auth()->user()->id;
        //dd($auth);
        //get plot value

        $ans = DB::table('answer_records')->where('user_id', $auth)->first();
        $join = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'departments.department')
            ->where('users.id', $auth)
            ->first();

        //$intd = intval($ans->plot);
        $darray = explode(',', $ans->plot);
        $integerIDs = array_map('intval', $darray);
        //sort
        $sorted = $this->bsort($integerIDs);

        //$type = gettype($integerIDs);

        //dd($ans,$join,$integerIDs,$type);

        // $dept = $join->department;
        // dd($dept);
        $plot = explode(",", $ans->plot);


        //dd($template,$Behaviour_type,$keywords,$Wmotivate,$Wbest,$Wdemotive,$Wworst,$A_improve,$O_better,$O_avoid,$Y_environment);
        // $pdf = Pdf::loadView('dom');

        // return $pdf->stream('invoice.pdf');
        $qc = new QuickChart(array(
            'width' => 600,
            'height' => 300,
        ));

        $qc->setConfig('{
            type: "line",
            data: {
              labels: ["Hello world", "Test"],
              datasets: [{
                label: "Foo",
                data: [1, 2]
              }]
            }
          }');

        // Print the chart URL

        //dd($qc->getUrl());
        $img = $qc->getUrl();


        // chart
        $qc = new QuickChart(array(
            'width' => 500,
            'height' => 300,
            'version' => '2',
        ));


        //Behaviour value with range

        $v_D = $plot[0];
        $v_I = $plot[1];
        $v_S = $plot[2];
        $v_C = $plot[3];

        //dd($v_D, $v_I, $v_S, $v_C);

        $D_value = $this->assign_minmax($plot[0]);
        $I_value = $this->assign_minmax($plot[1]);
        $S_value = $this->assign_minmax($plot[2]);
        $C_value = $this->assign_minmax($plot[3]);
        //dd($D_value, $I_value, $S_value, $C_value);

        $max = max($plot);
        //get hight behaviour
        $b_val = $this->max($plot, $max);
        //dd($b_val);

        if ($b_val == 'D') {
            $D_value = 2;
        }
        if ($b_val == 'I') {
            $I_value = 2;
        }
        if ($b_val == 'S') {
            $S_value = 2;
        }
        if ($b_val == 'C') {
            $C_value = 2;
        }

        //dd($D_value,$I_value,$S_value,$C_value);
        $valbest = 2;


        switch ($valbest) {
            case $D_value;

                $best = 'D';
                $best = $this->com_best($best);
                $I_hl = $this->highlow($I_value);
                $I_value = $this->com_I($I_value);
                $S_hl = $this->highlow($S_value);
                $S_value = $this->com_S($S_value);
                $C_hl = $this->highlow($C_value);
                $C_value = $this->com_C($C_value);
                $D_hl = '';
                //dd($I_value);
                break;
            case $I_value;
                //dd('I');
                $best = 'I';
                $best = $this->com_best($best);
                $D_hl = $this->highlow($D_value);
                $D_value = $this->com_D($D_value);
                $S_hl = $this->highlow($S_value);
                $S_value = $this->com_S($S_value);
                $C_hl = $this->highlow($C_value);
                $C_value = $this->com_C($C_value);
                $I_hl = '';
                break;
            case $S_value;
                //dd('S');
                $best = 'S';
                $best = $this->com_best($best);
                $I_hl = $this->highlow($I_value);
                $I_value = $this->com_I($I_value);
                $D_hl = $this->highlow($D_value);
                $D_value = $this->com_D($D_value);
                $C_hl = $this->highlow($C_value);
                $C_value = $this->com_C($C_value);
                $S_hl = '';
                break;
            case $C_value;
                //dd('C');
                $best = 'C';
                $best = $this->com_best($best);
                $I_hl = $this->highlow($I_value);
                $I_value = $this->com_I($I_value);
                $S_hl = $this->highlow($S_value);
                $S_value = $this->com_S($S_value);
                $D_hl = $this->highlow($D_value);
                $D_value = $this->com_D($D_value);
                $C_hl = '';
                break;

            default:
                dd('unknown value');
        }
        // if($D_value === $valbest){
        //     //$D_value = $best;

        //     $best = 'D';
        //     $vbest = $best;
        //     dd($D_value,$best);
        //     //$D_value = DB::table('templates_reports')->where('Behaviour_type',$best)->pluck('H_temp');
        //     $best = $this->com_best($best);
        //     $I_value = $this->com_I($I_value);
        //     $S_value = $this->com_S($S_value);
        //     $C_value = $this->com_C($C_value);


        // }
        // if($I_value === $valbest){
        //     //$I_value = $best;
        //     $best = 'I';
        //     dd($D_value,$best);
        //     $vbest = $best;
        //     $best = $this->com_best($best);
        //     $D_value = $this->com_D($D_value);
        //     $S_value = $this->com_S($S_value);
        //     $C_value = $this->com_C($C_value);
        // }
        // if($S_value === $valbest){
        //     //$S_value = $best;
        //     $best = 'S';
        //     $vbest = $best;
        //     $best = $this->com_best($best);
        //     $I_value = $this->com_I($I_value);
        //     $D_value = $this->com_D($D_value);
        //     $C_value = $this->com_C($C_value);
        // }
        // if($C_value > $valbest){
        //     //$C_value = $best;
        //     $best = 'C';
        //     $vbest = $best;
        //     $best = $this->com_best($best);
        //     $I_value = $this->com_I($I_value);
        //     $S_value = $this->com_S($S_value);
        //     $D_value = $this->com_D($D_value);
        // }
        // else {
        //     $best = $best;
        // }



        // $best = DB::table('templates_reports')->where('Behaviour_type','D')->pluck('H_temp');
        // if($I_value = 1){
        //     $I_value = DB::table('templates_reports')->where('Behaviour_type','I')->pluck('H_temp');
        // }
        // else{
        //     $I_value = DB::table('templates_reports')->where('Behaviour_type','I')->pluck('L_temp');
        // }

        // if($S_value = 1){
        //     $S_value = DB::table('templates_reports')->where('Behaviour_type','S')->pluck('H_temp');
        // }
        // else{
        //     $S_value = DB::table('templates_reports')->where('Behaviour_type','S')->pluck('L_temp');
        // }

        // if($C_value = 1){
        //     $C_value = DB::table('templates_reports')->where('Behaviour_type','C')->pluck('H_temp');
        // }
        // else{
        //     $C_value = DB::table('templates_reports')->where('Behaviour_type','C')->pluck('L_temp');
        // }
        //explode array

        //$best = explode('.', $best);
        // $best = explode('.', $best);
        // $D_value = explode('.', $D_value);
        // $I_value = explode('.', $I_value);
        // $S_value = explode('.', $S_value);
        // $C_value = explode('.', $C_value);

        //dd($best,$D_value,$I_value,$S_value,$C_value);

        $qc->setConfig("{
            type: 'line',
            data: {
                labels: ['','D', 'I', 'S', 'C',''],
                datasets: [
                  {
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(0, 0, 0)',
                    data: [20,20,20, 20, 20, 20],
                    fill: false,
                    pointRadius:0,
                    borderWidth: 1
                  },
                  {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: 'rgb(54, 162, 235)',
                    borderColor: 'rgb(54, 162, 235)',
                    data: [null, $v_D, $v_I, $v_S, $v_C,null],
                    pointRadius:0,
                    borderWidth: 4
                  },
                ],
              },
              options: {
                legend: {
                    display: false,
                },
                title: {
                  display: true,
                  text: 'DiSC Profiling grpahs',
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            display: false,
                        }
                    }]
                }

              },
        }");

        //dd($qc->getUrl());
        $template = DB::table('templates_reports')->where('Behaviour_type', $b_val)->first();
        //dd($template);


        //dd($plot);
        $keywords = $template->keywords;
        $Wmotivate = $template->Wmotivate;
        $Wbest = $template->Wbest;
        $Wdemotive = $template->Wdemotive;
        $Wworst = $template->Wworst;
        $A_improve = $template->A_improve;
        $O_better = $template->O_better;
        $O_avoid = $template->O_avoid;
        $Y_environment = $template->Y_environment;
        $Behaviour_type = $template->Behaviour_type;
        //$keywords = $template->keywords;

        //dd($best, $Wmotivate);
        $keywords = explode(',', $keywords);
        $Wmotivate = explode('.', $Wmotivate);
        $Wbest = explode('.', $Wbest);
        $Wdemotive = explode('.', $Wdemotive);
        $Wworst = explode('.', $Wworst);
        $A_improve = explode('.', $A_improve);
        $O_better = explode('.', $O_better);
        $O_avoid = explode('.', $O_avoid);
        $Y_environment = explode('.', $Y_environment);

        $best = explode('.', $best);
        $D_value = explode('.', $D_value);
        $I_value = explode('.', $I_value);
        $S_value = explode('.', $S_value);
        $C_value = explode('.', $C_value);



        $line = $qc->getUrl();
        //dd($line);

        // $ch=$qc->getUrl();
        // //dd($ch);

        // $path = "https://picsum.photos/200";
        // $type = pathinfo($path, PATHINFO_EXTENSION);
        // $data = file_get_contents($path);
        // $pic = 'data:image/'.';base64' . base64_encode($data);
        // $pdf = Pdf::loadView('dom',[
        //     'charts' => $ch,
        // ]);
        // $pdf->set_option('isRemoteEnabled',true);
        // $pdf->setPaper('A4', 'landscape');

        // $content = view('dom');
        // $view = \View::make('dom',[
        //     'img' => $ch,
        // ]);
        // $html_content = $view->render();
        // PDF::SetTitle('Hello World');
        // PDF::AddPage();
        // // PDF::Write(0, $html_content);
        // PDF::writeHTML($html_content, true, false, true, false, '');
        // PDF::Output('hello_world.pdf');
        // return $pdf->stream('invoice.pdf');
        //     return view('dom',
        //       [
        //         'charts' => $qc->getUrl(),
        //       ]
        // );
        $ch = 1;
        $img1 = "https://picsum.photos/200";
        //dd($D_value, $I_value, $S_value, $C_value,$D_hl,$I_hl,$S_hl,$C_hl);

        $pdf = pdf::loadView('dom', [
            'ansval' => $ans,
            'user'  => $join,
            'rank' => $sorted,
            'ch' => $ch,
            'img' => $img,
            'line' => $line,
            'b_val' => $b_val,
            'best' => $best,
            'D_value' => $D_value,
            'I_value' => $I_value,
            'S_value' => $S_value,
            'C_value' => $C_value,
            'D_hl' => $D_hl,
            'I_hl' => $I_hl,
            'S_hl' => $S_hl,
            'C_hl' => $C_hl,
            'keywords' => $keywords,
            'Wmotivate' => $Wmotivate,
            'Wbest' => $Wbest,
            'Wdemotive' => $Wdemotive,
            'Wworst' => $Wworst,
            'A_improve' => $A_improve,
            'O_better' => $O_better,
            'O_avoid' => $O_avoid,
            'Y_environment' => $Y_environment,
            'Behaviour_type' => $Behaviour_type,

        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );

        $pdf->setOption('isRemoteEnabled', true);
        return $pdf->stream('invoice.pdf');
        //return $pdf->download('profiling.pdf');
    }



    public function vtpdf()
    {
        return view('dom', [
            'ch' => "ss",
            'img' => "ss",
            'line' => "ss",
        ]);
    }

    public function Chartquick($name, $value)
    {

        $qc = new QuickChart(array(
            'width' => 500,
            'height' => 300,
            'version' => '2',
        ));
        $qc->setConfig("{
            type: 'pie',
            data: {
                labels: ['D', 'I', 'S', 'C'],
                datasets: [
                    {
                      data: [$value[0], $value[1], $value[2], $value[3]],
                      backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                      ],
                      label: 'Dataset 1',
                    },
                  ],

              },
            options:{
                title: {
                    display: true,
                    text: '$name'
                }
            }


        }");
        $url = $qc->getUrl();
        //dd('Genereated url : ',$url);
        return $url;
    }
    public function persent($num, $total)
    {
        $num = $num / $total * 100;
        return $num;
    }
    public function chartvalue($join)
    {

        $maxD = 0;
        $maxI = 0;
        $maxS = 0;
        $maxC = 0;


        $countj = count($join);


        foreach ($join as $join) {
            $darray = explode(',', $join->plot);

            $integerIDs = array_map('intval', $darray);
            //sort
            $sorted = $this->bsort($integerIDs);
            $maxb = $sorted[0];
            switch ($maxb) {
                case 'D';
                    $maxD = $maxD + 1;
                    break;
                case 'I';
                    $maxI = $maxI + 1;
                    break;
                case 'S';
                    $maxS = $maxS + 1;
                    break;
                case 'C';
                    $maxC = $maxC + 1;
                    break;
                default:
                    dd('error`');
            }

            //dd($participants,$darray,$sorted,$maxb,$integerIDs,$maxI);


        }

        $myarray = array();
        array_push($myarray, $maxD, $maxI, $maxS, $maxC);





        return $myarray;
    }
    public function valhigh($style)
    {
        $sql = DB::table('answer_records')
            ->where('High', $style)
            ->get();
        return $sql;
    }
    public function vallow($style)
    {
        $sql = DB::table('answer_records')
            ->where('Low', $style)
            ->get();
        return $sql;
    }
    public function qurjoin($style,$client){
        $style =DB::table('answer_records')
        ->join('clients', 'answer_records.client_id', '=', 'clients.id')
        ->join('users', 'answer_records.user_id', '=', 'users.id')
        ->join('departments','answer_records.department_id', '=', 'departments.id')
        ->select('answer_records.*', 'clients.client', 'users.department_id', 'users.name','departments.department')
        ->orderBy('answer_records.department_id', 'asc')
        ->where('answer_records.client_id', $client)
        ->where('High', $style)

        // ->where('users.department_id', 1)
        ->get();

        return $style;

    }
    public function qurjoinlow($style,$client){
        $style =DB::table('answer_records')
        ->join('clients', 'answer_records.client_id', '=', 'clients.id')
        ->join('users', 'answer_records.user_id', '=', 'users.id')
        ->join('departments','answer_records.department_id', '=', 'departments.id')
        ->select('answer_records.*', 'clients.client', 'users.department_id', 'users.name','departments.department')
        ->orderBy('answer_records.department_id', 'asc')
        ->where('answer_records.client_id', $client)
        ->where('Low', $style)

        // ->where('users.department_id', 1)
        ->get();

        return $style;

    }
    public function Gpdf(Clients $clients)
    {


        $participants = DB::table('users')->where('client_id', $clients->id)->count();
        $join = DB::table('answer_records')
            ->join('clients', 'answer_records.client_id', '=', 'clients.id')
            ->join('users', 'answer_records.user_id', '=', 'users.id')
            ->select('answer_records.*', 'clients.client', 'users.department_id', 'users.name')
            ->where('answer_records.client_id', $clients->id)
            // ->where('users.department_id', 1)
            ->get();
        $joinall = DB::table('answer_records')
        ->join('clients', 'answer_records.client_id', '=', 'clients.id')
        ->join('users', 'answer_records.user_id', '=', 'users.id')
        ->join('departments','answer_records.department_id', '=', 'departments.id')
        ->select('answer_records.*', 'clients.client', 'users.department_id', 'users.name','departments.department')
        ->orderBy('answer_records.department_id', 'asc')
        ->where('answer_records.client_id', $clients->id)
            // ->where('users.department_id', 1)
        ->get();
        //dd($joinall);

        $djoin = $this->qurjoin('D',$clients->id);
        $djoinlow=$this->qurjoinlow('D',$clients->id);

        $ijoin = $this->qurjoin('I',$clients->id);
        $ijoinlow=$this->qurjoinlow('I',$clients->id);
        $sjoin = $this->qurjoin('S',$clients->id);
        $sjoinlow=$this->qurjoinlow('S',$clients->id);
        $cjoin = $this->qurjoin('C',$clients->id);
        $cjoinlow=$this->qurjoinlow('C',$clients->id);
        //dd($djoin,$ijoin,$sjoin,$cjoin);

        //dd($djoin,$djoinlow);
        $maxD = 0;
        $maxI = 0;
        $maxS = 0;
        $maxC = 0;

        // $highD=$highI=$highS=$highC=array();

        foreach ($join as $join) {
            $darray = explode(',', $join->plot);

            $integerIDs = array_map('intval', $darray);
            //sort
            $sorted = $this->bsort($integerIDs);
            $maxb = $sorted[0];
            switch ($maxb) {
                case 'D';
                    $maxD = $maxD + 1;

                    break;
                case 'I';
                    $maxI = $maxI + 1;

                    break;
                case 'S';
                    $maxS = $maxS + 1;

                    break;
                case 'C';
                    $maxC = $maxC + 1;

                    break;
                default:
                    dd('error`');
            }

            //dd($participants,$darray,$sorted,$maxb,$integerIDs,$maxI);


        }

        $perD = $this->persent($maxD, $participants);
        $perD = ceil($perD);
        $perI = $this->persent($maxI, $participants);
        $perI = ceil($perI);
        $perS = $this->persent($maxS, $participants);
        $perS = ceil($perS);
        $perC = $this->persent($maxC, $participants);
        $perC = ceil($perC);

        //dd($participants,$darray,$sorted,$maxb,$integerIDs,$maxI);
        $totalval = array();
        array_push($totalval, $maxD, $maxI, $maxS, $maxC);

        //dd($maxD,$maxI,$maxS,$maxC,$totalval);
        // dd($participants,$darray,$sorted,$integerIDs);

        //department value
        $numdepartment = DB::table('departments')->get();
        $storeV = array();
        $s = 0;

        $storeUrl = array();
        foreach ($numdepartment as $dept) {

            $join = DB::table('answer_records')
                ->join('clients', 'answer_records.client_id', '=', 'clients.id')
                ->join('users', 'answer_records.user_id', '=', 'users.id')
                ->select('answer_records.*', 'clients.client', 'users.department_id')
                ->where('answer_records.client_id', $clients->id)
                ->where('users.department_id', $dept->id)
                ->get();

            $counj = count($join);


            if ($counj > 0) {
                $query = $this->chartvalue($join);

                array_push($storeV, $query);

                ${'url' . $dept->id} = $this->Chartquick($dept->department, $query);
                array_push($storeUrl, ${'url' . $dept->id});
            } else {
                $temp = 0;
            }
        }

        $count = count($storeUrl);
        //dd($count);

        //dd($storeUrl);
        //dd($storeV,$url1,$url2);
        // $url1 = $this->Chartquick('chart1');
        // $url2 = $this->Chartquick('chart2');
        // $url3 = $this->Chartquick('chart3');
        // $url4 = $this->Chartquick('chart4');
        $valHd = $this->valhigh('D');
        $vallD = $this->vallow('D');
        $valHi = $this->valhigh('I');
        $valli = $this->vallow('I');
        $valHS = $this->valhigh('S');
        $vallS = $this->vallow('S');
        $valHC = $this->valhigh('C');
        $vallC = $this->vallow('C');

        //dd($valHd,$vallD,$valHi,$valli,$valHS,$vallS,$valHC,$vallC);


        $total = $this->Chartquick("Participants Summary", $totalval);
        //dd($totalval);
        $pdf = pdf::loadView('PDF.Gpdf', [
            'name' => $clients->client,
            'num' => $participants,
            'url1' => $url1,
            'url2' => $url2,
            'url3' => $url3,
            'url' => $storeUrl,
            // 'url' => $storeUrl,
            'total' => $total,
            'maxD' => $maxD,
            'maxI' => $maxI,
            'maxS' => $maxS,
            'maxC' => $maxC,
            'perD' => $perD,
            'perI' => $perI,
            'perS' => $perS,
            'perC' => $perC,
            'dept' => $numdepartment,
            'clients' => $clients,
            'HD' => $valHd,
            'LD' => $vallD,
            'HI' => $valHi,
            'LI' => $valli,
            'HS' => $valHS,
            'LS' => $vallS,
            'HC' => $valHC,
            'LC' => $vallC,
            'djoin' => $djoin,
            'ijoin' => $ijoin,
            'sjoin' => $sjoin,
            'cjoin' => $cjoin,
            'djoinlow' => $djoinlow,
            'ijoinlow' => $ijoinlow,
            'sjoinlow' => $sjoinlow,
            'cjoinlow' => $cjoinlow,
            'joinall' =>$joinall,
            'sum' => $totalval,
        ]);
        return $pdf->stream('DiSC Report.pdf');
    }
}
