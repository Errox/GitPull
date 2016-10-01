<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositorie;
use App\Http\Requests;

class RepoController extends Controller
{

    public function index(){
        return view('newrepo');
    }

    public function store(Request $request){
        $input = $request->all();
        $url = $input['newrepo'];
        $path = parse_url($url);
       $path = $path['path'];

        $pieces = explode('/', $path);
        $index = count($pieces);
        $index -= 1;
        $account = $pieces[$index-1];
        $repo = $pieces[$index];

        try{
            $info = \GitHub::repo()->show($account, $repo);
            $repositorie = new Repositorie;
            $repositorie->github_user = $account;
            $repositorie->repo = $url;
            $repositorie->save();
        }catch (\Exception $e) {
            //'Caught exception: ',  $e->getMessage();
            return view('/newrepo');
        }
    }
}
