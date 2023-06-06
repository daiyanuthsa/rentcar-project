<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    public function histmgmt(){
        if(auth()->check()){
            $trans=CarsUsers::where('user_id',auth()->id())->get();
            $cars=Car::all();
            return view('riwayat',['trans'=>$trans,'cars'=>$cars]);
        }
        return Redirect::route('dashboard');
    }
    public function histhist(Request $request){
        if(auth()->check()){
            if ($request->get('submit')=="Batal"){
                $orders=CarsUsers::find((int)$request->get('id'));
                $orders->batal=true;
                $orders->save();
                return redirect()->to(route('userCreateHist'));
            }else if ($request->get('submit')=="Menunggu Konfirmasi") {
                return view('Penyewaan.waiting', ['pesan' => $request->get('id')]);
            }else if($request->get('submit')=="Pembayaran Berhasil"){
                return view('Penyewaan.berhasil');
            }else if ($request->get('submit')=="Bayar"){
                return view('Penyewaan.pembayaran', ['pesan' => $request->get('id')]);
            }
        }
        return Redirect::route('dashboard');
    }
    public function histpay(Request $request){
        $pays=CarsUsers::where([['id','=',$request->get('id')],['user_id','=',auth()->id()]])->first();
        $pays->foto_bukti=$request->get('foto');
        $pays->lunas=true;
        $pays->save();
        return redirect()->to(route('userCreateHist'));
    }
    public function formmgmt(Request $request){
        $cars=Car::find($request->get("id"));
        return view('Penyewaan.formulir',['mobil'=>$cars]);
    }
    public function formstore(Request $request)
{
    $iduser = auth()->id();
    $idcar = $request->get('id');
    $datenow = date('Y-m-d H:i:s', strtotime($request->get('pengambilan')));
    $datelater = date('Y-m-d H:i:s', strtotime($request->get('pengembalian')));
    $harga = DB::table('cars')->where('id', '=', $idcar)->pluck('harga');

    if (count($harga) > 0) {
        $harga = $harga[0];
    } else {
        // Handle the case when $harga array is empty
        // You can set a default value or return an error message
        // Example:
        // return back()->with('error', 'Invalid car ID');
        return redirect()->to(route('userCreateHist'));
    }

    $date1 = strtotime($datenow);
    $date2 = strtotime($datelater);
    $hari = abs($date2 - $date1) / 86400;
    $harga = $hari * $harga;

    DB::table('cars_users')->insert([
        'peminjaman' => $datenow,
        'pengembalian' => $datelater,
        'harga' => $harga,
        'car_id' => $idcar,
        'user_id' => $iduser,
        'created_at' => $datenow,
        'updated_at' => $datenow
    ]);

    return redirect()->to(route('userCreateHist'));
}

    // public function formstore(Request $request){
    //     $iduser=auth()->id();
    //     $idcar=$request->get('id');
    //     $datenow=date('Y-m-d H:i:s',strtotime($request->get('pengambilan')));
    //     $datelater=date('Y-m-d H:i:s',strtotime($request->get('pengembalian')));
    //     $harga=DB::table('cars')->where('id','=',$idcar)->pluck('harga');
    //     $date1=strtotime($datenow);
    //     $date2=strtotime($datelater);
    //     $hari=abs($date2-$date1)/86400;
    //     $harga=$hari*$harga[0];
    //     DB::table('cars_users')->insert([
    //         'peminjaman'=>$datenow,
    //         'pengembalian'=>$datelater,
    //         'harga'=>$harga,
    //         'car_id'=>$idcar,
    //         'user_id'=>$iduser,
    //         'created_at'=>$datenow,
    //         'updated_at'=>$datenow
    //     ]);
    //     return redirect()->to(route('userCreateHist'));
    // }
}
