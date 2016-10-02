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
                       <th>Werkers</th>
                       </thead>
                       <tbody>

                       <?php $count = 0; ?>
                           @foreach($master as $repo)
                            <tr><td><a href="/{{$repos[$count]['id']}}">{{$repo['name']}}</a></td>
                               <td>
                                   <?php $count2 = 0; ?>
                                   @foreach($collab as $partners)
                                    {{$partners[$count2]['login']}}&nbsp;
                                       <?php $count2 += 1; ?>
                                   @endforeach
                               </td></tr>
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
