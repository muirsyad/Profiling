<?php

namespace App\Http\Controllers;

use App\Mail\Signup;
use App\Models\Clients;
use App\Models\Departments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\Switch_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function create()
    {
        return view('register');
    }
    public function createcode($name)
    {

        $departments = DB::table('departments')->get();
        $code = DB::table('clients')->where('link_code', $name)->first();
        //dd($departments);
        return view(
            'registercode',
            [
                'clients' => $code,
                'dp' => $departments,

            ]
        );
    }
    public function create2()
    {
        return view('user.register');
    }
    public function Rstore(Request $request)
    {
        //dd($request);
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'client_id' => 'required',
            'role_id' => 'required',
            'department_id' => 'required',
            'status' => 'required',
            'created_at' => 'required',
        ]);
        //hash password
        $formFields['password'] = bcrypt($formFields['password']);
        //create user
        $user = User::create($formFields);

        //Login
        //auth()->login($user);
        return redirect('/')->with('message', 'Your account has been created successfully');
    }
    public function Ustore(Request $request)
    {
        //dd($request);
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'client_id' => 'required',
            'role_id' => 'required',
            'department_id' => 'required',
            'status' => 'required',
            'created_at' => 'required',
        ]);
        //hash password
        $formFields['password'] = bcrypt($formFields['password']);
        //create user
        $user = User::create($formFields);

        //Login
        //auth()->login($user);
        return redirect('/')->with('message', 'Your account has been created successfully');
    }
    public function auth(Request $request)
    {
        //dd($request);
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);



        $user = DB::table('users')->where('email', $formFields['email'])->get();


        foreach ($user as $role) {
            $role = $role->role_id;
        }
        // echo $role;
        // dd($user);




        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            switch ($role) {
                case 2:
                    return redirect("/home")->with('message', 'Logged in successfully');
                    break;
                case 1:
                    return redirect('/admin/index')->with('message', 'Logged in successfully');
                    break;
            }
            // if ($role == 2) {


            //     return redirect("/home")->with('message', 'Logged in successfully');
            // }
            // else{
            //     return redirect('/admin/index')->with('message', 'Logged in successfully');
            // }
        }
        return back()->withErrors(['email' => 'Invalid Cerendentials'])->onlyInput();
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have beem logout');
    }

    public function sendMail($name)
    {



        $url = route('link', $name);
        //dd($name,$url);
        Mail::to('muirsyad2399@gmail.com')->send(new Signup($name, $url));
        return view('login');
    }
    public function sentMail(Request $request, $code)
    {
        //to count and exclude token
        $var = -1;
        $data = $request->all();

        foreach ($data as $value) {
            $var++;
        }

        //dd($code, $request , $var);
        $url = route('link', $code);

        //dd($name,$url);
        $arr=[];

        $j=0;
        //to put value in array
        for($i=0; $i<$var; $i++) {
            $j=$i+1;
            $j="email".$j;
            $j= $request->$j;
            //dd($j);
            array_push($arr,$j);
            //dd($j);
            //dd($request->$j);
            //Mail::to($j)->send(new Signup($code, $url));
        }
        //dd($arr);
        foreach( $arr as $arr){
            Mail::to($arr)->send(new Signup($code, $url));
        }

        // Mail::to($request->email2)->send(new Signup($code, $url));
        return redirect(route('Cview'));
    }
}
