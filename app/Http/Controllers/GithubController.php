<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GrahamCampbell\GitHub\Facades\GitHub;

use App\Http\Requests;

class GithubController extends Controller
{
    public function index(){

        try{
            $info = GitHub::repo()->show('Erreox', 'Forum');

            dd($info);
        }catch (\Exception $e) {
            dd('Caught exception: ',  $e->getMessage());
        }

    }

}
