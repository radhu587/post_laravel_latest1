<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\User;
use App\Comment;

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
    $take1 = Blog::orderBy('created_at','desc')->get();
    $take = Comment::get();
      return view('home',compact('take','take1'));
    }

    public function build($id){
        Blog::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => $id,
        ]);
        return redirect('/home');
    }

    public function show(){
        return view('blog.show');
    }
    
    public function create(){
        return view('blog.create');
    }

    public function myPost($id){
        $take = Blog::where('user_id',$id)->get();
        return view('blog.profile',compact('take'));
    }

    public function edit(Blog $blog){
        return view('blog.edit',compact('blog'));
    }

    public function delete($id){
        $take = Blog::where('id',$id)->delete();
        return redirect('/home');
    }

    public function saveChange($id){
        $this->validate(request(),[
            'editTitle' => 'required',
            'editBody' => 'required'
        ]);
        $make = Blog::where('id',$id);
        $make->update([
            'title' => request('editTitle'),
            'body' => request('editBody')
        ]);
        $make1 = trim(Blog::where('id',$id)->pluck('user_id'),']');
        $make2 = trim($make1,'[');
        $take = '/home/showMyPost/'.$make2;
        return redirect($take);
    }
    public function addComment($id){
        $this->validate(request(),[
            'commentBody' => 'required'
        ]);
        Comment::create([
             'blog_id' => $id,
             'body' => request('commentBody'),
             'user_id' => auth()->id(),
             'user_name' => auth()->user()->name
        ]);
        return redirect('/home');
    }
}
