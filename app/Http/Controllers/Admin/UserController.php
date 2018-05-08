<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index(Request $request){
        $pageSize = $request->pagesize == null ? 10 : $request->pagesize;
        $fullUrl = $request->fullUrl();
        $keyword = $request->keyword;
        $addPath = "";
    	if(!$keyword){
           $users = User::paginate($pageSize);
           $addPath .= "?pagesize=$pageSize";
        }else{
            $users = User::where('email', 'like', "%$keyword%")->paginate($pageSize);
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
            
        }
        $users->withPath($addPath);
        return view('admin.user.index', compact('users', 'keyword', 'fullUrl', 'pageSize'));
    }  
    public function remove($id){
        $user = User::find($id);
        if(!$user) return view('admin.404');
        $user->delete();
        return redirect(route('user.index'));
    }

}
