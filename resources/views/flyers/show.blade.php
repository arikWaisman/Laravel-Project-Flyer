@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1>{{ $flyer->item }}</h1>
            <h2>{{ $flyer->city }}</h2>
            <h2>{{ $flyer->state }}</h2>
            <h2>{{ $flyer->country }}</h2>
            <h2>{{ $flyer->price }}</h2>

            <div class="description">{!! nl2br($flyer->description) !!}</div>
        </div>


        <div class="col-md-8 gallery">
            @foreach($flyer->photos->chunk(4) as $set )
                <div class="row">
                    @foreach($set as $photo)
                        <div class="col-md-3 gallery_image">
                            {{--<form method="POST" action="/photos/{{ $photo->id }}">--}}
                                {{--{!! csrf_field() !!}--}}
                                {{--<input type="hidden" name="_method" value="DELETE">--}}
                                {{--<button type="submit">Delete</button>--}}
                            {{--</form>--}}
                            @if($user && $user->owns($flyer))
                                {!! link_to_delete('Delete', url("/photos/{$photo->id}"), 'DELETE') !!}
                            @endif
                            <a href="/{{ $photo->path }}" data-lightbox="flyer-photos">
                               <img src="/{{ $photo->thumbnail_path }}" alt="">
                           </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
            @if($user && $user->owns($flyer))
                <hr>
                <h2>Add Your Photos</h2>
                <form id="addPhotosForm" action="{{ route('store_photo_path', [$flyer->id, $flyer->item] ) }}" method="POST" class="dropzone">
                    {{ csrf_field() }}

                </form>
            @endif
        </div>
    </div>



@stop

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFilesize: 3,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'

        };
    </script>
@stop