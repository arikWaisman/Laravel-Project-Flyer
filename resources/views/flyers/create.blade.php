@extends('layout')

@section('content')
    <h1>Selling Your Gear?</h1>
    <hr>

        <form method="POST" enctype="multipart/form-data" action="{{ link_to_route('flyers.store') }}">
            @include('flyers.form')

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>


@stop