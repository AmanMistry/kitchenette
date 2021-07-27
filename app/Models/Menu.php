<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','description','photo','cat_id','city_id','vendor_id','price','offer_price','discount','status'];

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
