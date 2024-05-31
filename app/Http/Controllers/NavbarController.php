<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function getButtonOptions(){
        return view('navbar.options');
    }
}
