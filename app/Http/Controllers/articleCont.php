<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class articleCont extends Controller
{
    //
    public function __construct()
    {

       $this->middleware('auth');
    }
    public function addArticle(Request $request)
    {
    	if($request->isMethod('post'))
    	{
            $this->validate($request,['title'=> 'required | min:25' ,'body'=>'required | min:255']);
    		$article = new Article();
    		$article->title = $request->input('title');
    		$article->body = $request->input('body');
    		$article->user_id =Auth::user()->id;
    		$article->save();
    		//rediect('');
            return redirect()->route('home');
    	}
    	return view('newArticle');
    }

    public function readArticle(Request $request,$id)
    {
        if($request->isMethod('post'))
        {
            $comment = new Comment();
            $comment->body = $request->input('body');
            $comment->user_id =Auth::user()->id;
            $comment->article_id = $id;
            $comment->save();
            //rediect('');
        }
        $ar = Article::find($id);
        return view('viewArticle',['article'=>$ar]);
    }

    public function showUserArticles()
    {
       
        $ar = Article::where('user_id',Auth::user()->id)->get();
        return view('userArticles',['articles'=>$ar]);  
    }
    public function delArticle(Request $request,$id)
    {
        $ar = Article::where('id',$id)->first();
        $ar->delete();
        return redirect()->route('show');
    }
   
}
