@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   <table class="table table-hover table-striped">
                       <thead>
                       <th>Repositories</th>
                       <th>Eigenaar</th>
                       </thead>
                       <tbody>

                       <?php $count = 0; ?>
                           @foreach($master as $repo)
                            <tr><td>{{$repo['name']}}</td>
                                <td> {{$repo['owner']['login']}}</td>
                                <td><a style="float:right;" class="btn btn-primary" href="/{{$repos[$count]['id']}}">Lees meer &raquo;</a></td>
                            </tr>
                               <?php $count += 1; ?>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
