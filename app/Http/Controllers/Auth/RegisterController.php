<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\LogsController;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    public function index()
    {   
        if(Auth::User()->role == 'Super Admin'){

            $users['users'] = DB::table('users') -> get();

            if(count($users) > 0)
            {
                return view('auth\register', $users);
            }
            else
            {
                $user = Auth::user();
                return view('auth\register')->with(['users' => $user]);
            }
        }
        return back();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        // $this->middleware('guest');
    }
    
    
    
    //para sa edit register na page
     public function edit($id)
    {
        $registered = User::find($id);
        // return compact('registered');
        return view('auth/passwords/edituser', compact('registered'));
    }

    //para maka update sa register na page
    public function update($id, Request $request)
    {

        $register = User::findOrFail($id);
               
        // $this->validate($request,[
        //     'name' => 'required|string|max:255',
        //     'username' => 'required|string|max:255'
        // ]);  
        $register->update([
            'name' => $request->input('name'),
            'email' => $request->input('username'),
            'password' => bcrypt($request['password']),


        ]);

        return redirect('register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        event(new Registered($users = $this->create($request->all())));

        return $this->registered($request, $users)?:redirect('register');
    }

    //para makadelete 
     public function destroy($id)
    {

        $registered = User::find($id); 
        $registered->delete();   

        $action ='Deleted user ' . $registered->name;
        (new LogsController)->store('user', $action);

        \Session::flash('message', 'Successfully deleted the nerd!');
        return \Redirect::to('register');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    //   public function register(Request $request)
    // {
    //     $this->validator($request->all())->validate();

    //     event(new Registered($user = $this->create($request->all()));

    //     return $this->registered($request,$user)?:redirect('users');
       
    // }



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);
    }
}