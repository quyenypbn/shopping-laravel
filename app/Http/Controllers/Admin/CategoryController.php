<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductType;
use App\Http\Requests\SaveCategoryRequest;
use DB;

class CategoryController extends Controller
{
    public function index(Request $request){
        $pageSize = $request->pagesize == null ? 10 : $request->pagesize;
        $fullUrl = $request->fullUrl();
        $keyword = $request->keyword;
        $addPath = "";
    	if(!$keyword){
             $cates  = DB::table('products')
                     ->join('type_products', 'type_products.id', '=', 'products.id_type')
                     ->select('products.*', 'type_products.name as type_product')
                     ->paginate($pageSize);
           // $cates = Product::paginate($pageSize);
           $addPath .= "?pagesize=$pageSize";
        }else{
            $cates  = DB::table('products')
                    ->where('products.name', 'like', "%$keyword%")
                     ->join('type_products', 'type_products.id', '=', 'products.id_type')
                     ->select('products.*', 'type_products.name as type_product')
                     ->paginate($pageSize);
            // $cates = Product::where('name', 'like', "%$keyword%")->paginate($pageSize);
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
            
        }
        $cates->withPath($addPath);
        return view('admin.cate.index', compact('cates', 'keyword', 'fullUrl', 'pageSize'));
    }

    public function add(){
        $model = new Product();
        $cates  = DB::table('products')
                     ->join('type_products', 'type_products.id', '=', 'products.id_type')
                     ->select('products.*', 'type_products.name as type_product')
                     ->get();

        $type_pro = ProductType::all();
        return view('admin.cate.form', compact('model', 'cates','type_pro'));
    }

     public function checkName(Request $request){
        $cate = Product::where('name', $request->name)->first();
        if($cate && $cate->id == $request->id){
            return response()->json(true);
        }
        $result = $cate == false ? true : false;
        return response()->json($result);
    }

	public function edit($id){
        $model = Product::find($id);
         if(!$model) return view('admin.404');
          $cates  = DB::table('products')
                     ->join('type_products', 'type_products.id', '=', 'products.id_type')
                     ->select('products.*', 'type_products.name as type_product')
                     ->get();

         $type_pro = ProductType::all();
        return view('admin.cate.form', compact('model', 'cates','type_pro'));
    }
    public function save(SaveCategoryRequest $request){
        if($request->id){
            $model = Product::find($request->id);
            if(!$model) return view('admin.404');
        }else{
            $model = new Product();
        }
        $model->fill($request->all());
        $model->new = $request->new == 1 ? 1 : 0;
        //upload file
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = uniqid()."-".$file->getClientOriginalName();
            // dd($fileName);
            $file->storeAs('uploads',$fileName);
            // dd('done');
            $model->image = 'uploads/'.$fileName;
        }
        $model->save();
        return redirect(route('cate.index'));
        // $cates = Product::all();
        // return view('admin.cate.form', compact('model', 'cates'));
    }

    public function remove($id){
        $cate = Product::find($id);
        if(!$cate) return view('admin.404');
        $cate->delete();
        return redirect(route('cate.index'));
    }

}
