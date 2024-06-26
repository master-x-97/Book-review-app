<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //this method will show home page
    public function index( Request $request){
        $books= Book::orderBy("created_at","desc");
        if(!empty($request->keyword)){
            $books= $books->where("title",'like','%'.$request->keyword."%");
        }
        $books=$books->where("status",1)->paginate(8);


        return view('home',[
            'books'=> $books
        ]);
    }
}