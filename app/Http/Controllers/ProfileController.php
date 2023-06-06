<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public static function admincheck(): bool
    {
        if (auth()->user()->telepon == '0822' || auth()->user()->telepon == '085215168475' || auth()->user()->telepon == "081310887676") {
            return true;
        } else {
            return false;
        }
    }
    public function create()
    {
        if (auth()->check()) {
            if ($this->admincheck()) {
                return view('Admin.profile');
            } else {
                return view('User.profile');
            }
        } else {
            return redirect()->to(route('dashboard'));
        }
    }
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate(request(), [
            'nama' => 'required',
            'telepon' => 'required',
            'nik' => 'required',
            'kota_asal' => 'required'
        ]);

        $user = User::find(Auth::user()->id);
        $user->nama = $request->get('nama');
        $user->nik = $request->get('nik');
        $user->telepon = $request->get('telepon');
        $user->kota_asal = $request->get('kota_asal');
        date_default_timezone_set('Asia/Jakarta');
        $user->updated_at = date('Y-m-d H:i:s');

        $user->save();

        return redirect()->to(route('profView'));
    }
}