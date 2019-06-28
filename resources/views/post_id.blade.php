@extends('master_post1')

@section('content')

<div style="width: 1150px; height: 700px; border: 0px solid; padding-left: 5px; padding-right: 5px;">
  <div style="width: 800px; height: 700px; border: 0px solid; border-color: red; float: left;">
      <div style="width: 790px; height: 30px; border: 0px solid; padding-left: 40px; padding-top: 5px;">
        @if(!empty($post_detail->lokasi))
        <img src="themes/images/alamat.jpg" style="width: 20px; padding-right: 5px;" />{{$post_detail->lokasi}}
        @else
        @endif
      </div>
  	  <div style="width: 790px;  height: 490px;  border: 0px solid; overflow: hidden; margin: 0px; padding: 0px;">
  	  <center><img src="{{url('image_post/view/'.$post_detail->image_post)}}" style="display: block; height: 490px ;  margin: 0px; padding: 0px;"> </center>
  	  </div>
  	   <tr>
          <div style="width: 300px; height: 40px; border: 0px solid; float: left; padding-top: 10px; padding-left: 30px; padding-bottom: 0px;">
            <div style="width: 60px height 25px; float: left; border: 0px solid; border-color: red">
               <td>
                @guest
                    <a href="login"><img src="themes/images/lolid.jpg"></a> 
                @else
                  @if(!empty($likes_post_user_id))
                      <form action="{{'like_id/delete/'.$likes_post_user_id->like_id}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="asal" value="{{'post_'.$post_user->post_id}}">
                                            <input type="hidden" name="post_id" value="{{$post_user->post_id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                                              <img src="themes/images/lolid.jpg"> 
                                               </button>
                                              </form>
                                             @else
                                            <form action="{{route('like_post_id_save')}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="asal" value="{{'post_'.$post_user->post_id}}">
                                            <input type="hidden" name="post_id" value="{{$post_user->post_id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                                                <img src="themes/images/lol.jpg">
                                               </button>
                                              </form>
                   @endif
                @endguest 
            	<!-- -->
            
            </td>
            </div>
          <td><a href="{{'post_'.$post_user->post_id}}" style="background-color: white;"><button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;"><img src="themes/images/comment.png"> </button></a></td>
          <td>
            <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#share" style="background-color: white; width: 37px; height: 35px;"><img src="themes/images/right.png"> </button>
          </td>
               <!-- Modal share-->
                                          <div style="padding-top: 0px; ">
                                            <div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="share" aria-hidden="true" style="padding-bottom: 0px; margin-bottom: 0px;">
                                                <div class="modal-dialog" role="document"  style="padding-bottom: 0px; margin-bottom: 0px;">
                                                    <div class="modal-content"  style="padding-bottom: 0px; margin-bottom:  0px;">
                                                      <div class="modal-header" style="width: 520px; height: 40px; border: 0px solid">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="tutup"><span aria-hidden="true">&times;</span></button>
                                                          <div style="width: 500px; height: auto; border: 0px solid; border-color: red;  padding-left: 0px; padding-top: 0px; padding-right: 0px;">
                                                              <div style="width: 30px; border: 0px solid; float: left; padding-left: 0px; padding-top: 0px;">
                                                                <button data-dismiss="modal" class="img-circle"  aria-label="kembali" style="float: left; padding: 0px;margin: 0px;">
                                                                    <img src="themes/images/kembali.png"  class="img-circle" style="width: 25px;">
                                                                </button>
                                                              </div>
                                                          <div style="width: 465px; height: auto; border: 0px solid; float: left; padding-top: 0px;"> <h3>Share</h3>           
                                                           </div>
                                                        </div>
                                                        <hr class="soft">
                                                      </div>
                                                  <div class="modal-body" style="width: 490px; height: 100px; border: 0px solid;" >
                                                    <!-- isi modul -->   
                                                    <center>
                                                     <div style="width: 180px; height: 50px; border: 0px solid;">
                                                       <div style="width: 50px; height: 50px; border: 0px solid; float: left;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 45px; height: 45px; padding: 0px; margin: 0px;">
                                                           <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://lolid.xyz/post_{{$post_user->post_id}};src=sdkpreparse" >
                                                            <img src="themes/images/facebook.jpg"  class="img-circle" style="width: 50px;">
                                                            </a>
                                                          </button>
                                                       </div>
                                                       <div style="width: 50px; height: 50px; border: 0px solid; float: left;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 45px; height: 45px; padding: 0px; margin: 0px;">
                                                          <a target="_blank"  class="twitter-share-button" href="https://twitter.com/intent/tweet?text=https://lolid.xyz/post_{{$post_user->post_id}}">
                                                            <img src="themes/images/twitter.jpg"  class="img-circle" style="width: 50px;">
                                                          </a>
                                                          </button>
                                                       </div>
                                                       <div style="width: 50px; height: 50px; border: 0px solid; float: left;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 45px; height: 45px; padding: 0px; margin: 0px;">
                                                          <a target="_blank"  href="https://web.whatsapp.com://send?text=https://lolid.xyz/post_{{$post_user->post_id}}">
                                                           <img src="themes/images/wa.png"  class="img-circle" style="width: 50px;">
                                                         </a>
                                                          </button>
                                                       </div>
                                                       
                                                     </div>
                                                   </center>
                                                
                                                </div>
                                              </div>
                                        </div>
                                                  <!-- end isi modul -->
                            <div class="modal-footer" style="height: 20px; padding-top: 0px;">
                              <div  style="width: 510px; border: 0px solid; padding-left: 20px;">            
                                      <div style="width: 430px; padding-left: 1px; border: 0px solid; float: left;" >
            
                                      </div>
                                      <div style="width: 50px; float: right; border: 0px solid; padding-top: 5px;">
                                           <i class="btn btn-secondary" data-dismiss="modal">Close</i>
                                      </div>
                              </div>
                         </div>
                        </div>
                      </div>
                  <!--end modul -->                             
 
            	<!-- -->
              
          </div>
          <div style="width: 750px; text-align: right; padding-top: 5px;">
          <i>{{$post_user->created_at}}</i>
          </div>
        </tr>
        <div class="clr" id="myTab" style="width: 300px; padding-left: 35px; padding-top: 0px;">
            <tr>
            	<div style="width: 55px; border: 0px solid; float: left;">
                   <td id="{{$post_detail->post_id}}"> <a href="" data-toggle="modal" data-target="#likes">{{$count_likes}} <img src="themes/images/lol.jpg" style="width: 40%"> </a></td>
                </div>
                <div style="width: 100px; border: 0px solid; float: left;">
                   <td id="{{$post_detail->post_id}}"> <a href="#comment" data-toggle="tab">{{$count_comment}} <img src="themes/images/comment.png" style="width: 22%"> </a></td>
                </div>
            </tr>
            <p class="clr"></p>
            <tr>
            	<td>
            	
               <div style="width: 430px; height: 15px; border: 0px solid; text-align: left; float: left;">

                                      @if(!empty($count_likes != 0))
                                        <div style="width: auto; height: 15px; float: left; padding-top: 2px;">
                                          @foreach($likes_post_user_limit as $lu)
                                         
                                              <a href="{{'@'.$lu->get_like_user->username}}">
                                                @if(!empty($lu->get_like_user->image_profil))
                                                <img src="{{url('image_user/view/'.$lu->get_like_user->image_profil)}}" class="img-circle" style="width: 13px; height: 13px; float: left; padding-top: 1px;">
                                                @else
                                                <img src="themes/images/profil.jpg" class="img-circle" style="width: 15px; height: 15px; float: left; padding: 0px;">
                                                @endif
                                              </a>
                                         
                                          @endforeach
                                        </div>
                                        <div style="width: 410px; height: 15px; padding-bottom: 0px;  border: 0px solid; padding-left: 5px; ">
                                          @foreach($likes_post_user_limit as $lp )
                                            <b style="font-size: 10px; font-style: italic;">
                                            <a href="{{'@'.$lp->get_like_user->username}}">
                                               @guest

                                               @else
                                                @if($lp->get_like_user->id == Auth::user()->id)
                                                   Anda

                                                @else
                                                  {{$lp->get_like_user->name}}
                                                @endif
                                              @endguest
                                            </a>
                                            </b>
                                            ,
                                           
                                          @endforeach
                                          @if($count_likes >= 3)
                                             <i class="btn btn-secondary" data-toggle="modal" data-target="#likes" style=" height: 10px; padding: 0px ; margin: 0px; font-size: 10px;"> <sup><b>dan {{$count_likes-2}} lainnya</b></sup></i>
                                            <i style="padding-left: 5px; font-size: 10px;">menyukai</i>
                        
                                           
                                                <!-- Modal likes-->
                                          <div style="padding-top: 0px; ">
                                            <div class="modal fade" id="likes" tabindex="-1" role="dialog" aria-labelledby="likes" aria-hidden="true" style="padding-bottom: 0px; margin-bottom: 0px;">
                                                <div class="modal-dialog" role="document"  style="padding-bottom: 0px; margin-bottom: 0px;">
                                                    <div class="modal-content"  style="padding-bottom: 0px; margin-bottom:  0px;">
                                                      <div class="modal-header" style="width: 520px; height: 40px; border: 0px solid">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="tutup"><span aria-hidden="true">&times;</span></button>
                                                          <div style="width: 500px; height: auto; border: 0px solid; border-color: red;  padding-left: 0px; padding-top: 0px; padding-right: 0px;">
                                                              <div style="width: 30px; border: 0px solid; float: left; padding-left: 0px; padding-top: 0px;">
                                                                <button data-dismiss="modal" class="img-circle"  aria-label="kembali" style="float: left; padding: 0px;margin: 0px;">
                                                                    <img src="themes/images/kembali.png"  class="img-circle" style="width: 25px;">
                                                                </button>
                                                              </div>
                                                          <div style="width: 465px; height: auto; border: 0px solid; float: left; padding-top: 0px;"> <b>Likes</b>           
                                                           </div>
                                                        </div>
                                                        <hr class="soft">
                                                      </div>
                                                  <div class="modal-body" style="width: 490px; height: 200px; border: 0px solid;" >
                                                    <!-- isi modul -->   
                                                      <table>
                                                        <div>
                                                      @if(!empty($likes_user))
                                                            @foreach($likes_user as $lpu)
                                                         <?php 
                                                           $user_id_f =  $lpu->get_like_user;
                                                           $follower_id_f = $follower_user->where('user_id', $user_id_f->id)->first();
                                                           $followed_id_f = $followed_user->where('followed_user_id', $user_id_f->id)->first();
                                                         ?>
                                                        <tr>
                                                            <td>
                                                              <div style="width: 250px; height: 50px; border: 0px solid;">
                                                                <div style="width: 50px; height: 50; border: 0px solid;">
                                                                  <a href="{{'@'.$lpu->get_like_user->username}}">
                                                                      @if(!empty($lpu->get_like_user->image_profil))
                                                                        <img src="{{url('image_user/view/'.$lpu->get_like_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                                                                      @else
                                                                        <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                                                                      @endif
                                                                  </a>
                                                              </div>
                                                              <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px;">
                                                              <a href="{{'@'.$lpu->get_like_user->username}}">
                                                                  <h5 style="margin: 4px;" >{{$lpu->get_like_user->name}}
                                                                      @if(!empty($lpu->get_like_user->verifikasi))
                                                                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                                                                      @else
                                                                      @endif
                                                                <div style="font-size: 13px;">
                                                                      <small><i>@</i></small><small><i>{{$lpu->get_like_user->username}}</i></small>
                                                                </div>
                                                                 </h5>
                                                              </a>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      <td>  
                                                          <center>
                                                          <div style="width: auto; height: 35px; ">
                                                          </div>
                                                          </center>
                                                      </td>
                                                      <td>
                                                        @guest
                                                        @else
                                                        @if($user_id_f->id == Auth::user()->id)
                                                          @else
                                                          <div style="width: 330px; height: 35px; border: 0px solid; float: right;">
                                                             <div style="width: 80px; float: left;">
                                                               @if(!empty($follower_id_f))
                                                                  <form action="{{route('follow_delete')}}" method="POST">
                                                                  {{ csrf_field() }}
                                                                      <input type="hidden" name="asal" value="{{'@'.$user_id_f->username}}">
                                                                      <input type="hidden" name="follower_id" value="{{$follower_id_f->follower_id}}">
                                                                      <input type="hidden" name="followed_id" value="{{$followed_id_f->followed_id}}">
                                                                      <input type="hidden" name="username" value="{{$user_id_f->username}}">
                                                                      <button tipe="submit" class="btn btn-secondary btn-mini" >Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                                                                    </form>
                                                                @else
                                                                  <form action="{{route('follow_save')}}" method="POST">
                                                                  {{ csrf_field() }}
                                                                      <input type="hidden" name="asal" value="{{'@'.$user_id_f->username}}">
                                                                      <input type="hidden" name="user_id" value="{{$user_id_f->id}}">
                                                                      <input type="hidden" name="follow_user_id" value="{{Auth::user()->id}}">
                                                                      <input type="hidden" name="username" value="{{$user_id_f->username}}">
                                                                      <button tipe="submit" class="btn btn-success btn-mini" >Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'>
                                                                      </button>
                                                                      </form> 
                                                                @endif
                                                              </div> 
                                                        <div style="width: 80px; float: left;">
                                                            <form action="{{route('message_save')}}" method="POST">
                                                                  {{ csrf_field() }}
                                                                  <input type="hidden" name="asal" value="message_">
                                                                  <input type="hidden" name="user_id1" value="{{Auth::user()->id}}">
                                                                  <input type="hidden" name="user_id2" value="{{$user_id_f->id}}">
                                                                  <button tipe="submit" class="btn btn-success btn-mini" >Message <img src="themes/images/mail.png" class="img-circle"> </button>
                                                            </form>
                                                        </div>
                                                     </div>
                                                   @endif
                                                @endguest
                                                </td> 
                                              </tr> 
                                        @endforeach
                                    @endif
                                  </div>
                                </table>
                                <br class="clr"/>
                              </div>
                          </div>
                        </div>
                          <!-- end isi modul -->
                        <div class="modal-footer" style="height: 20px; padding-top: 0px;">
                              <div  style="width: 510px; border: 0px solid; padding-left: 20px;">            
                                      <div style="width: 430px; padding-left: 1px; border: 0px solid; float: left;" >
            
                                      </div>
                                      <div style="width: 50px; float: right; border: 0px solid; padding-top: 5px;">
                                           <i class="btn btn-secondary" data-dismiss="modal">Close</i>
                                      </div>
                              </div>
                         </div>
                        </div>
                      </div>
                  <!--end modul --> 
                                          @endif
                                          @if($count_likes <= 2)
                                          <i style="padding-left: 5px; font-size: 10px;">menyukai</i>
                                          @else
                                          @endif
                                        </div>
                                        @else
                                        @endif                  
                  </div>

            	</td>
            </tr>
        </div>
 
  </div>
  <div style="width:45px; height: 45px; border: 0px solid; border-color: red; float: right;">
  	<a href="{{'@'.$post_user->get_post_user->username.'#'.$post_user->post_id}}"><img src="themes\images\x.png"></a>
  </div>
   
  <!-- menu kanan -->
  <div style="width: 315px; height: auto; border: 0px solid; border-color: red; float: left; padding-left: 20px; padding-top: 0px; padding-right: 0px;">
  	 <div style="width: 285px; height: 90px; border: 0px solid; float: left;">
  	 <a href="{{'@'.$post_user->get_post_user->username}}">
        @if(!empty($post_user->get_post_user->image_profil))
      <img src="{{url('image_user/view/'.$post_user->get_post_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"> 
        @else
          <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"> 
        @endif
    </a>
         <a href="{{'@'.$post_user->get_post_user->username}}">
           <h5>{{$post_user->get_post_user->name}}
            @if(!empty($post_user->get_post_user->verifikasi))
            <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 0px;">
            @else
          
            @endif
              <div style="font-size: 13px;">
                  <p><small><i>@</i></small><small><i>{{$post_user->get_post_user->username}}</i></small></p>
              </div>
           </h5>
        </a>
      <tr style="border: 9px solid; padding: 10px;">
            <td><a href="{{'@'.$post_user->get_post_user->username}}"><b>{{$post_user->get_post_user->name}} 
                @if(!empty($post_user->get_post_user->verifikasi))
              <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> 
               @else
               @endif
            </b></a></td>
            <td>{{$post_user->status}}</td>
      </tr>
      <div style="float:right; text-align: right; font-size:7px; padding-top: 5px;">
                 <i>{{$post_user->updated_at}}</i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;"> </a>
      </div>
      
      </div>
      <div style="width: 20px; height: 90px; border: 0px solid; float: right;">
        @guest
        @else
        @if($post_user->get_post_user->id == Auth::user()->id)
         <i class="btn btn-secondary" data-toggle="modal" data-target="#editpost" style="width: 15px; height: 15px; padding: 0px; margin: 0px;"><img src="themes\images\edit.png"></i>
        @else
        @endif
        @endguest
      <!-- Modal edit post-->
<div class="modal fade" id="editpost" tabindex="-1" role="dialog" aria-labelledby="editpost" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    
      <h5 class="modal-title" id="edit_post">Edit Post</h5>
      
    </div>
    <div class="modal-body">
      <form action="{{route('post_update')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="asal" value="{{'post_'.$post_user->post_id}}">
                <input type="hidden" name="post_id" value="{{$post_user->post_id}}">
                <textarea style="width: 500px; height: 200px" name="status"> {{$post_user->status}} </textarea>
                <center><button type="submit" class="btn btn-primary">update</button></center>
     </form>
    </div>
    <div class="modal-footer">
      <div style="width: 160px; float: left; border: 0px solid; text-align: left;">
        <form action="{{route('post_delete')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="asal" value="{{'@'.$post_user->username}}">
                <input type="hidden" name="post_id" value="{{$post_user->post_id}}">
                <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      </div>

      <div style="width: 180px; float: left; border: 0px solid; text-align: center;">

     </div>
     <div style="width: 160px; float: right; border: 0px solid">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<!--end edit post -->

      </div>
      <div class="clr" style="width: 300px; height: 30px; padding-left: 10px; border: 0px solid;">
          
                    <div style="max-width: 100px; height: 30px;  border: 0px solid; float: left; padding-top: 5px;">
                      {{$count_likes}}
                    </div>
                    <div style="max-width: 50px; height: 30px;  border: 0px solid; float: left; ">
                     @guest
                      <a href="login"><img src="themes/images/lolid.jpg" class="img-circle" style="padding-top: 2px;"></a>
                     @else
                      @if(!empty($likes_post_user_id))
                                        <form action="{{'like_id/delete/'.$likes_post_user_id->like_id}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="asal" value="{{'post_'.$post_user->post_id}}">
                                            <input type="hidden" name="post_id" value="{{$post_user->post_id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 33px; height: 30px; padding: 2px;">
                                              <img src="themes/images/lolid.jpg" class="img-circle" style="padding-top: 2px;"> 
                                               </button>
                                            </form>
                       @else
                                            <form action="{{route('like_post_id_save')}}" method="POST">
                                            {{ csrf_field() }}
                                             <input type="hidden" name="asal" value="{{'post_'.$post_user->post_id}}">
                                            <input type="hidden" name="post_id" value="{{$post_user->post_id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 33px; height: 30px; padding: 2px;">
                                                <img src="themes/images/lol.jpg" class="img-circle" style="padding-top: 2px;">
                                               </button>
                                              </form>
                      @endif
                      @endguest
                     </div> 
                    <div style="max-width: 100px; height: 30px;  border: 0px solid; float: left;  padding-top: 5px;">
                    {{$count_comment}}
                    </div>
                     <div style="max-width: 50px; height: 30px;  border: 0px solid; float: left; ">
                         <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#share" style="background-color: white; width: 34px; height: 32px; padding: 4px;">
                           <img src="themes/images/comment.jpg" class="img-circle" >
                         </button>
                     </div>
                     <div style="max-width: 50px; height: 30px;  border: 0px solid; float: left; padding-left: 7px;">
                         <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#share" style="background-color: white; width: 33px; height: 33px;">
                          <img src="themes/images/right.jpg" class="img-circle"> 
                         </button>
                    </div>
                 
      </div> 
      <br/>
        <div style="padding-left: 20px;">
         @if(!empty($comment_post))
            @foreach($comment_post as $cp)
         
         <div style="width: 280px; height: auto; border: 0px solid; float: left; padding: 0px;">
              <div style="width: 280px; border: 0px solid;">
                @if(!empty($cp->get_comment_user->image_profil))
              <img src="{{url('image_user/view/'.$cp->get_comment_user->image_profil)}}" class="img-circle" style="width: 25px; height: 25px; float: left;">
               @else
               <img src="themes/images/profil.jpg" class="img-circle" style="width: 25px; height: 25px; float: left;">
               @endif   
               <div style="width: 280px; height: auto; border: 0px solid;">
               <a href="{{'@'.$cp->get_comment_user->username}}"><b>{{$cp->get_comment_user->name}}
                @if(!empty($cp->get_comment_user->verifikasi))
                <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> 
                @else
                @endif
                </b></a>
                   {{$cp->comment_desc}}
                 
                   <div style="width: 70px;text-align: right; float:right; font-size:7px; padding-top: 5px;">
                    <i style="float: left;">{{$cp->updated_at}}</i>
                    @guest
                    @else
                      @if($cp->get_comment_user->id == Auth::user()->id || $post_user->get_post_user->id == Auth::user()->id)
                      <div style="float: left; padding-left: 5px;">
                      <form action="comment_id/delete/{{$cp->comment_id}}" method="post">
                         {{ csrf_field() }}
                       <input type="hidden" name="asal" value="{{'post_'.$post_user->post_id}}">
                       <button class="btn" type="submit" style="height: 0px; padding: 0px; margin: 0px;"> <img  src="themes\images\edit1.png" style=" padding-bottom: 20px; margin: 0px;"></button>
                      </form>
                    </div>
                     @else
                       
                     @endif
                    @endguest
                  </div>
              </div>
            <br/>
          </div>
        </div>
           @endforeach
         @endif
         </div>
      <div class="span4" style="border: 0px solid;">            
         <div style="padding-left: 0px">
              @guest
              @else
              <form action="{{route('comment_post_id_save')}}" method="POST">
              {{ csrf_field() }}
              <div style="width: 50px; float: left; border: 0px solid;"><a href="">

                @if(!empty(Auth::user()->image_profil))
                <img src="{{url('image_user/view/'.Auth::user()->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;"> 
                @else
                <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
                @endif
              </a>
              </div>
              
              <div style=" width: 160px; float: left; padding-top: 9px; border: 0px solid;">
              <input type="hidden" name="asal" value="{{'post_'.$post_user->post_id}}">
              <input type="hidden" name="post_id" value="{{$post_user->post_id}}">
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <input type="hidden" name="name" value="{{Auth::user()->name}}">
              <input type="hidden" name="username" value="{{Auth::user()->username}}">
              <input type="text" name="comment_desc" placeholder="add your comment" style="width: 145px; border: 0px;">
              </div>
              <div style="width: 80px; float: left; padding-top: 8px; border: 0px;">
              <input class="btn btn-success btn-mini" type="submit" value="comment">
              </div>
              
              
            </form>
            @endguest
         </div>
        
        <br class="clr"/>
      </div>
        
  </div>
</div>          


@endsection
