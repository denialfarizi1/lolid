@extends('master_beranda')

@section('content')

<div style="width: 780px; height: auto; border:1px solid; float: right; padding: 5px;">
  
   <div style="width: 525px; height: auto; border:1px solid; border-color: red; float: left; padding: 4px;">
       
       @if(!empty($post_user))
            @foreach($post_user as $p)
       <div style="width: 250px; height: 50px; border: 0px solid;">
          <div style="width: 50px; height: 50; border: 0px solid;">
          <a href="{{'@'.$p->username}}"><img src="{{url('image_user/view/'.$p->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;"></a>
          </div>
          <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px;">
          <a href="{{'@'.$p->username}}">
           <h5 style="margin: 4px;" >{{$p->name}}<img src="{{url('image_user/view/'.$p->verifikasi.'.png')}}" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
              <div style="font-size: 13px;">
                  <p><small><i>@</small><small>{{$p->username}}</i></small></p>
              </div>
           </h5>
           </a>
           </div>
        </div> 
           @endforeach
         @endif  
   </div>
   <div style="width: 220px; height: auto; border:1px solid; border-color: yellow; float: left; padding: 10px;">
    
    </div>
   
 
</div>
<br/>
          

@endsection
