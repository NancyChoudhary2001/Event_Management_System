<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Currency;

class Event extends Model
{
    protected $fillable =[
        'name',
        'description',
        'role',
        'currency_id',
        'price',

    ];
    public $timestamps = false;
    public function currency(){
        return $this->hasMany(Currency::class,'currency_id','id');
    }
}
