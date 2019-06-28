@extends('master_user')

@section('content')
<div style="width: 780px; height: auto; border:1px solid; float: right; background: url('themes/images/b_inbox.png'); padding: 5px; ">
  <div style="width: 250px; height: auto; border: 1px solid; float: left;">
      @if(!empty($message))
      @foreach($message as $m)
        <?php 
            $message_id = $m->message_id;
            $message_chat_user_messeage_id = $message_chat_user_all_order->where('message_id',$message_id)->orderByDesc('updated_at')->first(); 
            ?>
        @if($m->get_message_user1->id == Auth::user()->id)
           <?php
                $message_id1 = $m->message_id;
             ?>
            <a href="{{'message_'.$m->message_id}}">
            <div style="width: 225px; height: 65px; border: 1px solid; float: left; padding: 10px; @if($m->message_user2 == $message_user_id->get_message_user2->id ) background: white @endif">
              @if(!empty($m->get_message_user2->image_profil))
              <img src="{{url('image_user/view/'.$m->get_message_user2->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;">
              @else
                <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
              @endif
               <div style=" width: 180px ;height: 60px; border: 0px solid;  float: left; padding-top: 0px;">
                  
                  <div style="font-size: 15px">
                    <b>{{$m->get_message_user2->name}}
                        @if(!empty($m->get_message_user2->verifikasi))
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 10px; height: 10px; float: left;">
                        @else
                        @endif
                     </b>
                   </div>
                  <div style=" border: 0px solid; font-size: 13px;">
                    <p><small><i>@</i><i>{{$m->get_message_user2->username}}</i></small></p>
                  </div>
                  @if(!empty($message_chat_user_messeage_id))
                  <div style="float: left;">{{ $message_chat_user_messeage_id->message_chat_comment}}</div>
                  <div style="float:right; font-size:7px;">  
                   {{$message_chat_user_messeage_id->updated_at}}
                  </div>
                   @else
                  @endif
               </div>
            </div>
           </a>
          @endif
          @if($m->get_message_user1->id != Auth::user()->id)
          <?php
                $message_id2 = $m->message_id;
             ?>
           <a href="{{'message_'.$m->message_id}}">
           <div style="width: 225px; height: 65px; border: 1px solid; float: left; padding: 10px; @if($m->message_user1 == $message_user_id->get_message_user1->id) background-color: white @endif">
               @if(!empty($m->get_message_user1->image_profil))
               <img src="{{url('image_user/view/'.$m->get_message_user1->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
               @else
               <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
               @endif
                <div style=" width: 180px ;height: 60px; border: 0px solid;  float: left; padding-top: 0px;">
                   <div style="font-size: 15px">
                    <b>{{$m->get_message_user1->name}}
                       @if(!empty($m->get_message_user1))
                         <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 10px; height: 10px; float: left;">
                       @else
                       @endif
                    </b>
                  </div>
                   <div style=" border: 0px solid; font-size: 13px;">
                    <p><small><i>@</i><i>{{$m->get_message_user1->username}}</i></small></p>
                   </div>
                    @if(!empty($message_chat_user_messeage_id))
                    <div style=" float: left;">{{ $message_chat_user_messeage_id->message_chat_comment}}</div>
                    <div style="float:right; font-size:7px; border: 0px solid;">
                     {{$message_chat_user_messeage_id->updated_at}}
                    </div>
                    @else
                    @endif
               </div>
          </div>
          </a>
      @endif  
      
      @endforeach
        @endif
      
  </div>
  <div style="width: 520px; height: auto; border: 1px solid; float: left;">
     <div style="width: 520px; height: 85px; border: 1px solid">
      
    @if($message_user_id->get_message_user1->id == Auth::user()->id)
            <a href="{{'@'.$message_user_id->get_message_user2->username}}">
            <div style="width: 225px; height: 65px; border: 0px solid; float: left; padding: 10px;">
              @if(!empty($message_user_id->get_message_user2->image_profil))
              <img src="{{url('image_user/view/'.$message_user_id->get_message_user2->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;">
              @else
                 <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
              @endif
               <div style=" width: 180px ;height: 60px; border: 0px solid;  float: left; padding-left: 5px;">
                  
                  <div style="font-size: 15px; ">
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
           <div style="width: 225px; height: 65px; border: 0px solid; float: left; padding: 10px;">
             @if(!empty($message_user_id->get_message_user1->image_profil))
               <img src="{{url('image_user/view/'.$message_user_id->get_message_user1->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
              @else
                <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
              @endif
                <div style=" width: 180px ;height: 60px; border: 0px solid;  float: left; padding-left: 5px;">
                   <div style="font-size: 15px; ">
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
     <div style="width: 505px; height: auto; border: 0px solid; border-color: red;  float: left; padding: 5px;">
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
        
        <div style="width: 505px; padding-left: 10px;">  
         
              <div style="width: 50px; float: left;">
              <a href="">
                  @if(!empty(Auth::user()->image_profil))
                <img src="{{url('image_user/view/'.Auth::user()->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;">
                  @else
                <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
                  @endif
              </a>
              </div>
               <form action="{{route('message_chat_save')}}" method="POST">
              <div style=" width: 395px; height: 35px; border: 0px solid; float: left; padding-top: 5px;">
               
                     {{ csrf_field() }}
               <input type="hidden" name="asal" value="{{'message_'.$message_id}}">
              <input type="hidden" name="message_id" value="{{$message_id}}">
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <input type="text" name="message_chat_comment" placeholder="add your comment" style="width: 370px;">
              </div>
              <div style="width: 50px; float: left; padding-top: 5px;">
              <input class="btn btn-primary" type="submit" value="chat">
              </div>
              </form>
             
        </div>
     
 
  
</div>

   

@endsection
