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


class newsController extends Controller
{
    public function detail($id)
    {
    $news=DB::select("CALL DETAIL_NEWS($id)");
    $pops=DB::select("CALL populer()");
    $komentar=DB::select("CALL komenperpost($id)");
    $author=DB::select("CALL authorcontent($id)");
      $user=Session::get('useraccount');
    return view('news')->with("news",$news)->with("pops",$pops)->with("komen",$komentar)->with("id",$id)->with('author',$author)->with('useraccount',$user);
  }
  public function about(){
    $pops=DB::select("CALL populer()");

    $author=DB::select("CALL authorprofile()");
    return view('about')->with("pops",$pops)->with('author',$author);
  }

   public function searching(Request $request){

     $query = $request->get('cari');
     $news=DB::select("CALL populer()");
        $hasil = DB::table('news')->where('judul', 'LIKE', '%' . $query . '%')->orWhere('kategori','LIKE','%' . $query . '%')->paginate(5);
        $count = DB::table('news')->where('judul', 'LIKE', '%' . $query . '%')->orWhere('kategori','LIKE','%' . $query . '%')->count();
        return view('result')->with("query",$query)->with("pops",$news)->with("list",$hasil)->with("count",$count);
    }
   public function posting(Request $request){

    if(!is_null($request->file('imgSrc'))){

     $destinationPath="public/img";
     // $movea = $request->file('imgSrc')->move($destinationPath,$request->file('imgSrc')->getClientOriginalName());
     //            $url_file = "{$request->file('imgSrc')->getClientOriginalName()}";

     $file = $request->file('imgSrc');
     $extension = $file->getClientOriginalName();
     $path = public_path().'/img';
     $uplaod = $file->move($path,$extension);
     $news=DB::unprepared("CALL post('$request->isi', '$request->judul','$extension','$request->kategori','$request->penulis')");

}
     return redirect('/dashboard');
   }
   public function edit($id){

      $data=DB::select("CALL DETAIL_NEWS($id)");
      return view('edit')->with("news",$data);
}

   public function ulaskomen(Request $request){
     $baru=Session::get('profil');
    if (Session::get('login')){
     $komenlist=DB::select("CALL daftarkomen()");
     $daftar=DB::table('comment')->orderBy('id','desc')->paginate(15);
     return view('komentar',['daftarkomentar'=>$daftar])->with("daftar",$komenlist)->with('profil',$baru);
   }
   else{
     return redirect('/login')->with('authlogin','Anda harus login dahulu');
   }
 }
   public function approval(Request $request){
     $approve=DB::select("CALL approval($request->idkomen)");
     return redirect()->back()->with('Successio','Komentar Disetujui');
   }
   public function disapproval(Request $request){
     $disapprove=DB::select("CALL disapproval($request->idkomen)");
     return redirect()->back()->with('Successino','Persetujuan Komentar Dibatalkan');
   }

   public function deletecomment(Request $request){
     $komen=DB::select("CALL deletecomment($request->idkomen)");
     return redirect()->back()->with('Success', 'Berhasil Dihapus!');
   }
   public function newslist(){
     $userdata=Session::get('useraccount');
     $news=DB::select("CALL newslist()");
     $users = DB::table('news')->orderBy('id', 'desc')->paginate(5);
     $pops=DB::select("CALL populer()");
     return view('homepage',['users' => $users])->with("list",$news)->with("pops",$pops)->with('useraccount',$userdata);
   }
   public function komentar(Request $request){
     if(session::get('useraccount')){

         $komen=DB::unprepared("CALL komentar('$request->isikomen','$request->namakomen','$request->avatarkomen','$request->id_post',$request->statusp,
         '$request->userp')");
         return redirect()->back()->with('Success','Komentar anda telah diterima');
     }
       elseif(!is_null($request->file('avatarkomen'))){

          $destinationPath="public/avatar";
          // $movea = $request->file('imgSrc')->move($destinationPath,$request->file('imgSrc')->getClientOriginalName());
          //            $url_file = "{$request->file('imgSrc')->getClientOriginalName()}";
          $file = $request->file('avatarkomen');
          $extension = $file->getClientOriginalName();
          $path = public_path().'/avatar';
          $uplaod = $file->move($path,$extension);
     $komen=DB::unprepared("CALL komentar('$request->isikomen','$request->namakomen','$extension','$request->id_post','0','noneuser')");
   }
     else{
  $komen=DB::unprepared("CALL komentar('$request->isikomen','$request->namakomen','','$request->id_post','0','noneuser')");
     }
     return redirect()->back()->with('Success', 'Komentarmu akan di cek terlebih dahulu oleh admin :D');
   }
   public function index()
    {

    }
    public function newscat($kategori){
$pops=DB::select("CALL populer()");

  $user=Session::get('useraccount');
      $news = DB::table('news')->wherekategori($kategori)->orderBy('id', 'desc')->paginate(5);
      return view('kat',['list' =>$news])->with("kategori",$kategori)->with("pops",$pops)->with('useraccount',$user);
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
