<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function about(){
        return View("About");
    }

    public function contact(){
        return View("Contact");
    }
}
