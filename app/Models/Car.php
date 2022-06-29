<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manufacture;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $fillable =['hãng','màu','produced_on','image','manufactures_id'];

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class,'manufactures_id','id');
    }
}
