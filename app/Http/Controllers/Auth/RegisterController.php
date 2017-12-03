<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use App\Http\Controllers\LogsController;
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

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        // $this->middleware('guest');
    }
    //para sa register na page
    //  public function edit($id)
    // {
    //     $register = Register::find($id);
    //     $register['registered'] = $register->registered()->get();
    //    // return compact('stock');
    //    return view('register.edituser', compact('register'));
    // }

    //para maka edit sa register na page
    // public function update($id, Request $request)
    // {
       
    //     $user = Register::findOrFail($id);
                
    //         $this->validate($request,[
    //             'name' => 'required|string|max:255',
    //             'username' => 'required|string|max:255'
    //         ]);


    //         $register->update([
    //             'name' => $request['name'],
    //             'username' => $request['username'],
    //         ]);
    //     }
    // }

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