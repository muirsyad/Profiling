<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Questions;
use App\Models\Departments;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;
// use PDF;
use SPDF;

use QuickChart;
use Illuminate\Support\Facades\DB;
use App\Models\Answer_records as record;
use App\Models\templates_report;
use App\Models\Templates_summary;
use Termwind\Components\Dd;

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
        $record = new record;
        $record->answer_records = $str;
        $record->created_at = date('Y-m-d');
        $record->user_id = auth()->user()->id;
        $record->D = $varD;
        $record->I = $varI;
        $record->S = $varS;
        $record->C = $varC;
        $record->save();

        //return redirect('/home')->with('success', 'Your have answer the test');
        return redirect('/results')->with('success', 'Your have answer the test');
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
        $dept = Departments::find(auth()->user()->department_id);
        //dd($dept->department);



        return view('user.results', [
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

        // return view('dom');
    }


    public function com_best($best)
    {
        $best = DB::table('templates_reports')->where('Behaviour_type', $best)->pluck('H_temp');
        return $best;
    }
    public function com_D($D_value)
    {
        if ($D_value > 0) {
            $D_value = DB::table('templates_reports')->where('Behaviour_type', 'D')->pluck('H_temp');
        } else {
            $D_value = DB::table('templates_reports')->where('Behaviour_type', 'D')->pluck('L_temp');
        }
        return $D_value;
    }

    public function com_I($I_value)
    {
        if ($I_value > 0) {
            $I_value = DB::table('templates_reports')->where('Behaviour_type', 'I')->pluck('H_temp');
        } else {
            $I_value = DB::table('templates_reports')->where('Behaviour_type', 'I')->pluck('L_temp');
        }
        return $I_value;
    }

    public function com_S($S_value)
    {
        if ($S_value > 0) {
            $S_value = DB::table('templates_reports')->where('Behaviour_type', 'S')->pluck('H_temp');
        } else {
            $S_value = DB::table('templates_reports')->where('Behaviour_type', 'S')->pluck('L_temp');
        }
        return $S_value;
    }

    public function com_C($C_value)
    {
        if ($C_value > 0) {
            $C_value = DB::table('templates_reports')->where('Behaviour_type', 'C')->pluck('H_temp');
        } else {
            $C_value = DB::table('templates_reports')->where('Behaviour_type', 'C')->pluck('L_temp');
        }
        return $C_value;
    }

    public function assign_minmax($value){

        if($value >20){
            $value = 1;
        }
        else{
            $value = 0;
        }
        return $value;
    }

    public function max($plot,$max){

        $b_val="";
        if($plot[0] >= $max){
            $b_val = 'D';

        }
        if($plot[1] >= $max){
            $b_val = 'I';

        }
        if($plot[2] >= $max){
            $b_val = 'S';

        }
        if($plot[3] >= $max){
            $b_val = 'C';

        }

        return $b_val;


    }

    public function highlow($hl){
        if($hl >0 ){
            $hl = 'High';
        }
        else{
            $hl= 'Low';
        }
        return $hl;
    }


    public function tpdf()
    {
        $uderid =20;
        $bt = 'C';
        $bvalue = 2;
        //get plot value
        $ans = DB::table('answer_records')->where('user_id',$uderid)->first();
        $plot = explode(",",$ans->plot);

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

        $max =max($plot);
        //get hight behaviour
        $b_val = $this->max($plot,$max);
        //dd($b_val);

        if($b_val == 'D'){
            $D_value = 2;
        }
        if($b_val == 'I'){
            $I_value = 2;
        }
        if($b_val == 'S'){
            $S_value = 2;
        }
        if($b_val == 'C'){
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
        $best = explode('.', $best);
        $D_value = explode('.', $D_value);
        $I_value = explode('.', $I_value);
        $S_value = explode('.', $S_value);
        $C_value = explode('.', $C_value);
        //dd($best,$D_value,$I_value,$S_value,$C_value);

        $qc->setConfig("{
            type: 'line',
            data: {
                labels: ['D', 'I', 'S', 'C'],
                datasets: [
                  {
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [20, 20, 20, 20],
                    fill: false,
                  },
                  {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: 'rgb(54, 162, 235)',
                    borderColor: 'rgb(54, 162, 235)',
                    data: [ $v_D, $v_I, $v_S, $v_C],
                  },
                ],
              },
              options: {
                title: {
                  display: true,
                  text: 'Chart.js Line Chart',
                },
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

        $keywords = explode(',', $keywords);
        $Wmotivate = explode('.', $Wmotivate);
        $Wbest = explode('.', $Wbest);
        $Wdemotive = explode('.', $Wdemotive);
        $Wworst = explode('.', $Wworst);
        $A_improve = explode('.', $A_improve);
        $O_better = explode('.', $O_better);
        $O_avoid = explode('.', $O_avoid);
        $Y_environment = explode('.', $Y_environment);

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
    }



    public function vtpdf()
    {
        return view('dom', [
            'ch' => "ss",
            'img' => "ss",
            'line' => "ss",
        ]);
    }
}
