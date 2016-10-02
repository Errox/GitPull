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
    	return view('/beheer')->with(compact('repositories', 'master', 'repos', 'collab'));
    }
    public function show($id){

        try{
            $repo = Repositorie::find($id);
            dd($repo);
            $commits = GitHub::repo()->commits()->all($repo->github_user, $repo->github_repo, array('sha' => 'master'));
            dd($commits);
            $repo = GitHub::repo()->show($repo->github_user, $repo->github_repo);
            dd($commits);
            return view('repoShow', compact('commits', 'repo'));

        }catch (\Exception $e) {
            \flash('Oops something went wrong, if you found the developers, show them this : '.$e->getMessage(), 'danger');
            return redirect()->back();
        }
    }
}