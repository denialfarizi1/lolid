@extends('mmaster_beranda')

@section('content')

<div style="width: 500px; height: auto; border:1px solid;  padding: 5px;">
  
   <div style="width: 490px; height: auto; border:1px solid; border-color: red;  padding: 4px;">
     <div style="width: 480px;height: 80px; border: 1px solid; border-color: blue; padding: 5px; background-image: url('themes/images/grup.jpg');">
            <div style="font-size: 20px; text-align: center; padding-top: 30px;">
            {{$grup_id->grup_name}}
            </div>     
     </div>
    <div style="width: 480px; height: 30px; border:1px solid; border-color: yellow;  padding: 5px;">
      <?php 
        $count_grup_public_user = $grup_public_user->count();
        $count_grup_public_admin = $grup_public_admin->count();
        $grup_public_admin_id = $grup_public_admin->where('user_id', Auth::user()->id)->first();
       ?>
        <div style="width: 80px; float: left; padding: 5px;">
            <button class="btn btn-success btn-mini" data-toggle="modal" data-target=".admin"><b > Admin [{{$count_grup_public_admin}}]</b></button>
        </div>
        <!-- Modal admin -->
<div class="modal fade admin" tabindex="-1" role="dialog" aria-labelledby="admin" aria-hidden="true" style="width: 460px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 420px;">
      <div class="modal-header" style="width: 420px; height: 20px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Admin</h5>
        
      </div>
      <div class="modal-body" style="width: 410px; height: 120px; border: 0px solid;">     
        <div>
          <table>
          @if(!empty($grup_public_admin))
            @foreach($grup_public_admin as $gpu)
        <tr>
          <td>
              <div style="width: 250px; height: 50px; border: 0px solid;">
                  <div style="width: 50px; height: 50; border: 0px solid;">
                      <a href="{{'@'.$gpu->get_grup_public_admin->username}}">
                          @if(!empty($gpu->get_grup_public_admin->image_profil))
                        <img src="{{url('image_user/view/'.$gpu->get_grup_public_admin->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                          @else
                        <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                          @endif
                      </a>
                  </div>
                  <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px;">
                      <a href="{{'@'.$gpu->get_grup_public_admin->username}}">
                          <h5 style="margin: 4px;" >{{$gpu->get_grup_public_admin->name}}
                              @if(!empty($gpu->get_grup_public_admin->verifikasi))
                            <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                            @else
                            @endif
                      <div style="font-size: 13px;">
                      <p><small><i>@</i></small><small><i>{{$gpu->get_grup_public_admin->username}}</i></small></p>
                      </div>
                      </h5>
                      </a>
                  </div>
                </div>
           </td>
           <td>
                         <?php 
                            $user_id =  $gpu->get_grup_public_admin;
                            $follower_id = $follower_user->where('user_id', $user_id->id)->first();
                            $followed_id = $followed_user->where('followed_user_id', $user_id->id)->first();
                         ?>
                         @if($user_id->id == Auth::user()->id)
                          @else
                        <div style="width: 330px; height: 35px; border: 0px solid; float: right;">
                        <div style="float: left; width: 80px;">
                         @if(!empty($follower_id))
                          <form action="{{route('follow_delete')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="follower_id" value="{{$follower_id->follower_id}}">
                          <input type="hidden" name="followed_id" value="{{$followed_id->followed_id}}">
                          <input type="hidden" name="username" value="{{$user_id->username}}">
                          <button tipe="submit" class="btn btn-secondary btn-mini" > Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'> </button>
                        </form>
                          @else
                         <form action="{{route('follow_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id" value="{{$user_id->id}}">
                          <input type="hidden" name="follow_user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="username" value="{{$user_id->username}}">
                          <button tipe="submit" class="btn btn-success btn-mini" >Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'> </button>
                        </form>
                            @endif
                            
                       </div>
                        
                        <div style="float: left;">
                        <form action="{{route('message_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id1" value="{{Auth::user()->id}}">
                          <input type="hidden" name="user_id2" value="{{$user_id->id}}">

                          <button tipe="submit" class="btn btn-success btn-mini" >Message <img src="themes/images/mail.png" class="img-circle"> </button>
                         </form>
                         </div>

                         </div>
                          @endif
                </td> 
            </tr>
           @endforeach
         @endif
         </table>
        </div>

      </div>
      <div class="modal-footer" style="width: 410px; height: 20px; border: 0px solid;">
        <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--end admin -->
        <div style="width: 80px; float: left; padding: 5px;">
            <button class="btn btn-success btn-mini" data-toggle="modal" data-target=".anggota"><b > Anggota [{{$count_grup_public_user}}]</b></button>
        </div>
        <div style="width: 150px; float: left; padding: 5px;">
        <button class="btn btn-success btn-mini" data-toggle="modal" data-target=".tambahanggota"><b > Tambah Anggota++</b></button>
        </div>
        @if(empty($grup_public_anggota))
         <div style="padding: 10px;">
           <form action="{{route('grup_anggota_save')}}" method="POST">
                 {{ csrf_field() }}
            <div class="form-group">
              <input type="hidden" name="grup_id" value="{{$grup_id->grup_id}}">
              <input type="hidden" name="grup_name" value="{{$grup_id->grup_name}}">
              <input type="hidden" name="username" id="username" class="form-control"  aria-describedby="username" value="{{Auth::user()->username}}">
              <small id="username" class="form-text text-muted"></small>
            </div>
                <button type="submit" class="btn btn-success btn-mini">Masuk Group</button>
            </form>
        </div>
        @else
        <div style="width: 100px; float: left; padding: 5px;">
               <form action="{{route('grup_anggota_delete')}}" method="POST">
                          {{ csrf_field() }}
                           <input type="hidden" name="grup_id" value="{{$grup_id->grup_id}}"> 
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">                     
                  <button type="submit" class="btn btn-danger btn-mini"><b > Keluar Group</b></button>
              </form>
        </div>
        @endif
        
         <center>
        @if(Session::get('success'))
         <div class="alert alert-success">
           
               <p>{{ Session::get('success') }}</p>
         </div>
         @endif
                        
        @if(Session::get('warning'))
         <div class="alert alert-danger">
              <p>{{ Session::get('warning') }}</p>
         </div>
        @endif
      </center>
    </div>
 <hr class="soft clr">
     @if(!empty($grup_public_anggota))
     <div style="width: 480px;height: auto; border: 1px solid; border-color: blue; padding: 5px;">
            <form action="{{route('post_grup_public_user_save')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                 
                <div class="form-group">
                       <div class="col-sm-10">
                            <input class="form-control" id="#" type="hidden" name="grup_id" value="{{$grup_id->grup_id}}" placeholder="">
                            <input class="form-control" id="#" type="hidden" name="user_id" value="{{Auth::user()->id}}" placeholder="">
                            
                            <input class="form-control" type="text" name="status" placeholder="Apa yang anda pikirkan ?">
                       </div>
                       <div class="form-group">
                      <div class="col-sm-10">
                      <input type="file" name="file_user" style="width: 200px; ">
                      </div>
                </div>
                </div>
                <div class="form-group">
                         <div class="col-sm-10">
                            <button class="btn btn-mini btn-primary">Post</button>        
                         </div>
                </div>
              </form>
     </div>
     @else
     @endif

     <div style="width: 480px;height: auto; border: 1px solid; border-color: blue; padding: 5px;">
           @if(!empty($grup_public_post))
            @foreach($grup_public_post as $p)

    <div class="row">   
      <div class="span6" style="padding:10px;">
         <a href="{{'@'.$p->get_grup_public_post_user->username}}">
          @if(!empty($p->get_grup_public_post_user->image_profil))
          <img src="{{url('image_user/view/'.$p->get_grup_public_post_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
          @else
          <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
          @endif

         </a>
         <a href="{{'@'.$p->get_grup_public_post_user->username}}">
           <h5>{{$p->get_grup_public_post_user->name}}
              @if(!empty($p->get_grup_public_post_user->verifikasi))
            <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
             @else
             @endif
              <div style="font-size: 13px;">
                  <p><small><i>@</small><small>{{$p->get_grup_public_post_user->username}}</i></small></p>
              </div>
           </h5>
        </a>
         <?php
          $post_id = $p->grup_public_post_id;
          $post_user_id = $post_user->where('grup_public_post_id',$p->grup_public_post_id)->first();
          $post_detail_id = $post_detail->where('grup_public_post_id',$post_user_id->grup_public_post_id)->first();
          $comment_post_get = $comment_post->where('grup_public_post_id',$post_user_id->grup_public_post_id);
          $likes_grup_post_user_id = $likes_user_post_all->where('grup_id',$p->grup_id)->where('grup_public_post_id',$p->grup_public_post_id)->where('user_id',Auth::user()->id)->first(); 

          ?>
         <tr style="border: 1px solid; padding: 10px;">
            <td><a href="{{'@'.$p->get_grup_public_post_user->username}}"><b>{{$p->get_grup_public_post_user->name}}
                @if(!empty($p->get_grup_public_post_user->verifikasi))
              <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> 
                @else
                @endif
            </b></a></td>
            @if(!empty($p->image_post))
            <td>
              <img src="{{url('image_post/view/'.$p->image_post)}}"  alt="" style="display: block; height: 100%;  margin: 0;" />
            </td>
            @else
            @endif
            <td id="{{$post_user_id->grup_public_post_id}}">{{$p->status}}</td>
        </tr>

        <center>
        <div style="height: auto; overflow: hidden; margin: 0;">
          
        <a href=""><img src="" id="" alt="" style="display: block; height: 100%;  margin: 0;" /></a>

        </div>
        </center>
        <tr>
          <div style="width: 120px; height: 37px; float: left;">
            <div style="width: 40px; float: left;">
            <td>
                 @if(!empty($likes_grup_post_user_id))
                    <form action="{{'like_grup/delete/'.$likes_grup_post_user_id->grup_public_like_id}}" method="POST">
                      {{ csrf_field() }}
                    <input type="hidden" name="grup_id" value="{{$p->grup_id}}">
                    <input type="hidden" name="grup_public_post_id" value="{{$p->grup_public_post_id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                    <img src="themes/images/lolid.jpg"> 
                     </button>
                    </form>
                @else

              <form action="{{route('grup_public_like_post_save')}}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="grup_id" value="{{$p->grup_id}}">
              <input type="hidden" name="grup_public_post_id" value="{{$p->grup_public_post_id}}">
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;"><img src="themes/images/lol.jpg"> </button>
             </form>
               @endif
            </td>
            </div>
          <td><a href="{{'post_'.$p->post_id}}" style="background-color: white;">
            <button class="img-circle" data-toggle="modal" data-target="#comment{{$post_id}}" style="background-color: white; width: 37px; height: 35px;">
              <img src="themes/images/comment.jpg"> 
            </button></a>
          </td>
          <td><button tipe="submit" class="img-circle" data-toggle="modal" data-target="#share{{$post_id}}" style="background-color: white; width: 37px; height: 35px;"><img src="../themes/images/right.jpg"> </button></td>
          </div>
          <div style="width: 450px; text-align: right; padding-top: 10px;">
          {{$p->created_at}}
          </div>
                               
  
        </tr>
         
        <div class="clr">
        
        <tr>
          <div class="clr" style="width: 300px; padding-left: 10px; padding-bottom: 0px;">
            <tr>
              <div style="width: 55px; border: 0px solid; float: left;">
                   <td > 
                      <a href="" id="{{$p->grup_public_post_id}}" data-toggle="modal" data-target="#comment{{$post_id}}">
                             <?php
                                 $likes_post_user = $likes_user_post_all->where('grup_public_post_id',$p->grup_public_post_id);
                                 $likes_post_user_limit = $likes_user_post_l->where('grup_public_post_id',$p->grup_public_post_id); 
                                 $count_likes_post = $likes_post_user->count();
                                 $count_comment_post = $comment_post_get->count();
                                           
                                echo $count_likes_post ;
                             ?>
                     <img src="../themes/images/lol.jpg" style="width: 40%">
                     </a>
                   </td>
                   
                </div>
                 <a href="" id="{{$p->grup_public_post_id}}" data-toggle="modal" data-target="#comment{{$post_id}}">
                <div style="width: 100px; border: 0px solid; float: left;">
                   <td >{{$count_comment_post}} <a href="" data-toggle="tab">
                        
                     <a href="" id="{{$p->grup_public_post_id}}" data-toggle="modal" data-target="#comment{{$post_id}}"><img src="../themes/images/comment.png" style="width: 22%" > </a>
                  </td>
                </div>
                </a>
                <div style="width: 330px; height: 20px; border: 0px solid; text-align: left; float: left;">

                                      @if(!empty($likes_post_user_limit))
                                          @foreach($likes_post_user_limit as $lu)
                                              <a href="{{'@'.$lu->get_grup_public_like_user->username}}">
                                                  @if(!empty($lu->get_grup_public_like_user->image_profil))
                                                <img src="{{url('image_user/view/'.$lu->get_grup_public_like_user->image_profil)}}" class="img-circle" style="width: 15px; height: 15px; float: left; padding: 0px;">
                                                  @else
                                                <img src="themes/images/profil.jpg" class="img-circle" style="width: 15px; height: 15px; float: left; padding: 0px;">
                                               
                                                  @endif
                                              </a>
                                          @endforeach
                                          @if($count_likes_post >= 15)
                                             <i class="btn btn-secondary" style=" height: 10px; padding: 0px ; margin: 0px; font-size: 10px;"> <sup>more ++</sup></i>
                                          @endif
                                            <i style="padding-left: 5px;">menyukai</i>
                                      @endif

                                    </div>
            </tr>
        </div>
        </tr>
        </div>
        <br class="clr" />
       
        <br/>
        <div style="padding-left: 20px;">
          
            <a href=""><i data-toggle="modal" data-target="#comment{{$post_id}}" > lihat {{$count_comment_post}} comentar ...</i></a>
        </div>
<div>
                  <!-- Modal comment-->
         
<div class="modal fade" id="comment{{$post_id}}" tabindex="-1" role="dialog" aria-labelledby="comment" aria-hidden="true" style="width: 440px; border: 0px solid;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header" style="width: 400px; height: 30px; border: 0px solid">
        <button type="button" class="close" data-dismiss="modal" aria-label="tutup"><span aria-hidden="true">&times;</span></button>
          <div style="width: 380px; height: auto; border: 0px solid; border-color: red;  padding-left: 0px; padding-top: 0px; padding-right: 0px;">
              <div style="border: 0px; padding-left: 0px; padding-top: 0px;">
                <button data-dismiss="modal" class="img-circle"  aria-label="kembali" style="float: left; padding: 0px;margin: 0px;">
                  <img src="themes/images/kembali.png"  class="img-circle" style="width: 25px;">
                </button>
              </div>
              <div style="width: 400px; height: auto; border: 0px solid; padding-top: 20px;">
                 <a href="{{'@'.$post_user_id->get_grup_public_post_user->username}}">
                   @if(!empty($post_user_id->get_grup_public_post_user->image_profil))
                  <img src="{{url('image_user/view/'.$post_user_id->get_grup_public_post_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"/>
                   @else
                    <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"/>
                   @endif
                      <h5>{{$post_user_id->get_grup_public_post_user->name}}
                         @if(!empty($post_user_id->get_grup_public_post_user->verifikasi))
                          <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 0px;"/>
                          @else
                          @endif
                            <div style="font-size: 13px;">
                              <p><small><i>@</i></small><small><i>{{$post_user_id->get_grup_public_post_user->username}}</i></small></p>
                            </div>
                      </h5>
                      <div style="width:330px; height: auto; border: 0px solid; float: left; padding-left: 40px;">
                        <b>{{$post_user_id->get_grup_public_post_user->name}}
                         @if(!empty($post_user_id->get_grup_public_post_user->verifikasi)) 
                          <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                          @else
                          @endif
                           </b>
                              {{$post_user_id->status}}
                      </div>
                    </a>
                    <div style="width: 100px; border: 0px solid; float:right; font-size:7px; padding-top: 5px; text-align: right;">
                         <i>{{$post_user_id->updated_at}}</i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;"> </a>
                    </div>

              </div>
                <br>
                 <div class="clr" style="width: 420px; height: 30px; padding-left: 30px; border: 0px solid;">
                    <div style="max-width: 150px; height: 30px;  border: 0px solid; float: left; padding-top: 5px;">
                      {{$count_likes_post}}
                    </div>
                    <div style="max-width: 50px; height: 30px;  border: 0px solid; float: left; "> 
                      @if(!empty($likes_grup_post_user_id))
                                        <form action="{{'like_grup/delete/'.$likes_grup_post_user_id->grup_public_like_id}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="grup_public_post_id" value="{{$p->grup_public_post_id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 33px; height: 30px; padding: 2px;">
                                              <img src="themes/images/lolid.jpg" class="img-circle" style="padding-top: 2px;"> 
                                               </button>
                                            </form>
                       @else
                                            <form action="{{route('grup_public_like_post_save')}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="grup_id" value="{{$p->grup_id}}">
                                            <input type="hidden" name="grup_public_post_id" value="{{$p->grup_public_post_id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 33px; height: 30px; padding: 2px;">
                                                <img src="themes/images/lol.jpg" class="img-circle" style="padding-top: 2px;">
                                               </button>
                                              </form>
                      @endif
                     </div> 
                    <div style="max-width: 200px; height: 30px;  border: 0px solid; float: left;  padding-top: 5px;">
                    {{$count_comment_post}}
                    </div>
                     <div style="max-width: 50px; height: 30px;  border: 0px solid; float: left; ">
                         <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#share{{$post_id}}" style="background-color: white; width: 34px; height: 33px;  padding: 4px;">
                           <img src="themes/images/comment.jpg" class="img-circle" >
                         </button>
                     </div>
                     <div style="max-width: 50px; height: 30px;  border: 0px solid; float: left; padding-left: 7px; ">
                         <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#share{{$post_id}}" style="background-color: white; width: 33px; height: 33px;">
                          <img src="themes/images/right.jpg" class="img-circle"> 
                         </button>
                    </div>
                  </div>
           <hr class="soft" />
          </div>
      </div>
      <div class="modal-body" style="width: 440px; height: 120px; border: 0px solid;"  >
        <!-- isi modul -->   
        <div style="width: 410px; padding-left: 20px; ">
         @if(!empty($comment_post_get))
            @foreach($comment_post_get as $cp)
         
            <div style="width: 410px; height: auto; border: 0px solid; float: left; padding: 3px;">
              @if(!empty($cp->get_grup_public_comment_user->image_profil))
                <img src="{{url('image_user/view/'.$cp->get_grup_public_comment_user->image_profil)}}" class="img-circle" style="width: 25px; height: 25px; float: left;">   
              @else
                 <img src="themes/images/profil.jpg" class="img-circle" style="width: 25px; height: 25px; float: left;"> 
              @endif
                    <div style="width: 380px; padding-top: 3px;">
                        <a href="{{'@'.$cp->get_grup_public_comment_user->username}}"><b>{{$cp->get_grup_public_comment_user->name}}
                            @if(!empty($cp->get_grup_public_comment_user->verifikasi))
                          <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> @else
                           @endif 
                        </b></a>
                          {{$cp->comment}}
                           <i style="font-size: 8px; float: right;">{{$cp->updated_at}}<a href="comment_id/delete/{{$cp->comment_id}}"><img src="themes\images\edit1.png" style="padding-left: 5px;"> </a></i>
                   </div>
                <br/>
           </div>
           @endforeach
         @endif
         </div>
        
        <br class="clr"/>
      </div>
    
      </div>
        <!-- end isi modul -->
      <div class="modal-footer" style="width: 410px; height: 20px; padding-top: 0px;">
           <div  style="width: 400px; border: 0px solid; padding-left: 20px;">            
              <div style="width: 330px; padding-left: 1px; border: 0px solid; float: left;" >
                  <table>
                    <tr>
                      <td>
                            <div style="width: 30px; height: 30px; padding-bottom: 8px;">
                                <a href="">
                                    @if(!empty(Auth::user()->image_profil))
                                  <img src="{{url('image_user/view/'.Auth::user()->image_profil)}}" class="img-circle" style="width: 30px; height: 30px; "> 
                                    @else
                                  <img src="themes/images/profil.jpg" class="img-circle" style="width: 30px; height: 30px; ">
                                    @endif
                                </a>
                          </div>
                      </td>
                      <form action="{{route('grup_public_comment_post_save')}}" method="POST">
                      <td>

                            <div style="padding-top: 8px; ">
                                
                                    {{ csrf_field() }}
                                    <input type="hidden" name="grup_id" value="{{$grup_id->grup_id}}">
                                    <input type="hidden" name="grup_public_post_id" value="{{$post_user_id->grup_public_post_id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                    <input type="hidden" name="username" value="{{Auth::user()->username}}">
                                    <input type="text" name="comment" placeholder="tambah komentar anda" style="width: 240px; height: 15px;  float: left;">
                          </div>
                     </td>
                     <td>
                          <div style="width: 50px; float: right; padding-bottom: 5px;">
                                    <input class="btn btn-primary btn-mini" type="submit" value="comment">
                          </div>
                     </td>
                   </form>
              
          </tr>
          </table>
         </div>
            <div style="width: 50px; float: right; border: 0px solid; padding-top: 7px;">
               <i class="btn btn-secondary btn-mini" data-dismiss="modal">Close</i>
            </div>
      </div>
    </div>
  </div>
</div>
<!--end modul -->
           <!-- Modal share-->
                                          <div style="padding-top: 0px; ">
                                            <div class="modal fade" id="share{{$post_id}}" tabindex="-1" role="dialog" aria-labelledby="share" aria-hidden="true" style="width: 440px; ">
                                                <div class="modal-dialog" role="document"  style="padding-bottom: 0px; margin-bottom: 0px;">
                                                    <div class="modal-content"  style="width: 410px; ">
                                                      <div class="modal-header" style="width: 410px; height: 20px; border: 0px solid;">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="tutup"><span aria-hidden="true">&times;</span></button>
                                                          <div style="width: 400px; height: auto; border: 0px solid; border-color: red;  padding-left: 0px; padding-top: 0px; padding-right: 0px;">
                                                              <div style="width: 30px; border: 0px solid; float: left; padding-left: 0px; padding-top: 0px;">
                                                                <button data-dismiss="modal" class="img-circle"  aria-label="kembali" style="float: left; padding: 0px;margin: 0px;">
                                                                    <img src="themes/images/kembali.png"  class="img-circle" style="width: 25px;">
                                                                </button>
                                                              </div>
                                                          <div style="width: 365px; height: auto; border: 0px solid; float: left; padding-top: 0px;"> <h6>Bagikan</h6>           
                                                           </div>
                                                        </div>
                                                        <hr class="soft">
                                                      </div>
                                                  <div class="modal-body" style="width: 410px; height: 120px; border: 0px solid;" >
                                                    <!-- isi modul -->   
                                                    <center>
                                                     <div style="width: 180px; height: 50px; border: 0px solid;">
                                                       <div style="width: 50px; height: 50px; border: 0px solid; float: left; padding-top: 70px;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 45px; height: 45px; padding: 0px; margin: 0px;">
                                                          <div class="fb-share-button"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://lolid.xyz/group_{{$p->grup_id}};src=sdkpreparse" ><img src="themes/images/facebook.jpg"  class="img-circle" style="width: 50px;"></a></div>
                                                            
                                                          </button>
                                                       </div>
                                                       <div style="width: 50px; height: 50px; border: 0px solid; float: left; padding-top: 70px;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 45px; height: 45px; padding: 0px; margin: 0px;">
                                                          <a target="_blank"  class="twitter-share-button" href="https://twitter.com/intent/tweet?text=https://lolid.xyz/group_{{$p->grup_id}}">
                                                            <img src="themes/images/twitter.jpg"  class="img-circle" style="width: 50px;">
                                                            </a>
                                                          </button>
                                                       </div>
                                                       <div style="width: 50px; height: 50px; border: 0px solid; float: left; padding-top: 70px;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 45px; height: 45px; padding: 0px; margin: 0px;">
                                                          <a target="_blank"  href="https://web.whatsapp.com://send?text=https://lolid.xyz/group_{{$p->grup_id}}">
                                                           <img src="themes/images/wa.jpg"  class="img-circle" style="width: 50px;">
                                                         </a>
                                                          </button>
                                                       </div>
                                                       
                                                     </div>
                                                   </center>
                                                
                                                </div>
                                              </div>
                                        </div>
                                                  <!-- end isi modul -->
                            <div class="modal-footer" style="width: 400px; height: 20px; padding-top: 0px;">
                              <div  style="width: 410px; border: 0px solid; padding-left: 20px;">            
                                      
                                      <div style="width: 50px; float: right; border: 0px solid; padding-top: 5px;">
                                           <i class="btn btn-secondary btn-mini" data-dismiss="modal">Close</i>
                                      </div>
                              </div>
                         </div>
                        </div>
                      </div>
                  <!--end modul -->       
         </div>
      </div>
      <div class="span7">        
        
         <div style="padding-left: 10px">
          <table>
          <tr>
            <td>
              <div style="width: 480px;">
              <div style="width: 40px; padding: 2px; float: left;">
                <a href="">
                    @if(!empty(Auth::user()->image_profil))
                  <img src="{{url('image_user/view/'.Auth::user()->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;">
                   @else
                  <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
                   @endif
                  </a>
              </div>
              <form action="#" method="POST">
                 {{ csrf_field() }}
              <div style=" width: 345px; float: left; padding-top: 10px;">
                
                <input type="hidden" name="post_id" value="{{$p->grup_public_post_id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                <input type="text" name="comment_desc" placeholder="tambah komentar anda" style="width: 330px; height: 15px;">
              </div>
              <div style="width: 50px; float: left; padding-top: 10px;">
                 <input class="btn btn-success btn-mini" type="submit" value="comment">
              </div>
                </form>
              </div>
              </td>
          </tr>
          </table>
         </div>
        
        <br class="clr"/>
      </div>
      
    </div>

    <hr class="soft"/>
   
       
         @endforeach
        @endif
   
     </div> 
   </div>

 
</div>
<br/>
<!-- Modal anggota -->
<div class="modal fade anggota" tabindex="-1" role="dialog" aria-labelledby="anggota" aria-hidden="true" style="width: 450px; ">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="width: 410px; height: 20px; ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Anggota</h5>
        
      </div>
      <div class="modal-body" style="width: 420px; height: 120px; border: 1px solid;">
        
        <div>
          <table>
          @if(!empty($grup_public_user))
            @foreach($grup_public_user as $gpu)
        <tr>
          <td>
              <div style="width: 200px; height: 50px; border: 1px solid;">
                  <div style="width: 50px; height: 50; border: 0px solid; float: left;">
                      <a href="{{'@'.$gpu->get_grup_public_anggota->username}}">
                          @if(!empty($gpu->get_grup_public_anggota->image_profil))
                        <img src="{{url('image_user/view/'.$gpu->get_grup_public_anggota->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                          @else
                        <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                          @endif
                      </a>
                  </div>
                  <div style="width: 150px; height: 40px; border: 0px solid; padding-top: 4px; float: left;">
                      <a href="{{'@'.$gpu->get_grup_public_anggota->username}}">
                          <h5 style="margin: 4px;" >{{$gpu->get_grup_public_anggota->name}}
                              @if(!empty($gpu->get_grup_public_anggota->verifikasi))
                            <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                            @else
                            @endif
                      <div style="font-size: 13px;">
                      <p><small><i>@</i></small><small><i>{{$gpu->get_grup_public_anggota->username}}</i></small></p>
                      </div>
                      </h5>
                      </a>
                  </div>
                </div>
           </td>
           <td>
                         <?php 
                            $user_id =  $gpu->get_grup_public_anggota;
                            $follower_id = $follower_user->where('user_id', $user_id->id)->first();
                            $followed_id = $followed_user->where('followed_user_id', $user_id->id)->first();
                         ?>
                         @if($user_id->id == Auth::user()->id)
                          @else
                        <div style="width: 200px; height: 35px; border: 0px solid; float: left;">
                        <div style="float: left; width: 80px;">
                         @if(!empty($follower_id))
                          <form action="{{route('follow_delete')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="follower_id" value="{{$follower_id->follower_id}}">
                          <input type="hidden" name="followed_id" value="{{$followed_id->followed_id}}">
                          <input type="hidden" name="username" value="{{$user_id->username}}">
                          <button tipe="submit" class="btn btn-secondary btn-mini" > Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'> </button>
                        </form>
                          @else
                         <form action="{{route('follow_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id" value="{{$user_id->id}}">
                          <input type="hidden" name="follow_user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="username" value="{{$user_id->username}}">
                          <button tipe="submit" class="btn btn-success btn-mini" >Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'> </button>
                        </form>
                            @endif
                            
                       </div>
                        
                        <div style="width: 80px; float: left;">
                        <form action="{{route('message_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id1" value="{{Auth::user()->id}}">
                          <input type="hidden" name="user_id2" value="{{$user_id->id}}">

                          <button tipe="submit" class="btn btn-success btn-mini" >Message <img src="themes/images/mail.png" class="img-circle"> </button>
                         </form>
                         </div>
                         @if(!empty($grup_public_admin_id))
                         <div style="width: 80px; float: left; padding-left: 5px;">
                        <form action="{{route('grup_anggota_delete')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="admin" value="admin">
                          <input type="hidden" name="grup_id" value="{{$grup_id->grup_id}}"> 
                          <input type="hidden" name="user_id" value="{{$user_id->id}}">

                          <button tipe="submit" class="btn btn-danger btn-mini" >Keluarkan</button>
                         </form>
                         </div>
                         @else
                         @endif

                         </div>
                          @endif
                </td> 
            </tr>
           @endforeach
         @endif
         </table>
        </div>

      </div>
      <div class="modal-footer" style="width: 430px; height: 30px; border: 0px solid; padding: 0px; margin: 0px;">
        <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--end anggota -->
<!-- Modal  tambah anggota-->
<div class="modal fade tambahanggota" tabindex="-1" role="dialog" aria-labelledby="tambahanggota" aria-hidden="true" style="width: 450px;  border: 0px solid;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="width: 410px; height: 20px; border: 0px solid;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Tambah Anggota</h5>
        
      </div>
      <div class="modal-body" style="width: 420px; height: 120px; border: 0px solid;">
        <center>
        <div style="width: 200px; height: 80px; padding: 20px;">
         <form action="{{route('grup_anggota_save')}}" method="POST">
          {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Masukan Username</label>
              <input type="hidden" name="grup_id" value="{{$grup_id->grup_id}}">
              <input type="hidden" name="grup_name" value="{{$grup_id->grup_name}}">
              <input type="text" name="username" id="username" class="form-control"  aria-describedby="username" placeholder="masukan username">
              <small id="username" class="form-text text-muted"></small>
            </div>
                <button type="submit" class="btn btn-primary btn-mini">Tambah</button>
            </form>
          </div>
         </center>
      </div>
      <div class="modal-footer" style="width: 430px; height: 30px; border: 0px solid; margin: 0px; padding: 0px;">
        <button type="button" class="btn btn-success btn-mini" data-toggle="modal" data-target="#follower">Follower Anda</button>
        <button type="button" class="btn btn-success btn-mini" data-toggle="modal" data-target="#followed">Followed Anda</button>
        <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--end anggota -->
<!-- Modal follower anda-->
<div class="modal fade" id="follower" tabindex="-1" role="dialog" aria-labelledby="follower" aria-hidden="true" style="width: 460px;  border: 0px solid;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header" style="width: 410px; height: 20px;  border: 1px solid;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="follower">Follower</h5>
        
      </div>
      <div class="modal-body" style="width: 410px; height: 120px; border: 1px solid;">
        <table style="width: 400px;">
        <div style="width: 390px;">
          @if(!empty($follower))
            @foreach($follower as $fr)
             <?php 
                            $user_id_f =  $fr->get_follower_user;
                            $follower_id_f = $follower_user->where('user_id', $user_id_f->id)->first();
                            $grup_public_anggota_id = $grup_public_user->where('user_id', $fr->get_follower_user->id)->first();
                            $followed_id_f = $followed_user->where('followed_user_id', $user_id_f->id)->first();
                         ?>
            <tr>
              <td>
               <div style="width: 180px; height: 50px; border: 1px solid;">
                  <div style="width: 40px; height: 50px; border: 0px solid; float: left;">
                      <a href="{{'@'.$fr->get_follower_user->username}}">
                          @if(!empty($fr->get_follower_user->image_profil))
                        <img src="{{url('image_user/view/'.$fr->get_follower_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 2px;">
                          @else
                        <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 2px;">
                          @endif
                      </a>
                  </div>
                  <div style="width: 130px; height: 40px; border: 0px solid; padding-top: 4px; float: left;">
                      <a href="{{'@'.$fr->get_follower_user->username}}">
                      <h5 style="margin: 4px;" >{{$fr->get_follower_user->name}}
                          @if(!empty($fr->get_follower_user->verifikasi))
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                        @else
                        @endif
                  <div style="font-size: 13px;">
                  <p><small><i>@</i></small><small><i>{{$fr->get_follower_user->username}}</i></small></p>
                  </div>
                  </h5>
                  </a>
                  </div>
                </div>
            </td>
            <td>
            @if(!empty($grup_public_anggota_id)) 
            @else 
              <center>
                <div style="width: 50px; height: 35px; ">
                 <form action="{{route('grup_anggota_save')}}" method="POST">
                     {{ csrf_field() }}
                    <div class="form-group">
                          
                          <input type="hidden" name="grup_id" value="{{$grup_id->grup_id}}">
                          <input type="hidden" name="grup_name" value="{{$grup_id->grup_name}}">
                          <input type="hidden" name="username" id="username" value="{{$user_id_f->username}}" class="form-control"  aria-describedby="username" placeholder="masukan username">
                          <small id="username" class="form-text text-muted"></small>
                    </div>
                <button type="submit" class="btn btn-primary btn-mini">Tambah</button>
                </form>
              </div>
             </center>
             
             @endif
            </td>
            <td>

                   
                        
                         @if($user_id_f->id == Auth::user()->id)
                          @else
                        <div style="width: 170px; height: 35px; border: 0px solid; float: right;">
                        <div style="float: left; width: 80px;">
                         @if(!empty($follower_id_f))
                          <form action="{{route('follow_delete')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="follower_id" value="{{$follower_id_f->follower_id}}">
                          <input type="hidden" name="followed_id" value="{{$followed_id_f->followed_id}}">
                          <input type="hidden" name="username" value="{{$user_id_f->username}}">
                          <button tipe="submit" class="btn btn-secondary btn-mini" >Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                        </form>
                          @else
                         <form action="{{route('follow_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id" value="{{$user_id_f->id}}">
                          <input type="hidden" name="follow_user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="username" value="{{$user_id_f->username}}">
                          <button tipe="submit" class="btn btn-success btn-mini" >Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button>
                          </form> 
                            @endif
                          
                         </div>
                        
                        <div style="width: 80px; float: left;">
                        <form action="{{route('message_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id1" value="{{Auth::user()->id}}">
                          <input type="hidden" name="user_id2" value="{{$user_id_f->id}}">

                          <button tipe="submit" class="btn btn-success btn-mini" >Message <img src="themes/images/mail.png" class="img-circle"> </button>
                         </form>
                         </div>

                         </div>
                          @endif
                </td> 
            </tr> 
           @endforeach
         @endif
        </div>
        </table>

      </div>
      <div class="modal-footer" style="width: 440px; height: 30px; border: 0px solid; padding: 0px; margin: 0px;">
        <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--end follower -->
<!-- followed -->
<div class="modal fade" id="followed" tabindex="-1" role="dialog" aria-labelledby="followed" aria-hidden="true" style="width: 450px;  border: 0px solid;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="width: 410px; border: 0px solid;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="followed">Followed</h5>
        
      </div>
      <div class="modal-body" style="width: 420px; height: 120px; border: 0px solid;">
        <table>
        @if(!empty($followed))
            @foreach($followed as $fd)
                        <?php 
                            $user_id_fd =  $fd->get_followed_user;
                            $follower_id_fd = $follower_user->where('user_id', $user_id_fd->id)->first();
                            $grup_public_anggota_id = $grup_public_user->where('user_id', $fd->get_followed_user->id)->first();
                            $followed_id_fd = $followed_user->where('followed_user_id', $user_id_fd->id)->first();
                         ?>
            <tr>
              <td>
                  <div style="width: 180px; height: 50px; border: 0px solid;">
                      <div style="width: 40px; height: 50; border: 0px solid; float: left">
                          <a href="{{'@'.$fd->get_followed_user->username}}">
                              @if(!empty($fd->get_followed_user->image_profil))
                            <img src="{{url('image_user/view/'.$fd->get_followed_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 2px;">
                              @else
                               <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 2px;">
                              @endif
                          </a>
                      </div>
                      <div style="width: 140px; height: 40px; border: 0px solid; padding-top: 4px; float: left;">
                          <a href="{{'@'.$fd->get_followed_user->username}}">
                              <h5 style="margin: 4px;" >{{$fd->get_followed_user->name}}
                                  @if(!empty($fd->get_followed_user->verifikasi))
                                <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                                @else
                                @endif
                                 <div style="font-size: 13px;">
                                      <p><small><i>@</i></small><small><i>{{$fd->get_followed_user->username}}</i></small></p>
                                  </div>
                              </h5>
                          </a>
                      </div>
                  </div>
            </td>
            <td>
            @if(!empty($grup_public_anggota_id)) 
             @else
             <center> 
                <div style="width: 80px; height: 35px;">
                 <form action="{{route('grup_anggota_save')}}" method="POST">
                     {{ csrf_field() }}
                    <div class="form-group">
                         
                          <input type="hidden" name="grup_id" value="{{$grup_id->grup_id}}">
                          <input type="hidden" name="grup_name" value="{{$grup_id->grup_name}}">
                          <input type="hidden" name="username" id="username" class="form-control"  aria-describedby="username" placeholder="masukan username" value="{{$user_id_fd->username}}">
                          <small id="username" class="form-text text-muted"></small>
                    </div>
                <button type="submit" class="btn btn-primary btn-mini">Tambah</button>
                </form>
              </div>
             </center>
            @endif
            </td>
            <td>        
                        
                       
                          @if($user_id_fd->id == Auth::user()->id)
                          @else
                        <div style="width: 160px; height: 35px; border: 0px solid; float: right;">
                          <div style="float: left; width: 80px">
                         @if(!empty($follower_id_fd))
                          <form action="{{route('follow_delete')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="follower_id" value="{{$follower_id_fd->follower_id}}">
                          <input type="hidden" name="followed_id" value="{{$followed_id_fd->followed_id}}">
                          <input type="hidden" name="username" value="{{$user_id_fd->username}}">
                          <button tipe="submit" class="btn btn-secondary btn-mini" > Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'> </button>
                          </form> 
                          @else
                         <form action="{{route('follow_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id" value="{{$user_id_fd->id}}">
                          <input type="hidden" name="follow_user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="username" value="{{$user_id_fd->username}}">
                          <button tipe="submit" class="btn btn-success btn-mini" >Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button>
                        </form>
                            @endif
                            
                         </div>
                        
                        <div style="width: 80px; float: left;">
                        <form action="{{route('message_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id1" value="{{Auth::user()->id}}">
                          <input type="hidden" name="user_id2" value="{{$user_id_fd->id}}">

                          <button tipe="submit" class="btn btn-success btn-mini" >Message <img src="themes/images/mail.png" class="img-circle"> </button>
                         </form>
                         </div>

                     </div>
                     @endif
                          
                </td> 
            </tr>

            @endforeach
         @endif
        </table>
      </div>
      <div class="modal-footer" style="width: 440px; height: 30px; border: 0px solid; padding: 0px; margin: 0px;">
        <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal">Close</button>
        
      </div>
        
    </div>
  </div>
</div>
<!-- end followed -->


       

@endsection
