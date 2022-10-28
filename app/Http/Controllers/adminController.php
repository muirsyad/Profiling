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
        $recent = DB::table('clients')->orderBy('id', 'desc')->first();

        //$mcount = Clients::whereMonth('created_at', Carbon::parse('01'));

        //dd($recent);
        //dd($count);
        return view(
            'admin.index',
            [
                'count' => $count,
                'mcount' => $mcount,
                'recent' => $recent

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
        //dd($clients,$participants,$department);
        return view('admin.details', [
            'client' => $clients,
            'participants' => $participants,
            'department' => $department,
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

    public function profile()
    {
        return view('admin.profile');
    }
}