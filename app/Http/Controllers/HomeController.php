<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(){
        return view('sharepost');
    }//end method

    public function index()
    {
        return view('pages.home');

    }
}
