<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositorie;

use GrahamCampbell\GitHub\Facades\GitHub;

use Carbon\Carbon;


class RoleController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
        Carbon::setLocale('nl');
    }
    
    public function index(){
        $repos = Repositorie::all();
       foreach($repos as $found) {
           $url = $found->repo;
           $path = parse_url($url);
           $path = $path['path'];
           $pieces = explode('/', $path);
           $index = count($pieces);
           $index -= 1;
           $account = $pieces[$index - 1];
           $repo = $pieces[$index];
           $info = GitHub::repo()->commits()->all($account, $repo, array('sha' => 'master'));
           $master[] = GitHub::repo()->show($account, $repo);
           $collab[] = GitHub::repo()->collaborators()->all($account, $repo, array('sha' => 'master'));
           //$contributors = Github::collaborators()->all($account, $repo);
           $repositories[] = $info;
       }

        //dd($collab[0][0]['login']);
    	return view('/beheer')->with(compact('repositories', 'master', 'repos', 'collab'));
    }

}