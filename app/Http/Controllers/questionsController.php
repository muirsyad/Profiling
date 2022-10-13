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
    public function index(){
        return view('user.index',[
            ''
        ]);

    }
    public function quiz(){
        $record = DB::table('answer_records')->where('user_id', auth()->user()->id)->count();

        // if($record > 0){
        //     return redirect('/home')->with('message', 'Your already answer');
        // }
        // else{
            return view('user.Bqust');
        // }
        //dd($record);

    }
    public function Squiz(){
        $Question = Questions::all();
        $Groups = Groups::all();
        $Cgroup = $Groups->count();
        //$Cgroup = gettype($Cgroup);
        //dd($Cgroup);
        //xdd($Question);
        return view('user.in',[
            'questions' => $Question,
            'groups' => $Groups,
            'countG' => $Cgroup,
        ]

    );
    }

    public function storQ(Request $request){
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
        $varD=$varI=$varS=$varC=0;
        for($i=1;$i<25;$i++){
            $num ='Q'.$i;
            //dd($num);
            $Q= $request->$num;


            // if(strcmp($Q,'D')){
            //     $varD++;
            // } else if(strcmp($Q,'I')){
            //     $varI++;
            // } else if(strcmp($Q,'S')){
            //     $varS++;
            // } else if(strcmp($Q,'C')){
            //     $varC++;
            // }

            switch($Q){
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
            array_push($compile,$Q);


        }
        array_push($compilevar, $varD,$varI, $varS, $varC);


        $str = implode (", ", $compile);
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

        return redirect('/home')->with('message', 'Your have answer the test');


    }

    public function results(){
        $record = record::where('user_id',auth()->user()->id)->first();
        //dd($record);
        $high = 0;
        $highV="";

        if($record->D > $high){
            $high = $record->D;
            $highV='D';
        } if($record->I > $high){
            $high = $record->I;
            $highV='I';
        } if($record->S > $high){
            $high = $record->S;
            $highV='S';
        }if($record->C > $high){
            $high = $record->C;
            $highV='C';
        }

        //dd($record->D,$record->I,$record->S,$record->C,$high,$highV);
        //dd(auth()->user()->id);
        $dept = Departments::find(auth()->user()->department_id);
        //dd($dept->department);

        return view('user.results',[
            'record' => $record,
            'high' => $highV,
            'department' => $dept->department,
        ]);


    }
}
