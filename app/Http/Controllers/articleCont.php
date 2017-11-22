<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;

class articleCont extends Controller
{
    //
    public function addArticle(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$article = new Article();
    		$article->title = $request->input('title');
    		$article->body = $request->input('body');
    		$article->author =Auth::user()->id;
    		$article->save();
    		//rediect('');
    	}
    	return view('newArticle');
    }
}
