<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Clients;
use App\Models\Questions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class adminController extends Controller
{
    //
    public function index()
    {
        $count = Clients::count();
        $mcount = Clients::whereMonth('created_at', date('m'))->count();
        //dd($mcount);
        $recent = DB::table('clients')->orderBy('id', 'desc')->first();
        $participants = DB::table('users')->where('role_id',2)->count();
        $mothly = $this->monthly();
        $now = date('m');
        $ans = DB::table('answer_records')->whereYear('created_at','2022')
        ->whereMonth('created_at',date('m'))
        ->get();



        $yearn = $this->yearly();



        //dd(date('Y'),$yearn);



        //$mcount = Clients::whereMonth('created_at', Carbon::parse('01'));

        //dd($recent);
        //dd($count);
        return view(
            'admin.index',
            [
                'count' => $count,
                'mcount' => $mcount,
                'recent' => $recent,
                'monthly' => $mothly,
                'participants' => $participants,
                'year' => $yearn,

            ]
        );
    }
    public function Chome()
    {
        return view('admin.clients');
    }

    public function vquest()
    {
        return view(
            'admin.question',
            [
                'questions' => Questions::all(),
            ]
        );
    }

    public function create()
    {

        $random = Str::random(8);
        $code = $random;
        $codedb = DB::table('clients')->where('link_code', 'LoUY')->value('link_code');
        //dd($codedb,$code);
        $x = 0;
        $inc = 0;
        while ($code ==  $codedb) {

            $random = Str::random(8);
            $code = $random;
            $x = 1;
        }


        return view('admin.new_clients', [
            'code' => $random,
        ]);
    }

    public function view()
    {
        return view('admin.view_clients', [
            'clients' => Clients::all(),
        ]);
    }

    public function indTemplate()
    {
        $highlow = $this->selBehaviour('D');

        $Dhigh = explode(".",$highlow->H_temp);
        $Dcount = count($Dhigh);
        $DLow = explode(".",$highlow->L_temp);
        $Dlcount = count($DLow);

        return view('admin.inv-template',[
            'Dhigh' => $Dhigh,
            'DLow' => $DLow,
            'Dcount' => $Dcount,
            'Dlcount' => $Dlcount,
        ]);
    }
    public function indTemplate2()
    {
        $highlowD = $this->selBehaviour('D');
        $highlowI = $this->selBehaviour('I');
        $highlowS = $this->selBehaviour('S');
        $highlowC = $this->selBehaviour('C');

        $Dhigh = explode(".",$highlowD->H_temp);
        $Dcount = count($Dhigh);
        $DLow = explode(".",$highlowD->L_temp);
        $Dlcount = count($DLow);

        $Ihigh = explode(".",$highlowI->H_temp);
        $Icount = count($Ihigh);
        $ILow = explode(".",$highlowI->L_temp);
        $Ilcount = count($ILow);

        $Shigh = explode(".",$highlowS->H_temp);
        $Scount = count($Shigh);
        $SLow = explode(".",$highlowS->L_temp);
        $Slcount = count($SLow);

        $Chigh = explode(".",$highlowC->H_temp);
        $Ccount = count($Chigh);
        $CLow = explode(".",$highlowC->L_temp);
        $Clcount = count($CLow);

        return view('admin.inv-template2',[
            'Dhigh' => $Dhigh,
            'DLow' => $DLow,
            'Dcount' => $Dcount,
            'Dlcount' => $Dlcount,
            'Ihigh' => $Ihigh,
            'ILow' => $ILow,
            'Icount' => $Icount,
            'Ilcount' => $Ilcount,
            'Shigh' => $Shigh,
            'SLow' => $SLow,
            'Scount' => $Scount,
            'Slcount' => $Slcount,
            'Chigh' => $Chigh,
            'CLow' => $CLow,
            'Ccount' => $Ccount,
            'Clcount' => $Clcount,
        ]);
    }
    //keywords template
    public function Template_key(){
        $keyD = $this->selkey('D');
        $keyI = $this->selkey('I');
        $keyS = $this->selkey('S');
        $keyC = $this->selkey('C');


        $keyD = explode(",",$keyD->keywords);
        $keyI = explode(",",$keyI->keywords);
        $keyS = explode(",",$keyS->keywords);
        $keyC = explode(",",$keyC->keywords);

        //count
        $Count_kd = count($keyD);
        $Count_ki = count($keyI);
        $Count_ks = count($keyS);
        $Count_kc = count($keyC);








        return view('admin.T_Keywords',[
            'keyD' => $keyD,
            'keyI' => $keyI,
            'keyS' => $keyS,
            'keyC' => $keyC,
            'count_kd' => $Count_kd,
            'count_ki' => $Count_ki,
            'count_ks' => $Count_ks,
            'count_kc' => $Count_kc,
        ]);
    }

    public function Template_motivate(){



        $styleD = $this->arrvalue('D');
        $styleI = $this->arrvalue('I');
        $styleS = $this->arrvalue('S');
        $styleC = $this->arrvalue('C');




        $keyI = $this->selkey('I');
        $keyS = $this->selkey('S');
        $keyC = $this->selkey('C');



        $keyI = explode(",",$keyI->keywords);
        $keyS = explode(",",$keyS->keywords);
        $keyC = explode(",",$keyC->keywords);

        //count
        // $Count_kd = count($keyD);
        $Count_ki = count($keyI);
        $Count_ks = count($keyS);
        $Count_kc = count($keyC);








        return view('admin.T_Motivation',[

            'keyI' => $keyI,
            'keyS' => $keyS,
            'keyC' => $keyC,
            // 'count_kd' => $Count_kd,
            'count_ki' => $Count_ki,
            'count_ks' => $Count_ks,
            'count_kc' => $Count_kc,
            'styleD' => $styleD,
            'styleI' => $styleI,
            'styleS' => $styleS,
            'styleC' => $styleC,
        ]);
    }
    public function Template_performance(){

        $perD = $this->arrperformance('D');
        $perI = $this->arrperformance('I');
        $perS = $this->arrperformance('S');
        $perC = $this->arrperformance('C');



        return view('admin.T_Performance',[
            'perD' => $perD,
            'perI' => $perI,
            'perS' => $perS,
            'perC' => $perC,
        ]);



    }

    //small function in motivate function

    public function arrvalue($style){
        $style = $this->selmotivate($style);
        $motivate = explode('.',$style->Wmotivate);
        $best = explode('.',$style->Wbest);
        $demotivate = explode('.',$style->Wdemotive);
        $worst = explode('.',$style->Wworst);

        $keyDarr = array();
        array_push($keyDarr,$motivate,$best, $demotivate, $worst );

        return $keyDarr;

    }
    public function arrperformance($style){
        $style = $this->selperformance($style);
        $A_improve = explode('.',$style->A_improve);
        $O_better = explode('.',$style->O_better);
        $O_avoid = explode('.',$style->O_avoid);
        $Y_environment = explode('.',$style->Y_environment);

        $keyDarr = array();
        array_push($keyDarr,$A_improve,$O_better, $O_avoid, $Y_environment );

        return $keyDarr;

    }
    public function grpTemplate()
    {
        return view('admin.grp-template');
    }

    public function store(Request $request)
    {

        //dd($request);
        //dd($request);
        $formFields = $request->validate([
            'client' => 'required',
            'email' => 'required',
            'address' => 'required',
            'created_at' => 'required',
            'link_code' => 'required'
        ]);

        //dd($request->client);
        Clients::create($formFields);
        return redirect('/admin/index');
    }
    public function details(Clients $clients)
    {

        $clients = DB::table('clients')->where('id', $clients->id)->first();
        $participants = DB::table('users')->where('client_id', $clients->id)->get();
        $department = DB::table('departments')->get();
        $countre = DB::table('answer_records')->where('client_id', $clients->id)->count();
        $countall = DB::table('users')->where('client_id', $clients->id)->count();
        $allc =count($participants);
        if($allc > 0){
            $progress = $countre/$allc*100;
            $progress = intval($progress);
        }
        else{
            $progress=0;
        }





        //dd($clients,$participants,$department);
        $valuevar = $progress."%";

        return view('admin.details', [
            'client' => $clients,
            'participants' => $participants,
            'department' => $department,
            'countre' => $countre,
            'countall' => $countall,
            'var' => $valuevar,
            'progress' => $progress,
        ]);
    }
    public function invite(Clients $clients)
    {

        $clients = DB::table('clients')->where('id', $clients->id)->first();
        //dd($clients);
        return view('admin.invite', [
            'clients' => $clients,

        ]);
    }

    public function Cdelete(Clients $clients)
    {
        //$delete = DB::table('clients')->where('id', $clients->id)->delete();
        $delete = Clients::find($clients->id)->delete();

        return redirect('/admin/clients/view')->with('message', 'Departments deleted successfully');
    }

    public function update(Clients $clients)
    {
        //dd($request);
        $clients = Clients::find($clients->id);
        return view('admin.update', [
            'clients' => $clients,
        ]);
    }
    public function change(Request $request, Clients $clients)
    {
        //dd($request);
        $formFields = $request->validate([
            'client' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $update = Clients::find($clients->id)->update([
            'client' => $request->client,
            'email' => $request->email,
            'address' => $request->address
        ]);

        return redirect(route('Cview'));
        //dd($update);


    }
    public function uptemplate(Request $request){

        //dd($request->style);
        $arrayDH = array();
        $arrayDL = array();
        $arrayIH = array();
        $arrayIL = array();
        $arraySH = array();
        $arraySL = array();
        $arrayCH = array();
        $arrayCL = array();

        array_push($arrayDH,$request->D_High1,$request->D_High2,$request->D_High3,$request->D_High4,$request->D_High5);
        array_push($arrayDL,$request->D_low1,$request->D_low2,$request->D_low3,$request->D_low4,$request->D_low5);
        array_push($arrayIH,$request->I_High1,$request->I_High2,$request->I_High3,$request->I_High4,$request->I_High5);
        array_push($arrayIL,$request->I_low1,$request->I_low2,$request->I_low3,$request->I_low4,$request->I_low5);
        array_push($arraySH,$request->S_High1,$request->S_High2,$request->S_High3,$request->S_High4,$request->S_High5);
        array_push($arraySL,$request->S_low1,$request->S_low2,$request->S_low3,$request->S_low4,$request->S_low5);
        array_push($arrayCH,$request->C_High1,$request->C_High2,$request->C_High3,$request->C_High4,$request->C_High5);
        array_push($arrayCL,$request->C_low1,$request->C_low2,$request->C_low3,$request->C_low4,$request->C_low5);




        $arrayDH = $this->arraytostr($arrayDH);
        $arrayDL = $this->arraytostr($arrayDL);
        $arrayIH = $this->arraytostr($arrayIH);
        $arrayIL = $this->arraytostr($arrayIL);
        $arraySH = $this->arraytostr($arraySH);
        $arraySL = $this->arraytostr($arraySL);
        $arrayCH = $this->arraytostr($arrayCH);
        $arrayCL = $this->arraytostr($arrayCL);

        $update = DB::table('templates_reports')->where('Behaviour_type','D')
        ->update(['H_temp' => $arrayDH, 'L_temp' => $arrayDL]);
        $update = DB::table('templates_reports')->where('Behaviour_type','I')
        ->update(['H_temp' => $arrayIH, 'L_temp' => $arrayIL]);
        $update = DB::table('templates_reports')->where('Behaviour_type','S')
        ->update(['H_temp' => $arraySH, 'L_temp' => $arraySL]);
        $update = DB::table('templates_reports')->where('Behaviour_type','')
        ->update(['H_temp' => $arrayCH, 'L_temp' => $arrayCL]);




        return redirect(route('indTemp2'));
        //dd($stdh);
        // dd($request->D_High1);


    }
    public function Update_keywords(Request $request){
        //dd($request);
        $keyD = array();
        $keyI = array();
        $keyS = array();
        $keyC = array();

        array_push($keyD,$request->keyD1,$request->keyD2,$request->keyD3,$request->keyD4,$request->keyD5);
        array_push($keyI,$request->keyI1,$request->keyI2,$request->keyI3,$request->keyI4,$request->keyI5);
        array_push($keyS,$request->keyS1,$request->keyS2,$request->keyS3,$request->keyS4,$request->keyS5);
        array_push($keyC,$request->keyC1,$request->keyC2,$request->keyC3,$request->keyC4,$request->keyS5);



        $keyD = $this->arraytostr2($keyD);
        $keyI = $this->arraytostr2($keyI);
        $keyS = $this->arraytostr2($keyS);
        $keyC = $this->arraytostr2($keyC);



        $update = DB::table('templates_reports')->where('Behaviour_type','D')
        ->update(['keywords' => $keyD]);
        $update = DB::table('templates_reports')->where('Behaviour_type','I')
        ->update(['keywords' => $keyI]);
        $update = DB::table('templates_reports')->where('Behaviour_type','S')
        ->update(['keywords' => $keyS]);
        $update = DB::table('templates_reports')->where('Behaviour_type','C')
        ->update(['keywords' => $keyC]);

        return redirect(route('key'));


    }

    public function Update_motivation(Request $request){


        $combine = $request['value0'].".".$request['value1'].".".$request['value2'].".".$request['value3'];
         //dd($request);
        $update = DB::table('templates_reports')->where('Behaviour_type',$request['style'])
        ->update([$request['valuef'] => $combine]);

        return redirect(route('motivate'));

    }
    public function Update_performance(Request $request){


        $combine = $request['value0'].".".$request['value1'].".".$request['value2'].".".$request['value3'];
         //dd($request);
        $update = DB::table('templates_reports')->where('Behaviour_type',$request['style'])
        ->update([$request['valuef'] => $combine]);

        return redirect(route('performance'));

    }
    public function arraytostr($arrayDH){
        //to combine collection tom sting with comma
        foreach($arrayDH as $dh){
            if(isset($dh)){
                $stdh = implode(".", $arrayDH);
            }
        }
        return $stdh;
    }
    public function arraytostr2($arrayDH){
        //to combine collection tom sting with comma
        foreach($arrayDH as $dh){
            if(isset($dh)){
                $stdh = implode(",", $arrayDH);
            }
        }
        return $stdh;
    }
    public function profile()
    {


        return view('admin.profile');
    }
    public function profilemodify(Request $request){
        $formFields = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'comfirmationpassword' => 'required',
        ]);
        if($formFields['password'] === $formFields['comfirmationpassword']){
                $formFields['password'] = bcrypt($formFields['password']);
                // $user = DB::table('users')->where('id',auth()->user()->id)->update(['name' => $formFields['name']]);
                // $user = DB::table('users')->where('id',auth()->user()->id)->update(['email' => $formFields['email']]);
                // $user = DB::table('users')->where('id',auth()->user()->id)->update(['password' => $formFields['password']]);

                $user = DB::table('users')->where('id',auth()->user()->id)
                ->update(['name' => $formFields['name'],'email' => $formFields['email'],'password' => $formFields['password']]);


                return redirect(route('ad_index'));
        }
        else{

            return redirect('admin.profile');
        }
        //dd($formFields);



    }

    //template report
    public function templates()
    {
        return view('admin.stemplate');
    }
    //small function

    //function to calculate participants montly
    public function monthly()
    {
        $now = Carbon::now();
        $month = $now->format('m');
        // $month='10';

        $monthly = DB::table('clients')
                ->select('id','name','created_at')
                ->whereMonth('created_at',$month)
                // ->where('role_id',2)
                ->count();
        //dd($monthly,$currmon,$nextmon,$month);
        //dd($monthly);
        return $monthly;
    }
    public function countmonthly($count){

        $count = DB::table('answer_records')->whereYear('created_at','2022')
        ->whereMonth('created_at',$count)
        ->count();
        return $count;
    }


    //SQL function
    public function selBehaviour($style){
        $array = DB::table('templates_reports')
        ->select('L_temp','H_temp')
        ->where('Behaviour_type', $style)
        ->first();

        return $array;
    }
    public function selkey($style){
        $key = DB::table('templates_reports')
        ->select('keywords')
        ->where('Behaviour_type', $style)
        ->first();

        return $key;
    }
    public function selmotivate($style){
        $key = DB::table('templates_reports')
        ->select('Wmotivate','Wbest','Wdemotive','Wworst')
        ->where('Behaviour_type', $style)
        ->first();

        return $key;
    }
    public function selperformance($style){
        $key = DB::table('templates_reports')
        ->select('A_improve','O_better','O_avoid','Y_environment')
        ->where('Behaviour_type', $style)
        ->first();

        return $key;
    }
    public function selbest($style){
        $key = DB::table('templates_reports')
        ->select('Wbest')
        ->where('Behaviour_type', $style)
        ->first();

        return $key;
    }
    public function seldemotivate($style){
        $key = DB::table('templates_reports')
        ->select('Wdemotive')
        ->where('Behaviour_type', $style)
        ->first();

        return $key;
    }
    public function selworst($style){
        $key = DB::table('templates_reports')
        ->select('Wworst')
        ->where('Behaviour_type', $style)
        ->first();

        return $key;
    }
    public function yearly(){
        $year = array();
        for($i=1;$i<=12;$i++){
            $count = $this->countmonthly($i);
            array_push($year,$count);
        }
        return $year;
    }




}
