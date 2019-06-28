@extends('master_home')

@section('content')

<div class="tab-pane active" id="status" style="padding-left: 40px;">
      <ul class="thumbnails">
       @if(!empty($post_user))
            @foreach($post_user as $p)
      <li class="span3" style="padding: 0px; margin: 0px;">
        <div class="thumbnail">
        <a href="{{'post_'.$p->post_id}}"><img src="{{url('image_post/view/'.$p->image_post)}}" id="{{$p->post_id}}"alt="" style="width: 350px;height: 200px;" /></a>
        </div>
      </li>
      @endforeach
        @endif
      
        </ul>
    <center>
          <a href="home={{$limit_tambah+12}}"><button class="btn btn-medium">tampilkan lebih banyak</button></a>
    </center>
</div>

@endsection
