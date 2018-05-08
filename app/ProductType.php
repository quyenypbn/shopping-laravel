<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table= "type_products";
    public $fillable = ['name','description','image'];

    public function product(){
    	return $this ->hasMany('App\Product','id_type','id');
    }

    public function bill_detail(){
    	return $this -> hasMany('App\BillDetail', 'id_product', 'id');
    }
}
