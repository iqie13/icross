<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IcrossController extends Controller
{
    public function index() {
        return view('icross/index');
    }

    public function directions(Request $req) {
        echo $req;
    }
}
