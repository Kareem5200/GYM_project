<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\CustomHelperFunctions;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

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
        $this->middleware(['guest','guest:employees']);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','confirmed', Password::min(8)->mixedCase()->numbers()],
            'image'=>['required','image','mimes:png,jpg,jpeg','max:2048'],
            'inbody'=>['nullable','image','mimes:png,jpg,jpeg','max:2048'],
            'phone1'=>['required','regex:/^01[0125][0-9]{8}$/','unique:users'],
            'birth_date'=>['required','date'],
            'gender'=>['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $profile_image = request()->file('image');
        request()->file('inbody') ? $inbody = CustomHelperFunctions::storeImage( request()->file('inbody') ,'\images\inbody/') : $inbody = null;



        $data['image'] = CustomHelperFunctions::storeImage( $profile_image ,'\images\users_images/');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone1'=>$data['phone1'],
            'birth_date'=>$data['birth_date'],
            'gender'=>$data['gender'],
            'image'=> $data['image'],
            'inbody'=> $inbody,
        ]);
    }
}
