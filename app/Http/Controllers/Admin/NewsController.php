<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Http\Requests\SaveNewsRequest;

class NewsController extends Controller
{
    public function index(Request $request){
        $pageSize = $request->pagesize == null ? 10 : $request->pagesize;
        $fullUrl = $request->fullUrl();
        $keyword = $request->keyword;
        $addPath = "";
        if(!$keyword){
           $news = News::paginate($pageSize);
           $addPath .= "?pagesize=$pageSize";
        }else{
            $news = News::where('name', 'like', "%$keyword%")->paginate($pageSize);
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
            
        }
        $news->withPath($addPath);
        return view('admin.news.index', 
                        compact('news', 'keyword', 'fullUrl', 'pageSize'));
    }

    public function add(){
        $model = new News();
        $news = News::all();
        return view('admin.news.form', compact('model', 'news'));
    }

    public function checkTitle(Request $request){
        $cate = News::where('title', $request->name)->first();
        if($cate && $cate->id == $request->id){
            return response()->json(true);
        }
        $result = $cate == false ? true : false;
        return response()->json($result);
    }


	public function edit($id){
        $model = News::find($id);
   		 if(!$model) return view('admin.404');
        $news = News::all();
        return view('admin.news.form', compact('model', 'news'));
    }
    public function save(SaveNewsRequest $request){
        if($request->id){
            $model = News::find($request->id);
            if(!$model) return view('admin.404');
        }else{
            $model = new News();
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
        return redirect(route('news.index'));
    }
    public function remove($id){
        $news = News::find($id);
        if(!$news) return view('admin.404');
        $news->delete();
        return redirect(route('news.index'));
    }
}
