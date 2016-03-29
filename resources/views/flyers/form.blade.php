@inject('countries', 'App\Http\Utilities\Country')


<div class="row">
{{--{{ csrf_field() }}--}}
    <div class="col-md-6">
        <div class="form-group">
            {{--<label for="item">Item:</label>--}}
            {{--<input type="text" name="item" id="item" class="form-control" value="{{ old('item') }}" required>--}}
            {!! Form::label('item', 'Item:') !!}
            {!! Form::text('item', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>

        <div class="form-group">
            {{--<label for="city">City:</label>--}}
            {{--<input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>--}}
            {!! Form::label('city', 'City:') !!}
            {!! Form::text('city', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>

        <div class="form-group">
            {{--<label for="state">State:</label>--}}
            {{--<input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}" required>--}}
            {!! Form::label('state', 'State:') !!}
            {!! Form::text('state', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
        <div class="form-group">
            {{--<label for="country">Country:</label>--}}
            {{--<select name="country" id="country" class="form-control" required>--}}
                {{--@foreach($countries::all() as $country => $code)--}}
                    {{--<option value="{{ $code }}"> {{ $country }}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}
            {!! Form::label('country', 'Country:') !!}
            <select name="country" id="country" class="form-control" required>
                @foreach($countries::all() as $country => $code)
                    <option value="{{ $code }}"> {{ $country }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{--<label for="price">Price:</label>--}}
            {{--<input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}" required>--}}
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>

        <div class="form-group">
            {{--<label for="description">Description:</label>--}}
            {{--<textarea type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" rows="9" required></textarea>--}}
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'rows' => 9]) !!}
        </div>
    </div>
    <div class="col-md-12">
        <hr>
        <div class="form-group">
            {{--<button type="submit" class="btn btn-primary">Create Flyer</button>--}}
            {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
        </div>
    </div>

</div>
