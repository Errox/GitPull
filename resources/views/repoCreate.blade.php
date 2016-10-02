@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   <form action="{{url('/newrepo')}}" method="post">
                       {!! csrf_field() !!}
                        <label>Voeg nieuwe repo toevoegen</label><br>
                       <input type="url" name="newrepo"><br>
                        <input type="submit" value="Verzenden">




                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
