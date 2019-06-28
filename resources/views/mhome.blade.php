@extends('mmaster_home')

@section('content')

<div  style="width: 540px">
      
       @if(!empty($post_user))
            @foreach($post_user as $p)
       <center>
        <div style="width: 170px; height: 130px; border: 0px solid; float: left; overflow: hidden; margin: 0px; padding: 1px;">
         
            <a href="{{'post=m_'.$p->post_id}}"><img src="{{url('image_post/view/'.$p->image_post)}}" id="{{$p->post_id}}"  style=" display: block; height: 100%;  margin: 0px;" /></a>
          
        </div>
      </center>
      @endforeach
        @endif
      <div style="width: 520px;">
        <center class="clr">
           <a href="mhome={{$limit_tambah+12}}"><button class="btn btn-mini">tampilkan lebih banyak</button></a>
          </center> 
      </div>
</div>

@endsection
