@extends('master_beranda')

@section('content')

<div style="width: 780px; height: auto; border: 0px solid; float: left; padding: 5px;">
  
   <div style="width: 525px; height: auto; border: 0px solid; border-color: red; float: left; padding: 4px;">
       <div style="width: 520px; height: 20px; border: 0px solid; font-size: 12px; padding: 5px;">
          Hasil pencarian yang anda maksud : 
       </div>
       @if(!empty($post_user))
            @foreach($post_user as $p)
       <div style="width: 520px; height: 50px; border: 0px solid;">
          <div style="width: 50px; height: 50; border: 0px solid; float: left;">
          <a href="{{'@'.$p->username}}">
            @if(!empty($p->image_profil))
            <img src="{{url('image_user/view/'.$p->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
            @else
            <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
            @endif
          </a>
          </div>
          <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px; float: left">
          <a href="{{'@'.$p->username}}">
           <h5 style="margin: 4px;" >{{$p->name}}
             @if(!empty($p->verifikasi))
            <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
            @else
            @endif
              <div style="font-size: 13px;">
                  <p><small><i>@</i></small><small><i>{{$p->username}}</i></small></p>
              </div>
           </h5>
           </a>
           </div>
        
         <div style="width: 160px;  height: 30px; border: 0px solid; float: left; padding-top: 10px;">
                    @if($p->id == Auth::user()->id)
                    @else
                         <?php
                            $followed_id = $followed_user->where('followed_user_id', $p->id)->first();
                         ?>
                    <div style="width: 150px; height: 25px; border: 0px solid; float: right;">
                        <div style="float: left;">
                         @if(!empty($followed_id))
                          <form action="{{route('follow_delete')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="{{'@'.$p->username}}">
                          <input type="hidden" name="follower_id" value="{{$p->id}}">
                          <input type="hidden" name="followed_id" value="{{$p->id}}">
                          <input type="hidden" name="username" value="{{$p->username}}">
                          <button tipe="submit" class="btn btn-secondary btn-mini" style="padding-top: 2px; padding-bottom: 2px; margin: 0px;">Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                         </form>
                          @else
                         <form action="{{route('follow_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="{{'@'.$p->username}}">
                          <input type="hidden" name="user_id" value="{{$p->id}}">
                          <input type="hidden" name="follow_user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="username" value="{{$p->username}}">                  
                          <button tipe="submit" class="btn btn-success btn-mini" style="padding-top: 2px; padding-bottom: 2px; margin: 0px;">Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button> 
                          </form>
                           @endif  
                         </div>
                     </div>
                     @endif
                   </div>
                  </div> 
                     
                          
                         
           @endforeach

         @endif
         <center>
          <form  method="post" action="pencarian=text={{$limit_tambah+20}}" >
          {{ csrf_field() }}
          
            <input class="form-control" type="hidden" name="name" value="{{$name}}" />
         
           <button type="submit" class="btn btn-mini">tampilkan lebih banyak</button>
          </form>
    </center>  
   </div>
   <div style="width: 220px; height: auto; border: 0px solid; border-color: yellow; float: left; padding: 10px;">
    
    </div>
   
 
</div>
<br/>
          

@endsection
