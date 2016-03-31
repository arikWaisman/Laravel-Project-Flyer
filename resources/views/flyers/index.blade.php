@extends('layout')

@section('content')
    <h1>Your Current Flyers</h1>
    <hr>

    @if($flyers->isEmpty())
        <h5>You do not have any active flyers, make one <a href="{{ url('flyers/create') }}">here</a></h5>
    @endif

    @foreach($flyers as $flyer)
        <a href="{{ url("/{$flyer->id}/{$flyer->item}") }}">{{ ucfirst($flyer->item) }}</a>
    @endforeach

@stop