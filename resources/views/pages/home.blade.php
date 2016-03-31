@extends('layout')

@section('content')
    <div class="jumbotron">
        <div class="container">

            <h1>Projectflyer</h1>

            <p>Create a for sale or trade flyer to share with friends. You will be able to upload pictures and manage your flyers details with your account</p>
            @if($signedIn)
                <a href="flyers/create" class="btn btn-primary">Create a Flyer</a>
            @else
                <a href="register" class="btn btn-primary">Sign Up</a>
            @endif
        </div>
    </div>
@stop