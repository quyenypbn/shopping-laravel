<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table= "products";
     public $fillable = ['name', 'id_type', 'description', 'unit_price', 'promotion_price', 'image','quantity', 'unit','new','tinh_trang'];
   

    public function product_type(){
    	return $this -> belongsTo('App\ProductType', 'id_type','id');
    }
     public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
    // public function getParentName(){
    // 	$parent = self::find($this->id_type);
    // 	if(!$parent){
    // 		return null;
    // 	}
    // 	return $parent->name;
    // }
}
