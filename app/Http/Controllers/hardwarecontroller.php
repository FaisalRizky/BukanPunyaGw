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


class hardwarecontroller extends Controller
{
  public function socdetail(){
    $user=Session::get('useraccount');
    return view('hardware');
  }
  public function addsoc(Request $request){
    if(!is_null($request->file('gambarp'))){

     $destinationPath="public/soc";
     // $movea = $request->file('imgSrc')->move($destinationPath,$request->file('imgSrc')->getClientOriginalName());
     //            $url_file = "{$request->file('imgSrc')->getClientOriginalName()}";

     $file = $request->file('gambarp');
     $extension = $file->getClientOriginalName();
     $path = public_path().'/soc';
     $uplaod = $file->move($path,$extension);
     $news=DB::unprepared("CALL postsoc('$request->seriesp', '$request->namep','$request->corep','$request->tipep','$request->speedp','$request->gpup',
     '$request->manufakturp','$request->datep','$extension','$request->penulis')");

}
     return redirect('/postsoc');
  }
  public function addcpu(Request $request){
    if(!is_null($request->file('gambarp'))){

     $destinationPath="public/cpu";
     // $movea = $request->file('imgSrc')->move($destinationPath,$request->file('imgSrc')->getClientOriginalName());
     //            $url_file = "{$request->file('imgSrc')->getClientOriginalName()}";

     $file = $request->file('gambarp');
     $extension = $file->getClientOriginalName();
     $path = public_path().'/cpu';
     $uplaod = $file->move($path,$extension);
     $news=DB::unprepared("CALL postcpu('$request->namep','$request->tipep','$request->seriesp','$request->corep','$request->speedp','$request->gpup',
     '$request->manufakturp','$request->ramp','$request->datep','$extension','$request->penulis')");

}
     return redirect('/postcpu')->with('pesan','Data Berhasil Dimasukkan!');
  }
  public function detailhw($id)
  {
    $pops=DB::select("CALL socpopuler()");
    $rater=DB::select("CALL jumlahratersoc($id)");
    $review=DB::select("Call reviewpersoc($id)");
  $soc=DB::select("CALL DETAILsoc($id)");
    $baru=Session::get('useraccount');
  return view('hardware')->with("soc",$soc)->with("id",$id)->with('useraccount',$baru)->with('rater',$rater)->with("pops",$pops)->with("review",$review);
}
public function reviewsoc(Request $request){
  $verif=DB::select("call verifikasireviewsoc('$request->namap',$request->id)");
  if($verif!=null){
    return redirect()->back()->with('pesan','Anda Sudah Me-Review Hardware ini!');
  }
  else{
  $ulasan=DB::unprepared("CALL postreviewsoc('$request->namap','$request->tipep','$request->picp','$request->isip','$request->id','$request->ratingp')");
  $uprater=DB::unprepared("Call updateratingsoc()");
  return redirect()->back()->with('pesan', 'Terima kasih atas Ulasan anda');
}
}
public function editsoc($id){
  $baru=Session::get('profil');
  if (Session::get('hwadmin'))
        {
          $data=DB::select("CALL DETAILsoc($id)");
          return view('editsoc')->with("soc",$data)->with('profile',$baru);

        } elseif(session::get('login')){
          return redirect('/dashboard')->with('Unauthorized','Anda Bukan Hardware Admin');
        }
        else{

           return redirect('/login')->with('authlogin','Anda harus login dahulu');
        }
      }
public function updatesoc(Request $request){
  $baru=Session::get('profil');
  if(!is_null($request->file('gambarbaru'))){

   $destinationPath="public/soc";
   // $movea = $request->file('imgSrc')->move($destinationPath,$request->file('imgSrc')->getClientOriginalName());
   //            $url_file = "{$request->file('imgSrc')->getClientOriginalName()}";

   $file = $request->file('gambarbaru');
   $extension = $file->getClientOriginalName();
   $path = public_path().'/soc';
   $uplaod = $file->move($path,$extension);
   $news=DB::unprepared("CALL updatesoc('$request->seriesp', '$request->namep','$request->tipep','$request->speedp','$request->corep',
   '$request->manufakturp','$request->gpup','$request->datep','$extension',$request->id)");
}
else{
  $news=DB::unprepared("CALL updatesoc('$request->seriesp','$request->namep','$request->tipep','$request->speedp','$request->corep',
  '$request->manufakturp','$request->gpup'
  ,'$request->datep','$request->gambarp',$request->id)");
}
   return redirect('/dashboardsoc');
 }
public function soclist(Request $request){
      $baru=Session::get('profil');
     if (Session::get('hwadmin')){
      $soclist=DB::select("CALL listsoc()");
      return view('dashboardsoc')->with("soc",$soclist)->with('profil',$baru);
    }
    else{
      return redirect('/login')->with('authlogin','Anda harus login dahulu');
    }
  }
  public function deletesoc($id){
    $hapus=DB::unprepared("Call deletesoc($id)");
  }
  public function listsoc(Request $request){
  $soc=DB::select("Call listsoc1()");
  $soc1=DB::select("Call listsoc2()");
  $soc2=DB::select("Call listsoc3()");
  $pops=DB::select("CALL socpopuler()");

    $user=Session::get('useraccount');
  return view('soc')->with('soc',$soc)->with('soc1',$soc1)->with('soc2',$soc2)->with('pops',$pops)->with('useraccount',$user);
}
public function detailcpu($id)
{
  $pops=DB::select("CALL cpupopuler()");
  $rater=DB::select("CALL jumlahratercpu($id)");
  $review=DB::select("Call reviewpercpu($id)");
$soc=DB::select("CALL DETAILcpu($id)");
  $baru=Session::get('useraccount');
return view('detailcpu')->with("cpu",$soc)->with("id",$id)->with('useraccount',$baru)->with('rater',$rater)->with("pops",$pops)->with("review",$review);
}
public function reviewcpu(Request $request){
  $verif=DB::select("call verifikasireviewcpu('$request->namap',$request->id)");
  if($verif!=null){
    return redirect()->back()->with('pesan','Anda Sudah Me-Review Hardware ini!');
  }
  else{
  $ulasan=DB::unprepared("CALL postreviewcpu('$request->namap','$request->tipep','$request->picp','$request->isip',$request->id,'$request->ratingp')");
  $uprater=DB::unprepared("Call updateratingcpu()");
  return redirect()->back()->with('pesan', 'Terima kasih atas Ulasan anda');
}
}
public function editcpu($id){
  $baru=Session::get('profil');
  if (Session::get('hwadmin'))
        {
          $data=DB::select("CALL DETAILcpu($id)");
          return view('editcpu')->with("cpu",$data)->with('profile',$baru);

        } elseif(session::get('login')){
          return redirect('/dashboard')->with('Unauthorized','Anda Bukan Hardware Admin');
        }
        else{

           return redirect('/login')->with('authlogin','Anda harus login dahulu');
        }
      }
      public function updatecpu(Request $request){
        $baru=Session::get('profil');
        if(!is_null($request->file('gambarbaru'))){

         $destinationPath="public/cpu";
         // $movea = $request->file('imgSrc')->move($destinationPath,$request->file('imgSrc')->getClientOriginalName());
         //            $url_file = "{$request->file('imgSrc')->getClientOriginalName()}";

         $file = $request->file('gambarbaru');
         $extension = $file->getClientOriginalName();
         $path = public_path().'/cpu';
         $uplaod = $file->move($path,$extension);
         $news=DB::unprepared("CALL updatecpu('$request->seriesp', '$request->namep','$request->tipep','$request->speedp','$request->corep',
         '$request->manufakturp','$request->gpup','$request->datep','$extension','$request->ramp',$request->id)");
      }
      else{
        $news=DB::unprepared("CALL updatecpu('$request->seriesp','$request->namep','$request->tipep','$request->speedp','$request->corep',
        '$request->manufakturp','$request->gpup'
        ,'$request->datep','$request->gambarp','$request->ramp',$request->id)");
      }
         return redirect('/adminpage');
       }
       public function cpulist(Request $request){
             $baru=Session::get('profil');
            if (Session::get('hwadmin')){
             $soclist=DB::select("CALL listcpu()");
             return view('dashboardcpu')->with("cpu",$soclist)->with('profil',$baru);
           }
           else{
             return redirect('/login')->with('authlogin','Anda harus login dahulu');
           }
         }
         public function deletecpu($id){
           $hapus=DB::unprepared("Call deletecpu($id)");
         }
         public function listcpu(Request $request){
         $soc=DB::select("Call listcpu1()");
         $soc1=DB::select("Call listcpu2()");

           $user=Session::get('useraccount');
         $pops=DB::select("CALL cpupopuler()");
         return view('cpu')->with('cpu',$soc)->with('cpu1',$soc1)->with('pops',$pops)->with('useraccount',$user);
       }
       public function listgpu(Request $request){
       $soc=DB::select("Call listgpu1()");
       $soc1=DB::select("Call listgpu2()");
       $soc2=DB::select("Call listgpu3()");
         $user=Session::get('useraccount');
       $pops=DB::select("CALL gpupopuler()");
       return view('gpu')->with('gpu',$soc)->with('gpu1',$soc1)->with('gpu2',$soc2)->with('pops',$pops)->with('useraccount',$user);
       }

       public function addgpu(Request $request){
         if(!is_null($request->file('gambarp'))){

          $destinationPath="public/gpu";
          // $movea = $request->file('imgSrc')->move($destinationPath,$request->file('imgSrc')->getClientOriginalName());
          //            $url_file = "{$request->file('imgSrc')->getClientOriginalName()}";

          $file = $request->file('gambarp');
          $extension = $file->getClientOriginalName();
          $path = public_path().'/gpu';
          $uplaod = $file->move($path,$extension);
          $news=DB::unprepared("CALL postgpu('$request->namep','$request->tipep','$request->seriesp','$request->speedp','$request->boostp',
          '$request->memoryp','$request->archp','$request->directxp','$request->memspeedp','$request->membusp','$request->datep','$extension','$request->penulis',
          '$request->memtypep','$request->manufakturp')");
     }
          return redirect('/postgpu')->with('pesan','Data Berhasil Dimasukkan!');
       }
       public function deletegpu($id){
         $hapus=DB::unprepared("Call deletegpu($id)");
       }
       public function editgpu($id){
         $baru=Session::get('profil');
         if (Session::get('hwadmin')||session::get('superadmin'))
               {
                 $data=DB::select("CALL DETAILgpu($id)");
                 return view('editgpu')->with("gpu",$data)->with('profile',$baru);

               } elseif(session::get('login')){
                 return redirect('/dashboard')->with('Unauthorized','Anda Bukan Hardware Admin');
               }
               else{

                  return redirect('/login')->with('authlogin','Anda harus login dahulu');
               }
             }
       public function updategpu(Request $request){
         $baru=Session::get('profil');
         if(!is_null($request->file('gambarbaru'))){

          $destinationPath="public/gpu";
          // $movea = $request->file('imgSrc')->move($destinationPath,$request->file('imgSrc')->getClientOriginalName());
          //            $url_file = "{$request->file('imgSrc')->getClientOriginalName()}";

          $file = $request->file('gambarbaru');
          $extension = $file->getClientOriginalName();
          $path = public_path().'/gpu';
          $uplaod = $file->move($path,$extension);
          $news=DB::unprepared("CALL updategpu('$request->namep','$request->tipep','$request->seriesp','$request->speedp','$request->boostp',
          '$request->memoryp','$request->archp','$request->directxp',
          '$request->memspeedp','$request->membusp','$request->datep','$extension',
          '$request->memtypep','$request->manufakturp',$request->id)");
       }
       else{
         $news=DB::unprepared("CALL updategpu('$request->namep','$request->tipep','$request->seriesp','$request->speedp','$request->boostp',
         '$request->memoryp','$request->archp','$request->directxp','$request->memspeedp',
         '$request->membusp','$request->datep','$request->gambarp',
         '$request->memtypep','$request->manufakturp',$request->id)");
       }
          return redirect('/dashboardgpu');
        }
        public function gpulist(Request $request){
              $baru=Session::get('profil');
             if (Session::get('hwadmin')||session::get('superadmin')){
              $soclist=DB::select("CALL listgpu()");
              return view('dashboardgpu')->with("gpu",$soclist)->with('profil',$baru);
            }
            else{
              return redirect('/adminpage')->with('authlogin','Anda harus login dahulu');
            }
          }
          public function detailgpu($id)
          {
            $pops=DB::select("CALL gpupopuler()");
            $rater=DB::select("CALL jumlahratergpu($id)");
            $review=DB::select("Call reviewpergpu($id)");
          $soc=DB::select("CALL DETAILgpu($id)");
            $baru=Session::get('useraccount');
          return view('detailgpu')->with("gpu",$soc)->with("id",$id)->with('useraccount',$baru)->with('rater',$rater)->with("pops",$pops)->with("review",$review);
          }
          public function reviewgpu(Request $request){
            $verif=DB::select("call verifikasireviewgpu('$request->namap',$request->id)");
            if($verif!=null){
              return redirect()->back()->with('pesan','Anda Sudah Me-Review Hardware ini!');
            }
            else{
            $ulasan=DB::unprepared("CALL postreviewgpu('$request->namap','$request->tipep','$request->picp','$request->isip',$request->id,'$request->ratingp')");
            $uprater=DB::unprepared("Call updateratinggpu()");
            return redirect()->back()->with('pesan', 'Terima kasih atas Ulasan anda');
          }
          }
          public function reviewlist(){
            $baru=Session::get('profil');
           if (Session::get('hwadmin')||session::get('superadmin')){
            $soclist=DB::select("CALL reviewlist()");
            return view('userreview')->with("review",$soclist)->with('profil',$baru);
          }
          else{
            return redirect('/adminpage')->with('authlogin','Anda harus login dahulu');
          }
        }

        public function deletereview($id){
          $del=DB::unprepared("Call deletereview($id)");
          $uprater=DB::unprepared("Call updateratinggpu()");
          $uprater=DB::unprepared("Call updateratingsoc()");
          $uprater=DB::unprepared("Call updateratingcpu()");
        }
          }
