<?php

namespace App\Http\Controllers;

use App\Profile;
use App\user;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $profile = DB::table('users')
                        ->join('profiles', 'users.id', '=', 'profiles.user_id') //join two tables
                        ->select('users.*','profiles.*')
                        ->where(['profiles.user_id'=>$user_id])
                        ->first();
        $posts = Post::paginate(5);
        //return $posts;
        //exit(); //pang testing
       
        return view('home', ['profile'=>$profile, 'posts' => $posts]);
    }
}
