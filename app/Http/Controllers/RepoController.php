<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RepoController extends Controller
{
    public function index(){
        return view('newrepo');
    }

    public function store(Request $request){
        dd("derp");
    }
}
