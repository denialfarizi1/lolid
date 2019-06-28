<div style="padding-top: 50px;"> 
   <!-- Modal message -->
      
<div class="modal fade message " tabindex="-1" role="dialog" aria-labelledby="message" aria-hidden="true">
  <div  class="modal-dialog" role="document" >
    <div  class="modal-content modal-lg"  >
      <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
       <h5>Chat Anda</h5>
      </div>
      <div class="modal-body" style="background: url('themes/images/b_inbox.png')">
        <!-- isi modul -->       
        <div style="width: 420px; height: auto; border: 0px solid; padding-left: 100px;">
      @if(!empty($message))
      @foreach($message as $m)
         
            
        @if($m->get_message_user1->id == Auth::user()->id)
             <?php
               $message_id1 = $m->message_id;
               $message_chat_user_messeage_id = $message_chat_user_all_order->where('message_id',$message_id1)->orderByDesc('updated_at')->first();
               $message_user_id = $message_user->where('message_id', $message_id1)->first();
             ?>
             <a href="" style="width: 325px; height: 65px;">
            <div  data-toggle="modal" data-target="{{'.message'.$message_id1.'_chat'}}" style="width: 325px; height: 65px; border: 0px solid; float: left; padding: 10px; background: white; ">
             
              <img src="{{url('image_user/view/'.$m->get_message_user2->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;">
               <div style=" width: 275px ;height: 60px; border: 0px solid;  float: left; padding-top: 0px; padding-left: 5px;">
                  
                  <div style="font-size: 15px"><b>{{$m->get_message_user2->name}}{{$message_id1}}</b></div>
                  <div style=" border: 0px solid; font-size: 13px;">
                    <p><small><i>@</i><i>{{$m->get_message_user2->username}}</i></small></p>
                  </div>
                  <div style="float: left;">{{ $message_chat_user_messeage_id->message_chat_comment}}</div>
                  <div style="float:right; font-size:7px;">  
                   {{$message_chat_user_messeage_id->updated_at}}
                  </div>
               </div>
             
            </div>
            </a>
            
           
       @endif
      @if($m->get_message_user1->id != Auth::user()->id)
           <?php
                $message_id2 = $m->message_id;
                $message_chat_user_messeage_id = $message_chat_user_all_order->where('message_id',$message_id2)->orderByDesc('updated_at')->first();
                $message_user_id = $message_user->where('message_id', $message_id2)->first();
             ?>

           <a href="">
           <div data-toggle="modal" data-target="{{'.message'.$message_id2.'_chat'}}" style="width: 325px; height: 65px; border: 0px solid; float: left; padding: 10px;  background-color: white ">
              
               <img src="{{url('image_user/view/'.$m->get_message_user1->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
                <div style=" width: 275px ;height: 40px; border: 0px solid;  float: left; padding-top: 0px;">
                   <div style="font-size: 15px"><b>{{$m->get_message_user1->name}} {{$message_id2}}</b></div>
                   <div style=" border: 0px solid; font-size: 13px;">
                    <p><small><i>@</i><i>{{$m->get_message_user1->username}}</i></small></p>
                   </div>
                   <div style=" float: left;">{{ $message_chat_user_messeage_id->message_chat_comment}}</div>
                   <div style="float:right; font-size:7px; border: 0px solid;">
                    {{$message_chat_user_messeage_id->updated_at}}
                  </div>
               </div>
             
          </div>
           </a>

          
         
      @endif  
       
      @endforeach
        @endif
      
      </div>
    </div>
        <!-- end isi modul -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--end modul -->

@if(!empty($message_id1))
<!-- Modal message chat 1-->
         
<div class="modal fade  {{' message'.$message_id1.'_chat'}}" tabindex="-1" role="dialog" aria-labelledby="message1_chat16" aria-hidden="true">
  <div class="modal-dialog message1_chat16"  role="document">
    <div class="modal-content modal-lg" >
      <div class="modal-header" style="width: 520px; height: auto;">
        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
          </button>
          <div style="width: 520px; height: 85px; border: 0px solid">
              <?php
              $message_user1_id1 = $message->where('message_id',$message_id1)->where('message_user2', Auth::user()->id)->first();
              $message_user1_id2 = $message->where('message_id',$message_id1)->where('message_user1', Auth::user()->id)->first();
              $message_chat_user1 = $message_chat_user_all->where('message_id',$message_id1);
                ?>
              <a href="" data-dismiss="modal" class="img-circle" style="padding: 0px; margin: 0px">
              <div style="float: left; padding: 10px;" data-dismiss="modal">
                    
                      <img src="themes/images/kembali.png"  class="img-circle" style="width: 40px;"/>
                   
              </div>
               </a>
              @if(!empty($message_user1_id2))
                <a href="{{'@'.$message_user1_id2->get_message_user2->username}}">
                <div style="width: 225px; height: 65px; border: 0px solid; border-color: red; float: left; padding: 10px;">
                  <img src="{{url('image_user/view/'.$message_user1_id2->get_message_user2->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;">
                   <div style=" width: 180px ;height: 60px; border: 0px solid;  float: left; padding-left: 5px;">
                      
                      <div style="font-size: 15px; "><b>{{$message_user1_id2->get_message_user2->name}}</b></div>
                      <div style=" border: 0px solid; font-size: 13px;">
                        <p><small><i>@</i><i>{{$message_user1_id2->get_message_user2->username}}</i></small></p>
                      </div>
                      <div style="float:right; font-size:7px;">
                      </div>
                   </div>
                </div>
               </a>
                @endif
              @if(!empty($message_user1_id1))
               <a href="{{'@'.$message_user1_id1->get_message_user1->username}}">
               <div style="width: 225px; height: 65px; border: 0px solid; border-color: blue; float: left; padding: 10px;">
                   <img src="{{url('image_user/view/'.$message_user1_id1->get_message_user1->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
                    <div style=" width: 180px ;height: 60px; border: 0px solid;  float: left; padding-left: 5px;">
                       <div style="font-size: 15px; "><b>{{$message_user1_id1->get_message_user1->name}}</b></div>
                       <div style=" border: 0px solid; font-size: 13px;">
                        <p><small><i>@</i><i>{{$message_user1_id1->get_message_user1->username}}</i></small></p>
                       </div>
                       <div style="float:right; font-size:7px;">
                      </div>
                   </div>
              </div>
              </a>
             @endif
          </div>
  
        
      </div>
      <div class="modal-body" style="background: url('themes/images/b_inbox.png')">
        <!-- isi modul -->
         
          @if(!empty($message_chat_user1))
                 @foreach($message_chat_user1 as $mcu)
                 <div style="width: 505px; height: auto; border: 0px solid; border-color: red;  float: left; padding: 5px;">
                    <div>
            
                        <div class="clr" style=" width: auto; height: auto; border: 0px solid;  @if($mcu->user_id ==  Auth::user()->id) float: right; background: url('themes/images/chat_kanan.png'); padding-left: 20px; @else float: left; background: url('themes/images/chat_kiri.png'); padding-left: 10px; @endif" >
                            <div style="padding: 5px; ">
                                {{$mcu->message_chat_comment}}
                   
                                <div style=" float:right; font-size:7px; padding-top: 5px; padding-left: 5px;">
                                      <i>{{$mcu->updated_at}}</i><a href=""><img src="themes\images\edit1.png" style="padding-left: 5px;"></a>
                                </div>
                            </div>
                        </div>  
                    </div>
                  </div>
                  @endforeach
            @endif
             @if(!empty($message_chat_user2))
                 @foreach($message_chat_user2 as $mcu2)
                 <div style="width: 505px; height: auto; border: 0px solid; border-color: red;  float: left; padding: 5px;">
                    <div>
            
                        <div class="clr" style=" width: auto; height: auto; border: 0px solid;  @if($mcu2->user_id ==  Auth::user()->id) float: right; background: url('themes/images/chat_kanan.png'); padding-left: 20px; @else float: left; background: url('themes/images/chat_kiri.png'); padding-left: 10px; @endif" >
                            <div style="padding: 5px; ">
                                {{$mcu2->message_chat_comment}}
                   
                                <div style=" float:right; font-size:7px; padding-top: 5px; padding-left: 5px;">
                                      <i>{{$mcu2->updated_at}}</i><a href=""><img src="themes\images\edit1.png" style="padding-left: 5px;"></a>
                                </div>
                            </div>
                        </div>  
                    </div>
                  </div>
                  
                  @endforeach
            @endif
        
       
        
        <div style="width: 505px; padding-left: 10px;">  
         
              <div style="width: 50px; float: left;">
              <a href=""><img src="{{url('image_user/view/'.Auth::user()->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;"></a>
              </div>
               <form action="{{route('message_chat_save')}}" method="POST">
              <div style=" width: 395px; height: 35px; border: 0px solid; float: left; padding-top: 5px;">
               
                     {{ csrf_field() }}
              <input type="hidden" name="message_id" value="{{$message_id1}}">
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <input type="text" name="message_chat_comment" placeholder="add your comment" style="width: 370px;">
              </div>
              <div style="width: 50px; float: left; padding-top: 8px;">
              <input class="btn-primary" type="submit" value="chat">
              </div>
              </form>
             
        </div>
     
       </div>
        <!-- end isi modul -->
          <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
          </div>
      </div>
    </div>
  </div>
@endif
 

        <!-- Modal message chat 2-->
 @if(!empty($message_id2))        
<div class="modal fade {{' message'.$message_id2.'_chat'}}"  tabindex="-1" role="dialog" aria-labelledby="{{' message'.$message_id2.'_chat'}}" aria-hidden="true">
  <div class="modal-dialog "  role="document">
    <div class="modal-content modal-lg" >
      <div class="modal-header" style="width: 520px; height: auto;">
         <?php
      $message_user2_id1 = $message->where('message_id',$message_id2)->where('message_user1', Auth::user()->id)->first();
      $message_user2_id2 = $message->where('message_id',$message_id2)->where('message_user2', Auth::user()->id)->first();
      $message_chat_user2 = $message_chat_user_all->where('message_id',$message_id2);
      ?>
          <a href=""><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></a>
          <div style="width: 520px; height: 85px; border: 0px solid">
     
              <a  data-dismiss="modal" class="img-circle"  aria-label="kembali" style="border: 0px solid; padding: 0; margin: 0;">
              <div style="float: left; padding: 10px;">
                  <img src="themes/images/kembali.png"  class="img-circle" style="width: 40px;">
             </div>
              </a>
    @if(!empty($message_user2_id2))
            <a href="{{'@'.$message_user2_id2->get_message_user1->username}}" style="border: 0px solid;">
            <div style="width: 225px; height: 65px; border: 0px solid; float: left; padding: 10px;">
              <img src="{{url('image_user/view/'.$message_user2_id2->get_message_user1->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;">
               <div style=" width: 180px ;height: 60px; border: 0px solid;  float: left; padding-left: 5px;">
                  
                  <div style="font-size: 15px; "><b>{{$message_user2_id2->get_message_user1->name}}</b></div>
                  <div style=" border: 0px solid; font-size: 13px;">
                    <p><small><i>@</i><i>{{$message_user2_id2->get_message_user1->username}}</i></small></p>
                  </div>
                  <div style="float:right; font-size:7px;">
                  </div>
               </div>
            </div>
           </a>
      @endif
      @if(!empty($message_user_id1))
           <a href="{{'@'.$message_user2_id1->get_message_user2->username}}" style="border: 0px solid;">
           <div style="width: 225px; height: 65px; border: 0px solid; float: left; padding: 10px;">
               <img src="{{url('image_user/view/'.$message_user2_id1->get_message_user2->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
                <div style=" width: 180px ;height: 60px; border: 0px solid;  float: left; padding-left: 5px;">
                   <div style="font-size: 15px; "><b>{{$message_user2_id1->get_message_user2->name}}</b></div>
                   <div style=" border: 0px solid; font-size: 13px;">
                    <p><small><i>@</i><i>{{$message_user2_id1->get_message_user2->username}}</i></small></p>
                   </div>
                   <div style="float:right; font-size:7px;">
                  </div>
               </div>
          </div>
          </a>
      @endif  
         
    </div>
  
        
      </div>
      <div class="modal-body" style="background: url('themes/images/b_inbox.png')">
        <!-- isi modul -->
         
          @if(!empty($message_chat_user2))
      @foreach($message_chat_user2 as $mcu)
     <div style="width: 505px; height: auto; border: 0px solid; border-color: red;  float: left; padding: 5px;">
         <div>
            
            <div class="clr" style=" width: auto; height: auto; border: 0px solid;  @if($mcu->user_id ==  Auth::user()->id) float: right; background: url('themes/images/chat_kanan.png'); padding-left: 20px; @else float: left; background: url('themes/images/chat_kiri.png'); padding-left: 10px; @endif" >
                    <div style="padding: 5px; ">
                    {{$mcu->message_chat_comment}}
                   
                        <div style=" float:right; font-size:7px; padding-top: 5px; padding-left: 5px;">
                          <i>{{$mcu->updated_at}}</i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;"></a>
                        </div>
                    </div>
              </div>   
          </div>
      </div>
      
          @endforeach
        @endif
        
        
     <div style="width: 505px; padding-left: 10px;">  
         
              <div style="width: 50px; float: left;">
              <a href=""><img src="{{url('image_user/view/'.Auth::user()->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;"></a>
              </div>
               <form action="{{route('message_chat_save')}}" method="POST">
              <div style=" width: 395px; height: 35px; border: 0px solid; float: left; padding-top: 5px;">
               
                     {{ csrf_field() }}
              <input type="hidden" name="message_id" value="{{$message_id2}}">
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <input type="text" name="message_chat_comment" placeholder="add your comment" style="width: 370px;">
              </div>
              <div style="width: 50px; float: left; padding-top: 8px;">
              <input class="btn-primary" type="submit" value="chat">
              </div>
              </form>
             
        </div>
      </div>
        <!-- end isi modul -->
      
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--end modul -->
@endif

</div>