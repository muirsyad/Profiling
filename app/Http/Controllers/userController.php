<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Switch_;

class userController extends Controller
{
    //
    public function index(){
        return view('login');
    }
    public function create(){
        return view('register');
    }
    public function create2(){
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
            switch($role){
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
}
