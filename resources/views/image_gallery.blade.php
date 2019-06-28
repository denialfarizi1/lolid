@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <h3>Image Gallery</h3>
            <a href="{{route('image_insert')}}" class="btn btn-primary">Add Image</a>
        </div>

        @if(!empty($images))
            @foreach($images as $val)
                <div class="col-md-4" align="center">
                    <img src="{{url('image/view/'.$val->image_src)}}" alt="" class="img-thumbnail" width="300">
                    <br>
                    <b>{{$val->image_title}}</b>
                    <br>
                    {!!html_entity_decode($val->image_desc)!!}
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection