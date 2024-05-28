<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $auth_id= auth()->id();
       $user=User::where('id',$auth_id)->first();
       $user_role=$user->role;
       if($user_role==1){
        return view('backend.dashboard');
       }elseif($user_role==0)
       $category=category::where('isactive','1')->get();
        return view('frontend.index',compact('category'));
    }
}

