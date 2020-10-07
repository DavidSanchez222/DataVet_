<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{DocumentType, Role, User};
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
            'lastname' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255'],
            'number_id' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'min:7'],
            'document_type' => ['required', 'exists:document_types,id'],
            'role' => ['required', 'exists:roles,id'],
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
            'lastname' => $data['lastname'],
            'nickname' => $data['nickname'],
            'number_id' => $data['number_id'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'document_type_id' => $data['document_type'],
        ]);
    }

    public function showRegistrationForm()
    {
        $document_types = DocumentType::orderBy('abbreviation', 'ASC')->get();
        $roles = Role::orderBy('name', 'ASC')->get();

        return view('auth.register',compact('document_types', 'roles'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // return $this->registered($request, $user)?: redirect($this->redirectPath());

        return redirect()->route('settings.users.index')->with('success', 'Usuario creado exitosamente!');
    }
}
