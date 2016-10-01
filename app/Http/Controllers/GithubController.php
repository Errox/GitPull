<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use GrahamCampbell\GitHub\Facades\GitHub;

class GithubController extends Controller
{
    public function index(){

        try{
            $info = GitHub::repo()->commits()->all('Errox', 'Project', array('sha' => 'master'));;

            dd($info);
        }catch (\Exception $e) {
            dd('Caught exception: ',  $e->getMessage());
        }

    }

}
