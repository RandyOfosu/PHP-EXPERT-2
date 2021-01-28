@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-danger mt-2 mb-2" href="/home">annuleer</a>
            <div class="card">
                <div class="card-header">Reparaties Inplannen</div>

                <div class="card-body">
                    {{ Form::open(['action' => 'App\Http\Controllers\ReparatieController@store', 'method' => 'POST']) }}
                    <div class="form-group">
                    {{Form::label('label','Reparatie')}}
                    {{Form::text('titel', null, array('class' => 'form-control', 'placeholder' => 'Titel',))}}
                    {{Form::label('label','Kosten')}}
                    {{Form::text('kosten', null, array('class' => 'form-control', 'placeholder' => 'Alleen ronde getallen',))}}
                    {{Form::label('label','Datum en Tijd')}}
                    {{Form::date('datum', null, array('class' => 'form-control', 'placeholder' => 'Datum',))}}
                    {{Form::time('tijdstip', null, array('class' => 'form-control', 'placeholder' => 'tijdstip',))}}
                    </div>
                    {{Form::submit('verzenden',['class' => 'btn btn-primary'])}}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
