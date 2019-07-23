<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use DB;
use Session;
use Auth;
use App\Quotation;


class authcontroller extends Controller
{
    public function login(Request $request)
    {
    $user=DB::select("CALL login('$request->name', '$request->pass')");
    if ($user != null) {
      return redirect('/post')->with('authenticated','Login berhasil');
    }
    else{
      return redirect('/login')->with('failed','Login gagal');
    }

  }
  public function loginsession(){
    if (Session::get('login')){
      return redirect('/adminpage')->with('Sessionactive','Anda sudah login');
    }
    else{
      return view('loginpage');
  }
}

public function superadminpage(){
  $baru=Session::get('profil');
  if(Session::get('superadmin')){

      Session::put('hwadmin','authorized');
      Session::put('login', 'Selamat anda berhasil login');
    return view('superadminpage')->with("profil",$baru);
  }
  elseif(session::get('hwadmin')||session::get('login')){
    return redirect('/adminpage')->with('Unauthorized','Superadmin only');
  }
  else{
    return redirect('/login')->with('authlogin','You Must Login First');
}
}
public function superadminhw(){
  Session::forget('login');
  return redirect('/adminpage');
}

public function superadminnews(){
  Session::forget('hwadmin');
  return redirect('/adminpage');
}

public function authadmin(){
  $baru=Session::get('profil');
  if(Session::get('login')){
      return view('adminpage')->with("profil",$baru);
  }
  elseif(Session::get('hwadmin')){
      return view('hardwareadminpage')->with("profil",$baru);
  }
  else{
    return redirect('/login');
  }
}
public function adminregister(){
  if(Session::get('superadmin')){
    return view('addadmin');
  }
    elseif(Session::get('login')||Session::get('hwadmin')){
      return redirect('/adminpage')->with('Unauthorized','Unauthorized Admin Level');
    }
    else{
      return redirect('/login')->with('authlogin','You Must Login First');
    }
  }
  public function store(Request $request)
    {


        $users = DB::select("CALL login('$request->username','$request->pass')");
        $jenis = DB::select("CALL jenisadmin('$request->username','$request->pass')");
        $jenishw = DB::select("CALL hwadmin('$request->username','$request->pass')");

        if($users==null){

           return redirect()->back()->with('failed','Username/Password salah atau tidak terdaftar');

        }
         elseif($jenis!=null){
           Session::put('profil',$users);
           Session::put('superadmin','authorized');

           return redirect('/superadminpage');

        }

         elseif($jenishw!=null){
           Session::put('profil',$users);
           Session::put('hwadmin','Selamat anda berhasil login');
           return redirect('/adminpage');
         }

        else{
          Session::put('profil',$users);
          Session::put('login', 'Selamat anda berhasil login');
          return redirect('/adminpage');
}
}

public function authpost(){
  $baru=Session::get('profil');
 if (Session::get('login') || Session::get('superadmin'))
        {
           return view('post')->with('profile',$baru);

        } elseif(session::get('hwadmin')){
          return redirect('/dashboard')->with('Unauthorized','Anda bukan News Admin');
}
else{
           return redirect('/login')->with('authlogin','Anda harus login dahulu');
        }
      }
public function logout(Request $request) {
  Auth::logout();

    Session::flush();
  return redirect('/login');
}
public function dashboard()
{
  $baru=Session::get('profil');
  if (Session::get('login') || Session::get('superadmin'))
         {

             $news=DB::select("CALL newslist()");
             $users = DB::table('news')->orderBy('id', 'desc')->paginate(5);
             $pops=DB::select("CALL populer()");
             return view('dashboard',['users' => $users])->with("list",$news)->with("pops",$pops)->with('profil',$baru);

         }
         else {

            return redirect('/login')->with('authlogin','Anda harus login dahulu');
         }
       }
  public function editpost($id)
  {
    $baru=Session::get('profil');
      if (Session::get('login')){
    $news=DB::select("CALL DETAIL_NEWS($id)");
    $pops=DB::select("CALL populer()");
    $komentar=DB::select("CALL komenperpost($id)");
    $author=DB::select("CALL authorcontent($id)");
    return view('edit')->with("news",$news)->with("pops",$pops)->with("komen",$komentar)->with("id",$id)->with('author',$author)->with("profil",$baru);
}
else{
        return redirect('/login')->with('authlogin','Anda harus login dahulu');
}
  }
  public function update(Request $request){
    $baru=Session::get('profil');
    if(!is_null($request->file('imgSrc'))){

     $destinationPath="public/img";
     // $movea = $request->file('imgSrc')->move($destinationPath,$request->file('imgSrc')->getClientOriginalName());
     //            $url_file = "{$request->file('imgSrc')->getClientOriginalName()}";

     $file = $request->file('imgSrc');
     $extension = $file->getClientOriginalName();
     $path = public_path().'/img';
     $uplaod = $file->move($path,$extension);
     $news=DB::unprepared("CALL updatepost('$request->judul', '$request->isi','$request->penulis','$extension','$request->kategori', $request->id)");

}
     return redirect('/dashboard');
   }
   public function deleteconf($id){
     $baru=Session::get('profil');
     $news=DB::select("CALL DETAIL_NEWS($id)");
     return view('deleteconfirmation')->with("news",$news)->with('profil',$baru);
   }
   public function delete(Request $request){
     $delete=DB::select("CALL deletepost($request->id)");
     return redirect('/dashboard');
   }
   public function adminsubmit(Request $request){


    $destinationPath="public/authoravatar";
    // $movea = $request->file('imgSrc')->move($destinationPath,$request->file('imgSrc')->getClientOriginalName());
    //            $url_file = "{$request->file('imgSrc')->getClientOriginalName()}";

    $file = $request->file('foto');
    $extension = $file->getClientOriginalName();
    $path = public_path().'/authoravatar';
    $uplaod = $file->move($path,$extension);
    $news=DB::unprepared("CALL tambahadmin('$request->author','$extension','$request->data','$request->nama','$request->pass','$request->jenisadmin')");


    return redirect('/dashboard');
  }

  public function userstore(Request $request){

            $users = DB::select("CALL loginuser('$request->imel','$request->pass')");

            if($users==null){

               return redirect()->back()->with('failed','Username/Password salah atau tidak terdaftar');

            }
            elseif($users[0]->status=='pending'){
              return redirect()->back()->with('failed','Email Belum diverifikasi');

    }
    else{
      Session::put('useraccount',$users);
      Session::put('loginuser', 'Selamat anda berhasil login');
      $url=$request->get('previous');
      return redirect($url);
    }
  }
    public function userloginsession(){
      if (Session::get('useraccount')){
        return redirect('/')->with('Sessionactive','Anda sudah login');
      }
      else{
        return view('userloginpage');
    }
  }
  public function authuser(){
    $user=Session::get('useraccount');
    if(Session::get('loginuser')){
        return redirect('/');
    }
    else{
      return redirect('/userlogin');
    }
  }

  public function logoutuser(Request $request) {
  Session::flush();
    return redirect()->back();
  }

  public function editprofileuser(Request $request){
    $user=Session::get('useraccount');
    if(Session::get('loginuser')){
      return view('editprofile')->with('useraccount',$user);
    }
    else{
      return redirect('/');
    }
  }

  public function ubahpassworduser(Request $request){
    $user=Session::get('useraccount');
    if(Session::get('loginuser')){
      return view('ubahpassword')->with('useraccount',$user);
    }
    else{
      return redirect('/');
    }
  }
  public function addsoc(Request $request){
  $baru=Session::get('profil');
 if (Session::get('hwadmin'))
        {
           return view('addsoc')->with('profile',$baru);

        } elseif(session::get('login')){
          return redirect('/dashboard')->with('Unauthorized','Anda Bukan Hardware Admin');
        }
        else{

           return redirect('/login')->with('authlogin','Anda harus login dahulu');
        }
      }
      public function addcpu(Request $request){
      $baru=Session::get('profil');
     if (Session::get('hwadmin'))
            {
               return view('addcpu')->with('profile',$baru);

            } elseif(session::get('login')){
              return redirect('/dashboard')->with('Unauthorized','Anda Bukan Hardware Admin');
            }
            else{

               return redirect('/login')->with('authlogin','Anda harus login dahulu');
            }
          }
          public function addgpu(Request $request){
          $baru=Session::get('profil');
         if (Session::get('hwadmin'))
                {
                   return view('addgpu')->with('profile',$baru);

                } elseif(session::get('login')){
                  return redirect('/dashboard')->with('Unauthorized','Anda Bukan Hardware Admin');
                }
                else{

                   return redirect('/login')->with('authlogin','Anda harus login dahulu');
                }
              }




    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|string|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    // }
    //
    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\User
    //  */
    // // protected function create(array $data)
    // // {
    // //     return User::create([
    // //         'name' => $data['name'],
    // //         'password' => Hash::make($data['password']),
    // //     ]);
    // // }
}
