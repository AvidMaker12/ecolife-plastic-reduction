<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function index(){
        $pageTitle = 'EcoLife Plastic Waste Reduction App';
        // return view('welcome', compact('pageTitle'));
        return view('welcome')->with('pageTitle', $pageTitle);
    }

    public function about(){
        $pageTitle = 'About - EcoLife';
        return view('about')->with('pageTitle', $pageTitle);
    }
}
