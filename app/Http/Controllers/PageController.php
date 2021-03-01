<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        
        return view('guests.index');
    }

    //show about
    public function about()
    {
        
        return view('guests.about');
    }

    //show contacts
    public function contacts()
    {
        
        return view('guests.contacts');
    }
}
