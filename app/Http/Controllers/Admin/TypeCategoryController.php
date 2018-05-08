<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductType;
use App\Http\Requests\SaveTypeCategoryRequest;

class TypeCategoryController extends Controller
{
     public function index(Request $request){
        $pageSize = $request->pagesize == null ? 10 : $request->pagesize;
        $fullUrl = $request->fullUrl();
        $keyword = $request->keyword;
        $addPath = "";
        if(!$keyword){
           $type_cate = ProductType::paginate($pageSize);
           $addPath .= "?pagesize=$pageSize";
        }else{
            $type_cate = ProductType::where('name', 'like', "%$keyword%")->paginate($pageSize);
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
            
        }
        $type_cate->withPath($addPath);
        return view('admin.type_cate.index', 
                        compact('type_cate', 'keyword', 'fullUrl', 'pageSize'));
    }

    public function add(){
        $model = new ProductType();
        $type_cate = ProductType::all();
        return view('admin.type_cate.form', compact('model', 'type_cate'));
    }

    public function checkName(Request $request){
        $cate = ProductType::where('name', $request->name)->first();
        if($cate && $cate->id == $request->id){
            return response()->json(true);
        }
        $result = $cate == false ? true : false;
        return response()->json($result);
    }


	public function edit($id){
        $model = ProductType::find($id);
   		 if(!$model) return view('admin.404');
        $type_cate = ProductType::all();
        return view('admin.type_cate.form', compact('model', 'type_cate'));
    }
    public function save(SaveTypeCategoryRequest $request){
        if($request->id){
            $model = ProductType::find($request->id);
            if(!$model) return view('admin.404');
        }else{
            $model = new ProductType();
        }
        $model->fill($request->all());
        // $model->new = $request->new == 1 ? 1 : 0;
        //upload file
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = uniqid()."-".$file->getClientOriginalName();
            $file->storeAs('uploads',$fileName);
            $model->image = 'uploads/'.$fileName;
        }
        $model->save();
        return redirect(route('type_cate.index'));
    }
    public function remove($id){
        $type_cate = ProductType::find($id);
        if(!$type_cate) return view('admin.404');
        $type_cate->delete();
        return redirect(route('type_cate.index'));
    }
}
