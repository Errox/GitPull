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

    	return view('/beheer');
    }
    public function show($id){
        $repo = Repositorie::find($id);

        try{
            $commits = GitHub::repo()->commits()->all($repo->github_user, $repo->github_repo, array('sha' => 'master'));
            $repo = GitHub::repo()->show($repo->github_user, $repo->github_repo);

            return view('repoShow', compact('commits', 'repo'));

        }catch (\Exception $e) {
            \flash('Oops something went wrong, if you found the developers, show them this : '.$e->getMessage(), 'danger');
            return redirect()->back();
        }
    }
}