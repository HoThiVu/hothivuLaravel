<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Manufacture extends Model
{
  
    use HasFactory;
    protected $table='manufactures';
    protected $fillable=['name'];
    public function car()
    {
        return $this->hasMany(Car::class,'manufactures_id','id');
    }
 
}
