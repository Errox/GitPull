@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th colspan="2">Username</th>
                                <th>Email</th>
                                <th>Date Created</th>
                                <th colspan="2">Commit message</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($commits as $commit)
                                    <tr>
                                        <td><img src="{{$commit['author']['avatar_url']}}" style="max-heigth:50px;max-width:50px;border-radius:100%"></td>
                                        <td>{{$commit['commit']['author']['name']}}</td>
                                        <td>{{$commit['commit']['author']['email']}}</td>
                                        <td>{{$commit['commit']['author']['date']}}</td>
                                        <td>{{$commit['commit']['message']}}</td>
                                        <td><a class="btn btn-primary" href="{{$commit['html_url']}}">Details</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
