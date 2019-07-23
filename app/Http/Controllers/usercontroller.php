<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Quotation;


class usercontroller extends Controller
{
  public function editprofile(Request $request){
if(!is_null($request->file('avatarp'))){

 $destinationPath="public/avataruser";
 // $movea = $request->file('imgSrc')->move($destinationPath,$request->file('imgSrc')->getClientOriginalName());
 //            $url_file = "{$request->file('imgSrc')->getClientOriginalName()}";

 $file = $request->file('avatarp');
 $extension = $file->getClientOriginalName();
 $path = public_path().'/avataruser';
 $uplaod = $file->move($path,$extension);
 $profile=DB::unprepared("CALL editprofile('$request->namap', '$request->emailp','$extension','$request->passwordp','$request->usernamep')");

  }
  else{
    $profile=DB::unprepared("CALL editprofilex('$request->namap', '$request->emailp','$request->passwordp','$request->usernamep')");
}
  Session::forget('useraccount');
  $users = DB::select("CALL sessionrefresh('$request->usernamep')");
  Session::put('useraccount',$users);
  return redirect('/editprofile')->with('sukses','Data berhasil diubah');
}

public function ubahpassword(Request $request){

$profile=DB::unprepared("CALL editprofilep('$request->passwordp','$request->usernamep')");
Session::forget('useraccount');
$users = DB::select("CALL sessionrefresh('$request->usernamep')");
Session::put('useraccount',$users);
return redirect('/editprofile')->with('sukses','Password berhasil diubah');
}
}
