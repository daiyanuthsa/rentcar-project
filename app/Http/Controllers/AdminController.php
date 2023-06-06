<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarsUsers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function create(){
        if(auth()->check()){
            if(ProfileController::admincheck()){
                return view('Admin.administrasi');
            }
        }
        return Redirect::route('dashboard');
    }
    public function carmgmt(){
        if(auth()->check()){
            if(ProfileController::admincheck()){
                $cars=Car::all();
                return view('Admin.aturMobil',['cars'=>$cars]);
            }
        }
        return Redirect::route('dashboard');
    }
    public function caradd(Request $request){
        if(auth()->check()){
            if(ProfileController::admincheck()){
                $this->validate(request(),[
                    'nama'=>'required',
                    'mesin'=>'required',
                    'harga'=>'required',
                    'jumlah'=>'required',
                    'foto'=>'required'
                ]);
                try{
                    Car::create(request(['nama','mesin','harga','jumlah','foto']));
                    return Redirect::back()->with('succ','Mobil berhasil ditambahkan');
                }catch(Exception $e){
                    return Redirect::back()->with('error',$e->getMessage());
                }
            }
        }
        return Redirect::route('dashboard');
    }
    public function cardel(Request $request){
        if(auth()->check()){
            if(ProfileController::admincheck()){
                $query=DB::table('cars')->where('id','=',$request->get('id'))->delete();
                if($query<=0){
                    return Redirect::back()->with('error','ID Mobil tidak ditemukan');
                }
                return Redirect::back()->with("message","Mobil berhasil dihapus");
            }
        }
        return Redirect::route('dashboard');
    }
    public function carup(Request $request){
        if(auth()->check()){
            if(ProfileController::admincheck()){
                $this->validate(request(),[
                    'id'=>'required'
                ]);
                $query=Car::find($request->get('id'));
                if($request->get('nama')!=null){
                    $query->nama=$request->get('nama');
                }
                if($request->get('mesin')!=null){
                    $query->mesin=$request->get('mesin');
                }
                if($request->get('foto')!=null){
                    $query->foto=$request->get('foto');
                }
                if($request->get('harga')!=null){
                    $query->harga=$request->get('harga');
                }
                if($request->get('jumlah')!=null){
                    $query->jumlah=$request->get('jumlah');
                }
                $query->save();
                return redirect()->to(route('adminCreateMobil'));
            }
        }
        return Redirect::route('dashboard');
    }
    public function ordermgmt(){
        if(auth()->check()){
            if(ProfileController::admincheck()){
                $orders=CarsUsers::all();
                $cars=Car::all();
                return view('Admin.pesanan',['orders'=>$orders,'cars'=>$cars]);
            }
        }
        return Redirect::route('dashboard');
    }
    public function orderorder(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if(auth()->check()){
            if(ProfileController::admincheck()){
                if($request->get('submit')=="Konfirmasi"){
                    $this->ordercfrm((int)$request->get('id'));
                }else if($request->get('submit')=="Batal"){
                    $this->ordercncl((int)$request->get('id'));
                }else if($request->get('submits')=="Konfirmasi"){
                    $this->orderdone((int)$request->get('id'));
                }
                return redirect()->to(route('adminCreatePesanan'));
            }
        }
        return Redirect::route('dashboard');
    }
    private function ordercfrm(int $id){
        $orders=CarsUsers::find($id);
        $orders->konfirmasi=true;
        $orders->save();
    }
    private function ordercncl(int $id){
        $orders=CarsUsers::find($id);
        $orders->batal=true;
        $orders->save();
    }
    private function orderdone(int $id){
        $orders=CarsUsers::find($id);
        $orders->selesai=true;
        $orders->save();
    }
}
