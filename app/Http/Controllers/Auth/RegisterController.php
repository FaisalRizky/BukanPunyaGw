<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Mail;
use App\Quotation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Crypt;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function usersubmit(Request $request){
      $registeredemail=db::select("call emailverify('$request->imel')");
      $registereduname=db::select("call userverify('$request->uname')");

      if ($registeredemail!=null || $registereduname!=null){
        return redirect('/pendaftaran')->with('registered','email/username sudah digunakan');
      }
     $password = $request->pass;
     $enkripass = hash::make($password);
     //$pengguna=DB::unprepared("CALL tambahuser('$request->name','$request->imel','$request->uname','$enkripass')");
     $user = User::create([
         'nama' => $request->name,
         'username' => $request->uname,
         'email' => $request->imel,
         'password' => $request->pass,
     ]);

      Mail::to($request->imel)->send(new VerifyEmail($user));
     return redirect('/');
   }
   public function verify()
{
   if (empty(request('token'))) {
       // if token is not provided
       return redirect('/pendaftaran');
   }
   // decrypt token as email
   $decryptedEmail = Crypt::decrypt(request('token'));
   //dd($decryptedEmail);
   // find user by email
   $user = DB::SELECT("CALL emailverify('$decryptedEmail')");
   //$user = User::whereEmail($decryptedEmail)->first();
   //dd($user);
   $user=$user[0];
   //dd($user);
   if ($user->status == 'activated') {
       // user is already active, do something
       return redirect('/')->with('emailalready','Email sudah diaktifkan');
   }
   // otherwise change user status to "activated"
   $update=db::unprepared("call statusverifying('$decryptedEmail')");
 // $user->status = 'activated';
  // $user->save();
   // autologin
  // Auth::loginUsingId($user->id);
   return redirect('/');
}
   public function pendaftaran(){
     return view('daftaruser');
   }
   public function store(Request $request)
{
    // validate request data
    $this->validate($request, [
        'name' => 'required|string|max:50',
        'uname' => 'required|string|max:50',
        'email' => 'required|email|max:100|unique:users,email',
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password',
    ]);
    DB::transaction(function () use ($request) {
        // save into table
        $user = User::create([
            'name' => $request->name,
            'username' => $request->uname,
            'email' => $request->imel,
            'password' => bcrypt($request->pass),
        ]);
        // send email verification
        Mail::to($user->email)->send(new VerifyEmail($user));
    });
    // redirect to home
    return redirect('/');
}
}
