@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-primary mt-2 mb-2" href="/home">Ga Terug</a>
            <div class="card">
            <div class="card-header">{{$reparatie->titel}} {{$reparatie->soort}}</div>

                <div class="card-body">
                    <a>Reparatie: {{$reparatie->titel}} {{$reparatie->soort}}</a><br>
                    <a>Kosten: {{$reparatie->kosten}}</a><br>
                    <a>Datum: {{$reparatie->datum}}</a><br>
                    <a>Tijd: {{$reparatie->tijdstip}}</a><br>
                    <a class="text">Gemaakt Op: {{$reparatie->created_at}}</a><br>
                <a class="btn btn-secondary mt-2 mb-2" href="/reparatie/{{$reparatie->id}}/edit">Edit</a>
                {{Form::open(['action' => ['App\Http\Controllers\ReparatieController@destroy', $reparatie->id], 'method' => 'POST'])}}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Cancel',['class' => 'btn btn-danger'])}}
                {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection