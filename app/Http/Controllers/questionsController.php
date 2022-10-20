<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Questions;
use App\Models\Departments;
use Illuminate\Http\Request;
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
        //dd($request->Q1);
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
        $record = new record;
        $record->answer_records = $str;
        $record->created_at = date('Y-m-d');
        $record->user_id = auth()->user()->id;
        $record->D = $varD;
        $record->I = $varI;
        $record->S = $varS;
        $record->C = $varC;
        $record->save();

        return redirect('/home')->with('success', 'Your have answer the test');
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

        switch ($record->C){
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
        $dept = Departments::find(auth()->user()->department_id);
        //dd($dept->department);



        return view('user.results', [
            'record' => $record,
            'high' => $highV,
            'department' => $dept->department,
            'plot' => $plot,
        ]);
    }
}
