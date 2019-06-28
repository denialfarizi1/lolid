<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Followed;

use Mail;
use Illuminate\http\request;

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
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
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
        /*
        $file       = file('image_profil');
        $ext        = $file->getClientOriginalExtension();

        $dateTime   = date('Ymd_his');
        $newName    = 'image_profil_'.$dateTime.'.'.$ext;
        
        $file->move(storage_path(env('PATH_IMAGE_PROFIL')), $newName);
       */
        //dd($data);
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'hp' => $data['hp'],
            'alamat' => $data['alamat']
        ]);
       
        
       /*
        $user= DB::table('users')->get();
        $file       = $request->file('image_profil');
        $ext        = $file1->getClientOriginalExtension();

        $dateTime   = date('Ymd_his');
        $newName    = 'image_profil_'.$dateTime.'.'.$ext;

        $file->move(storage_path(env('PATH_IMAGE_PROFIL')), $newName);
        $user->name             = $request->name;
        $user->email            = $request->email;
        $user->password       = bcrypt($request->password);
        $user->hp            = $request->email;
        $user->alamat            = $request->alamat;
        $user->image_profil            = $newName;

        $user->save();
        */
        return redirect('login');
        
    }

    public function register(Request $request){
        $input = $request->all();
        $validator = $this->validator($input);

        if($validator->passes()){
            $user = $this->create($input)->toArray();
            $user['link'] = str_random(30);

            DB::table('users_activations')->insert(['id_user' => $user['id'], 'token' => $user['link']]);
            Mail::send('mail.activation', $user, function($message) use ($user) {
              $message->to($user['email']);
              $message->subject('Lol ID Shop - Activation Code');
          });
            return redirect()->to('login')->with('Success',"Kami sudah mengirim kode verifikasi ke email anda ");
        }
        return back()->with('Error', $validator->errors());
    }
    public function userActivation($token){
        $check = DB::table('users_activations')->where('token', $token)->first();
        if (!is_null($check)) {
            $user = User::find($check->id_user);
            if ($user->is_activated == 1){
            return redirect()->to('login')->with('Success', "Akun Anda sudah aktif");
             }
            $user->update(['is_activated' => 1]);
            DB::table('users_activations')->where('token', $token)->delete();
            return redirect()->to('login')->with('Success', "Akun Anda telah diaktifkan");
        }
        return redirect()->to('login')->with('Warning',"alamat token salah");
    }
}
