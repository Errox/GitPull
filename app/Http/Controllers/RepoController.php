<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositorie;
use App\Http\Requests;

class RepoController extends Controller
{

    public function index(){
        return view('repoCreate');
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

        try {
            $info = \GitHub::repo()->show($account, $repo);

            $repositorie = Repositorie::where('github_user', '=', $account)->where('github_repo', '=', $repo)->get();
            if(isset($repositorie[0]['repo']) != $url){
                $repositorie = new Repositorie;
                $repositorie->github_user = $account;
                $repositorie->github_repo = $repo;
                $repositorie->repo = $url;
                $repositorie->save();
                \flash('Congratulations, you successfully added the repository '.$repo.' of '.$account);
                return view('/repoCreate');
            }else{
                \flash('Congratulations, you successfully added the same repository we already had so we deleted it.');
                return view('/repoCreate');
            }


        }catch (\Exception $e) {
            //'Caught exception: ',  $e->getMessage();
            \flash('Wow Congratulations, was it that hard to copy paste a working url? Error: '.$e->getMessage(), 'danger');
            return view('/repoCreate');
        }
    }
}
