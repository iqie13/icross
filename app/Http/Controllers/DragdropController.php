<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DragdropController extends Controller
{
    public function index() {
        return view('dragdrop/index');
    }
}
