@extends('mmaster_beranda_chat')

@section('content')
<div style="width: 500px; height: 580px; border:1px solid; background: url('themes/images/b_inbox.png'); padding: 5px; ">
  <div style="width: 500px; height: 580px; border: 1px solid;">
      <div style="width: 50px; float: left; padding-top: 10px; padding-left: 10px; ">
                <a href="message=m"><img src="themes/images/kembali.png" style="width: 40px;"></a>
      </div>  
     <div style="width: 500px; height: 85px; border: 1px solid">
      
    @if($message_user_id->get_message_user1->id == Auth::user()->id)
            <a href="{{'@'.$message_user_id->get_message_user2->username}}">
            <div style="width: 225px; height: 50px; border: 0px solid; float: left; padding: 10px;">
              @if(!empty($message_user_id->get_message_user2->image_profil))
              <img src="{{url('image_user/view/'.$message_user_id->get_message_user2->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;">
              @else
                 <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
              @endif
               <div style=" width: 180px ;height: 50px; border: 0px solid;  float: left; padding-left: 0px;">
                  
                  <div style="font-size: 15px; padding-top: 5px; margin: 0px; border: 0px solid;">
                    <b>{{$message_user_id->get_message_user2->name}}
                        @if($message_user_id->get_message_user2->verifikasi)
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 10px; height: 10px; float: left;">
                        @else
                        @endif
                    </b>
                  </div>
                  <div style=" border: 0px solid; font-size: 13px;">
                    <p><small><i>@</i><i>{{$message_user_id->get_message_user2->username}}</i></small></p>
                  </div>
                  <div style="float:right; font-size:7px;">
                  </div>
               </div>
            </div>
           </a>
      @else
           <a href="{{'@'.$message_user_id->get_message_user1->username}}">
           <div style="width: 225px; height: 50px; border: 0px solid; float: left; padding: 10px;">
             @if(!empty($message_user_id->get_message_user1->image_profil))
               <img src="{{url('image_user/view/'.$message_user_id->get_message_user1->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
              @else
                <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
              @endif
                <div style=" width: 180px ;height: 50px; border: 0px solid;  float: left; padding-left: 5px;">
                   <div style="font-size: 15px; padding-top: 5px; margin: 0px; border: 0px solid;">
                        <b>{{$message_user_id->get_message_user1->name}}
                          @if(!empty($message_user_id->get_message_user1->verifikasi))
                          <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 10px; height: 10px; float: left;">
                          @else
                          @endif
                        </b>
                    </div>
                   <div style=" border: 0px solid; font-size: 13px;">
                    <p><small><i>@</i><i>{{$message_user_id->get_message_user1->username}}</i></small></p>
                   </div>
                   <div style="float:right; font-size:7px;">
                  </div>
               </div>
          </div>
          </a>
      @endif  
          <!-- <h5>{{$message_user_id->message_kode}}</h5> -->
    </div>
   
       @if(!empty($message_chat_user))
      @foreach($message_chat_user as $mcu)
     <div style="width: 480px; height: auto; border: 0px solid; border-color: red;  float: left; padding: 5px;">
         <div>
            
            <div class="clr" style=" width: auto; height: auto; border: 0px solid;  @if($mcu->user_id ==  Auth::user()->id) float: right; background: url('themes/images/chat_kanan.png'); padding-left: 20px; @else float: left; background: url('themes/images/chat_kiri.png'); padding-left: 10px; @endif" >
                    <div style="padding: 5px; ">
                    {{$mcu->message_chat_comment}}
                   
                        <div style=" float:right; font-size:7px; padding-top: 5px; padding-left: 5px;">
                          <i>{{$mcu->updated_at}}</i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;">
                        </div>
                    </div>
            </div>  
            
          </div>
      </div>

          @endforeach
        @endif
        
        
     
 
  
</div>

   

@endsection
