@extends('layout')

@section('content')
    <h1>Selling Something?</h1>
    <hr>
        {!! Form::model(new App\Flyer, ['route' => ['flyers.store']]) !!}
        {{--<form method="POST" enctype="multipart/form-data" action="{{ url('flyers') }}">--}}
            @include('flyers.form', ['submit_text' => 'Create Flyer'])

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
        {!! Form::close() !!}


@stop