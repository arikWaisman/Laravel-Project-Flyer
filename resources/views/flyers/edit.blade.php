@extends('layout')

@section('content')
    <h1>Selling Your Gear?</h1>
    <hr>
    {!! Form::model($flyer, ['method' => 'PATCH', 'route' => ['flyers.update', $flyer->id ]]) !!}
    {{--<form method="POST" enctype="multipart/form-data" action="{{ url('flyers') }}">--}}
    @include('flyers.form', ['submit_text' => 'Update Flyer'])

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--</form>--}}


@stop