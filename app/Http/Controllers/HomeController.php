<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\User;
use App\Comment;
use Carbon\Carbon;

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
    $take1 = Blog::orderBy('created_at','desc');

    $take = Comment::get();
    if($month = request('month')){
        $take1->whereMonth('created_at',Carbon::parse($month));
    }

    if($year = request('year')){
        $take1->whereYear('created_at',$year);
    }

    $take1 = $take1->get();

    $archives = Blog::selectRaw('year(created_at) year,monthname(created_at) month, count(*) published')
    ->orderByRaw('min(created_at) desc')
    ->groupBy('year','month')
    ->get();

    return view('home',compact('take','take1','archives'));
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
    public function addComment(Blog $blog){
        $this->validate(request(),[
            'commentBody' => 'required'
        ]);
        $blog->addIt(request('commentBody'));
        return redirect('/home');
    }
}
