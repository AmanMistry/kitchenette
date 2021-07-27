<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    use HasFactory;
    protected $fillable=['flat_no','area','landmark','pincode','package','phone','ord_date','pack_type','email','payment'
    ,'menu_id','payment','menu_id','seller_id','user_id','city_id'];

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
    public function city(){
        return $this->belongsTo('App\Models\City');
    }
    public function menus(){
        return $this->belongsTo('App\Models\Menu');
    }
}
