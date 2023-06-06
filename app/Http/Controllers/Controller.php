<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use PDO;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function create(){
        if(auth()->check()){
            $cars=Car::all();
            return view('dashboard',["mobil"=>$cars]);
        }
        return redirect()->to(route('sessCreate'));
    }
}
