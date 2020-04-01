<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
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
        return view('home');
    }

    public function welcome()
    {
        $posts = Post::all();
        
        $id = auth()->user()->id;
        return view('welcome', ['posts' => $posts],['id'=>$id]);
        
        
    }
}
