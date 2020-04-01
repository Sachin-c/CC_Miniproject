<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PostController extends Controller
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
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:120',
            'content' => 'required'
        ]);
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $fileNameToStore= strval($request->input('content'));
        $fileNameToStore = str_replace(' ', '_', $fileNameToStore);


        $process=new Process("../../../public/python3 ../../../public/NLP.py {$fileNameToStore}");
         $process->run();
        
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        
        
        $x= $process->getOutput();
        $post->Review=$x;
        Auth::user()->posts()->save($post);
        return redirect('/');
    }
}
