<?php

namespace App\Http\Controllers;


//use App\Models\Post;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    function index(){
        return view('pages.index');

    }
    function about()
    {
        return view('pages.about');
    }
    function services()
        {
            return view('pages.services');
        }

}
