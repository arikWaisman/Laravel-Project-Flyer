@extends('layout')

@section('content')
    <h1>Selling Something?</h1>
    <hr>
    {!! Form::model($flyer, ['method' => 'PATCH', 'route' => ['flyers.update', $flyer->id ]]) !!}
         @include('flyers.form', ['submit_text' => 'Update Flyer'])
    {!! Form::close() !!}

    {!! Form::model($flyer, ['method' => 'DELETE', 'route' => ['flyers.destroy', $flyer->id]]) !!}
        {!! Form::submit('Delete Flyer', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



@stop