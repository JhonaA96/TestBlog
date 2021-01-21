<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){

        /* Se obtienen los post */
        $new = Post::latest()->get();

        return view('inicio.index', compact('new'));
    }
}
