<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:16',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'date' => 'required|date'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $validation_code = str_random(20);
        $username = $data['username'];
        $email = $data['email'];

        //generating the avatar using www.placehold.it
        $url = "https://placeholdit.imgix.net/~text?txtsize=72&bg=c32f2b&txtclr=ffffff&txt=".$username."&w=250&h=250";
        $avatar = "img/" . $username . ".png";
        file_put_contents($avatar, file_get_contents($url));

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = bcrypt($data['password']);
        $user->avatar = $avatar;
        $user->validation = $validation_code;
        $user->dob = $data['date'];
        $user->save();

        //send the validation e-mail to the user
        Mail::send('auth.emails.confirm', ['username'=> $username, 'validation' => $validation_code], function($message) use($username, $email){
            $message->to($email, $username)->subject('[The Forum] Validate your account');
        });

        return $user;
    }
}
