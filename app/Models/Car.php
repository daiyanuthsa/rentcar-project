<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'mesin',
        'harga',
        'jumlah',
        'foto'
    ];
    public function users(){
        return $this->belongsToMany(User::class,CarsUser::class);
    }
}
