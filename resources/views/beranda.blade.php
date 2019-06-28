@extends('master_beranda')

@section('content')
 
<!-- post comment grup -->
<div style="width: 880px; height: auto; border:1px solid; float: left; padding: 5px;">
  
   <div style="width: 480px; height: auto; border:1px solid; border-color: red; float: left; padding: 4px;">
     <div style="width: 465px;height: auto; border: 1px solid; border-color: blue; padding: 5px;">
            <form action="{{route('post_save')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @if (Session::get('success'))
                  <div class="alert alert-success">
                  <center>
                    <p>{{ Session::get('success') }}</p>
                  </div>
              @endif
                      
              @if (Session::get('warning'))
              <div class="alert alert-danger">
                    <p>{{ Session::get('warning') }}</p>
              </div>
              @endif
                
                <div class="form-group">
                       <div class="col-sm-10">
                            <input  type="hidden" name="asal" value="beranda" >
                            <input class="form-control" id="#" type="hidden" name="user_id" value="{{Auth::user()->id}}" >
                            <input class="form-control" type="text" name="status" placeholder="Apa yang anda lakukan ?" style="width: 450px;">
                       </div>
                </div>
                 <div class="form-group" id="myTab" style="width: 450px;">
                      <div class="col-sm-2 " style="width: 200px; float: left;">
                      <input type="file" class="btn-mini" name="image_post" >
                      </div>
                      
                      <div class="tab-content" style="width: 240px; height: 35px; float: left; border: 0px solid;">
                        <div style="width: 20px; float: left;">
                          <a href="#lokasi" data-toggle="tab"><button style="padding: 0px; margin: 0px;"><img src="themes/images/alamat.jpg" style="height: 15px; float: left"></button></a>
                       </div>                     
                        <div class="tab-pane" id="lokasi" style="width: 200px; height: 25px; float: left; padding-top: 3px;">
                          <input type="text" class="btn-mini" name="lokasi" placeholder="tambah lokasi" style="width: 200px; height: 10px; float: left;">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                         <div class="col-sm-10">
                            <button class="btn btn-sm btn-primary">Post</button>        
                         </div>
                </div>
              </form>
     </div>
     <div style="width: 465px;height: auto; border: 1px solid; border-color: blue; padding: 5px;">
        
            @if(!empty($post_user))
            @foreach($post_user as $p )
                    
              <div class="row">
                     <?php
                                    $post_id = $p->post_id;
                                    $post_user_id = $post_user->where('post_id',$post_id)->first();
                                    $comment_post_get = $comment_post->where('post_id',$post_id);
                                    $likes_post_user_id = $likes_user_post_all->where('post_id',$p->post_id)->where('user_id',Auth::user()->id)->first(); 
                      ?>   
                      <div class="span6" style="padding:0px; border: 0px solid;" id="{{$p->post_id}}">
                        <div style="width: 450px; height: 50px; border: 0px solid;">
                          <div style="width: 50px;  height: 50px; padding: 0px; margin: 0px; border: 0px solid; float: left;">
                            <a href="{{'@'.$p->get_post_user->username}}">
                              @if(!empty($p->get_post_user->image_profil))
                              <img src="{{url('image_user/view/'.$p->get_post_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                              @else
                              <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                              @endif
                             </a>
                          </div>
                          <div style="width: 390px;  height: 50px; border: 0px solid; float: left;">
                              <a href="{{'@'.$p->get_post_user->username}}">
                               <div style="width: 380px; height: 15px; border: 0px solid;  padding-top: 10px;"><b>{{$p->get_post_user->name}}</b>
                                @if(!empty($p->get_post_user->verifikasi))
                                <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                                @else
                                @endif
                              </div>
                                  <div style="width: 200px; font-size: 13px;  height: 15px; border: 0px solid; float: left">
                                      <p><small><i>@</i></small><small><i>{{$p->get_post_user->username}}</i></small></p>
                                  </div>
                                  <div style="width: 170px; font-size: 13px; height: 15px; border: 0px solid; float: left;">
                                      <small><i>@if(!empty($p->lokasi))
                                                 <img src="themes/images/alamat.jpg" style="height: 15px; float: left; padding-right: 3px; font-size: 13px;"/>{{$p->lokasi}}
                                                @else
                                                @endif
                                            </i>
                                      </small>
                                  </div>
                               
                              </a>
                         </div>
                      </div>
                      <center>
                         <div style="height: 330px; overflow: hidden;  border: 0px solid; margin: 0; padding-left: 0; padding-right: 0; clear: left;">
                            <a href="{{'post_'.$p->post_id}}"><img src="{{url('image_post/view/'.$p->image_post)}}"  alt="" style="display: block; height: 100%;  margin: 0;" /></a>
                          </div>
                      </center>
                       
                              <div style="width: 460px; height: 35px; border: 0px solid; padding-top: 5px;">
                                <div style="width: 225px; height: 35px; border: 0px solid; float: left;">
                                      <div style="width: 40px; float: left;">
                                             @if(!empty($likes_post_user_id))
                                              <form action="{{'like/delete/'.$likes_post_user_id->like_id}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="asal" value="beranda">
                                            <input type="hidden" name="post_id" value="{{$p->post_id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                                              <img src="themes/images/lolid.jpg"> 
                                               </button>
                                              </form>
                                             @else
                                            <form action="{{route('like_post_save')}}" method="POST">
                                            {{ csrf_field() }}
                                             <input type="hidden" name="asal" value="beranda">
                                            <input type="hidden" name="post_id" value="{{$p->post_id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                                                <img src="themes/images/lol.jpg">
                                               </button>
                                              </form>
                                            @endif 
                                           
                                      </div>
                                      <div style="width: 40px; float: left;">
                                          <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#comment{{$post_id}}" style="background-color: white; width: 37px; height: 35px;">
                                            <img src="themes/images/comment.jpg"> 
                                         </button>
                                      </div>
                                      <div style="width: 40px; float: left;">
                                          <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#share{{$post_id}}" style="background-color: white; width: 37px; height: 35px;">
                                            <img src="themes/images/right.jpg" class="img-circle"> 
                                          </button>
                                          
                                              
                                      </div>
                                  </div>
                                  <div style="width: 225px; border: 0px solid; float: right; text-align: right; padding-top: 10px;">
                                {{$p->created_at}}
                                  </div>
                              </div>
                              <div style="width: 450px; border: 0px solid; float: left; padding-left: 10px; padding-bottom: 0px;">  
                                  <div style="width: 55px; border: 0px solid; float: left;">         
                                          <a href="{{'post_'.$p->post_id}}"  data-toggle="modal" data-target="#likes{{$post_id}}">
                                          <?php
                                               $likes_post_user = $likes_user_post_all->where('post_id',$p->post_id);
                                               $likes_post_user_limit = $likes_user_post_l->where('post_id',$p->post_id);
                                               
                                               $count_likes_post = $likes_post_user->count();
                                               
                                              echo $count_likes_post ;
                                          ?>
                                            <img src="themes/images/lol.jpg" style="width: 40%"> 
                                          </a>
                                      
                                    </div>
                                    <div style="width: 100px; border: 0px solid; float: left;">
                                       <a href="{{'post_'.$p->post_id}}"  data-toggle="modal" data-target="#comment{{$post_id}}">
                                            <?php $count_comment_post_w = $comment_post_t->where('post_id',$p->post_id)->count();
                                              echo $count_comment_post_w ;
                                          ?>
                                        <img src="themes/images/comment.jpg" style="width: 22%"> 
                                      </a>
                                    </div>
                                    <br/>
                                    <div style="width: 430px; height: 15px; border: 0px solid; text-align: left; float: left;">

                                      @if(!empty($count_likes_post > 0))
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
                                        <div style="width: 410px; height: 15px; padding-bottom: 0 px;  border: 0px solid; padding-left: 5px; ">
                                          @foreach($likes_post_user_limit as $lp )
                                            <b style="font-size: 10px; font-style: italic;">
                                            <a href="{{'@'.$lp->get_like_user->username}}">
                                                @if($lp->get_like_user->id == Auth::user()->id)
                                                   Anda
                                                @else
                                                  {{$lp->get_like_user->name}}
                                                @endif
                                            </a>
                                            </b>
                                            ,
                                           
                                          @endforeach
                                          @if($count_likes_post >= 3)
                                             <i class="btn btn-secondary" data-toggle="modal" data-target="#likes{{$post_id}}" style=" height: 10px; padding: 0px ; margin: 0px; font-size: 10px;"> <sup><b>dan {{$count_likes_post-1}} lainnya</b></sup></i>
                                            <i style="padding-left: 5px; font-size: 10px;">menyukai</i>
                        
                                           
                                                <!-- Modal likes-->
                                          <div style="padding-top: 0px; ">
                                            <div class="modal fade" id="likes{{$post_id}}" tabindex="-1" role="dialog" aria-labelledby="comment" aria-hidden="true" style="padding-bottom: 0px; margin-bottom: 0px;">
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
                                                      @if(!empty($likes_post_user))
                                                            @foreach($likes_post_user as $lpu)
                                                         <?php 
                                                           $user_id_f =  $lpu->get_like_user;
                                                         
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
                                                          @if($user_id_f->id == Auth::user()->id)
                                                          @else
                                                          <?php
                                                           $followed_id_f = $followed_user->where('followed_user_id',$lpu->get_like_user->id)->first();
                                                          ?>
                                                          <div style="width: 330px; height: 35px; border: 0px solid; float: right;">
                                                             <div style="float: left;">
                                                               @if(!empty($followed_id_f))
                                                                  <form action="{{route('follow_delete')}}" method="POST">
                                                                  {{ csrf_field() }}
                                                                      <input type="hidden" name="asal" value="{{'@'.$user_id_f->username}}">
                                                                      <input type="hidden" name="follower_id" value="{{$followed_id_f->id}}">
                                                                      <input type="hidden" name="followed_id" value="{{$followed_id_f->id}}">
                                                                      <input type="hidden" name="username" value="{{$user_id_f->username}}">
                                                                      <div style="width: 80px;">
                                                                      <button tipe="submit" class="btn btn-secondary btn-mini" > Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'> </button>
                                                                     </div>
                                                                    </form>
                                                                @else
                                                                  <form action="{{route('follow_save')}}" method="POST">
                                                                  {{ csrf_field() }}
                                                                      <input type="hidden" name="asal" value="{{'@'.$user_id_f->username}}">
                                                                      <input type="hidden" name="user_id" value="{{$user_id_f->id}}">
                                                                      <input type="hidden" name="follow_user_id" value="{{Auth::user()->id}}">
                                                                      <input type="hidden" name="username" value="{{$user_id_f->username}}">
                                                                      <div style="width: 80px;">
                                                                      <button tipe="submit" class="btn btn-success btn-mini" >Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button>
                                                                     </div>
                                                                  </form> 
                                                                @endif
                                                                
                                                                  </form>
                                                              </div> 
                                                        <div style="float: left;">
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
                                          @if($count_likes_post <= 2)
                                          <i style="padding-left: 5px; font-size: 10px;">menyukai</i>
                                          @else
                                          @endif
                                        </div>
                                        @else
                                        @endif

                                    </div>
                              </div>
                                 <i class="clr"></i>
                              <div style="width: 450px;">
                                <a href="{{'@'.$p->get_post_user->username}}"><b>{{$p->get_post_user->name}}</b>
                                  @if(!empty($p->get_post_user->verifikasi))
                                  <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                                  @else
                                  @endif
                                </a>
                                {{$p->status}}
                             </div>
                            <div style="border: 0px solid; padding-left: 20px;">
                              
                               
                              <a href=""><i data-toggle="modal" data-target="#comment{{$post_id}}">lihat {{$count_comment_post_w}} comentar ...</i></a>
                            </div>
                              <!-- Modal comment-->
<div style="padding-top: 0px; ">
<div class="modal fade" id="comment{{$post_id}}" tabindex="-1" role="dialog" aria-labelledby="comment" aria-hidden="true" style="padding-bottom: 0px; margin-bottom: 0px;">
<div class="modal-dialog" role="document"  style="padding-bottom: 0px; margin-bottom: 0px;">
<div class="modal-content"  style="padding-bottom: 0px; margin-bottom:  0px;">
  <div class="modal-header" style="width: 520px; height: auto; border: 0px solid">
    <button type="button" class="close" data-dismiss="modal" aria-label="tutup"><span aria-hidden="true">&times;</span></button>
      <div style="width: 500px; height: auto; border: 0px solid; border-color: red;  padding-left: 0px; padding-top: 0px; padding-right: 0px;">
          <div style="width: 30px; border: 0px solid; float: left; padding-left: 0px; padding-top: 0px;">
            <button data-dismiss="modal" class="img-circle"  aria-label="kembali" style="float: left; padding: 0px;margin: 0px;">
              <img src="themes/images/kembali.png"  class="img-circle" style="width: 25px;">
            </button>
          </div>
          <div style="width: 465px; height: auto; border: 0px solid; float: left; padding-top: 0px;">
             <a href="{{'@'.$post_user_id->get_post_user->username}}">
                @if(!empty($post_user_id->get_post_user->image_profil))
                <div style="width: 40px; height: 40px; border: 0px solid; float: left;">
                    <img src="{{url('image_user/view/'.$post_user_id->get_post_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"/>
                </div>
                @else
                <div style="width: 40px; height: 40px; border: 0px solid; float: left;">
                    <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"/>
                </div>
                @endif
              </a>
                  <div style="width: 300px; height: 20px; border: 0px solid; float: left;">
                  <h5>{{$post_user_id->get_post_user->name}}
                       @if(!empty($post_user_id->get_post_user->verifikasi))
                      <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 0px;"/>
                      @else
                      @endif
                   </h5>
                  </div>
                  <div style="width: 200px; font-size: 12px; float: left; border: 0px solid; padding-top: 5px;">
                          <p><small><i>@</i></small><small><i>{{$post_user_id->get_post_user->username}}</i></small></p>
                  </div>
                 
                  <div style="width:320px; height: auto; border: 0px solid; float: left; padding-left: 40px;">
                    <b>{{$post_user_id->get_post_user->name}}</b>
                       @if(!empty($post_user_id->get_post_user->verifikasi))
                      <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"/> 
                      @else
                      @endif
                          {{$post_user_id->status}}
                  </div>
                
                <div style="width: 100px; border: 0px solid; float:right; font-size:7px; padding-top: 5px; text-align: right;">
                     <i>{{$post_user_id->updated_at}}</i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;"> </a>
                </div>
                 
          </div>
      
    
      </div>
        <br>
                 <div class="clr" style="width: 465px; height: 30px; padding-left: 30px; border: 0px solid;">
                    <div style="max-width: 200px; height: 30px;  border: 0px solid; float: left; padding-top: 5px;">
                      {{$count_likes_post}}
                    </div>
                    <div style="max-width: 50px; height: 30px;  border: 0px solid; float: left; "> 
                      @if(!empty($likes_post_user_id))
                                        <form action="{{'like/delete/'.$likes_post_user_id->like_id}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="asal" value="beranda">
                                            <input type="hidden" name="post_id" value="{{$p->post_id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 33px; height: 30px; padding: 2px;">
                                              <img src="themes/images/lolid.jpg" class="img-circle" style="padding-top: 2px;"> 
                                               </button>
                                            </form>
                       @else
                                            <form action="{{route('like_post_save')}}" method="POST">
                                            {{ csrf_field() }}
                                             <input type="hidden" name="asal" value="beranda#b'.$p->post_id">
                                            <input type="hidden" name="post_id" value="{{$p->post_id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 33px; height: 30px; padding: 2px;">
                                                <img src="themes/images/lol.jpg" class="img-circle" style="padding-top: 2px;">
                                               </button>
                                              </form>
                      @endif
                     </div> 
                    <div style="max-width: 200px; height: 30px;  border: 0px solid; float: left;  padding-top: 5px;">
                    {{$count_comment_post_w}}
                    </div>
                     <div style="max-width: 50px; height: 30px;  border: 0px solid; float: left; ">
                         <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#share{{$post_id}}" style="background-color: white; width: 34px; height: 32px;  padding: 4px;">
                           <img src="themes/images/comment.jpg" class="img-circle" >
                         </button>
                     </div>
                     <div style="max-width: 50px; height: 30px;  border: 0px solid; float: left; padding-left: 8px; ">
                         <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#share{{$post_id}}" style="background-color: white; width: 33px; height: 33px;">
                          <img src="themes/images/right.jpg" class="img-circle"> 
                         </button>
                    </div>
                  </div> 
  </div>

  <div class="modal-body" style="width: 490px; height: 160px; border: 0px solid;" >

    <!-- isi modul -->   
    <div style=" padding-left: 20px; ">
     @if(!empty($comment_post_get))
        @foreach($comment_post_get as $cp)
     
        <div style=" width: 465px; height: auto; border: 0px solid; float: left; padding-top: 0px; padding-bottom: 0px;">
            @if(!empty($cp->get_comment_user->image_profil))
            <img src="{{url('image_user/view/'.$cp->get_comment_user->image_profil)}}" class="img-circle" style="width: 25px; height: 25px; float: left;">   
            @else
             <img src="themes/images/profil.jpg" class="img-circle" style="width: 30px; height: 30px; float: left;"> 
            @endif
                <div style="width: 440px;  height: auto; padding-top: 3px;">
                    <a href="{{'@'.$cp->get_comment_user->username}}"><b>{{$cp->get_comment_user->name}}
                      @if(!empty($cp->get_comment_user->verifikasi))
                      <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> 
                      @else
                      @endif
                    </b></a>
                      {{$cp->comment_desc}}
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
  </div>
    <!-- end isi modul -->
  <div class="modal-footer" style="height: 20px; padding-top: 0px;">
       <div  style="width: 510px; border: 0px solid; padding-left: 20px;">            
          <div style="width: 430px; padding-left: 1px; border: 0px solid; float: left;" >
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
                  <form action="{{route('comment_post_save')}}" method="POST">
                  <td>

                        <div style="padding-top: 5px;">
                            
                                {{ csrf_field() }}
                                <input type="hidden" name="asal" value="beranda">
                                <input type="hidden" name="post_id" value="{{$post_user_id->post_id}}">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="text" name="comment_desc" placeholder="tulis komentar anda" style="width: 320px; float: left;">
                      </div>
                 </td>
                 <td>
                      <div style="width: auto; float: left; padding-bottom: 5px;">
                                <input class="btn btn-primary" type="submit" value="comment">
                      </div>
                 </td>
               </form>
          
      </tr>
      </table>
     </div>
        <div style="width: 50px; float: right; border: 0px solid; padding-top: 5px;">
           <i class="btn btn-secondary" data-dismiss="modal">Close</i>
        </div>
  </div>
</div>
</div>
</div>
<!--end modul --> 
  <!-- Modal share-->
                                          <div style="padding-top: 0px; ">
                                            <div class="modal fade" id="share{{$post_id}}" tabindex="-1" role="dialog" aria-labelledby="share" aria-hidden="true" style="padding-bottom: 0px; margin-bottom: 0px;">
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
                                                          <div style="width: 465px; height: auto; border: 0px solid; float: left; padding-top: 0px;"> <h3>Bagikan</h3>           
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
                                                          <div class="fb-share-button"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://lolid.xyz/post_{{$post_id}};src=sdkpreparse" ><img src="themes/images/facebook.jpg"  class="img-circle" style="width: 50px;"></a></div>
                                                            
                                                          </button>
                                                       </div>
                                                       <div style="width: 50px; height: 50px; border: 0px solid; float: left;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 45px; height: 45px; padding: 0px; margin: 0px;">
                                                          <a target="_blank"  class="twitter-share-button" href="https://twitter.com/intent/tweet?text=https://lolid.xyz/post_{{$post_id}}">
                                                            <img src="themes/images/twitter.jpg"  class="img-circle" style="width: 50px;">
                                                            </a>
                                                          </button>
                                                       </div>
                                                       <div style="width: 50px; height: 50px; border: 0px solid; float: left;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 45px; height: 45px; padding: 0px; margin: 0px;">
                                                          <a target="_blank"  href="https://web.whatsapp.com://send?text=https://lolid.xyz/post_{{$post_id}}">
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
              <div style="width: 455px; border: 0px solid; padding: 0px; clear: left;">       
                 <div style="padding-left: 0px">
                  <table>
                  <tr>
                       <form action="{{route('comment_post_id_save')}}" method="POST">
                       <td>
                          @if(!empty(Auth::user()->image_profil))
                        <img src="{{url('image_user/view/'.Auth::user()->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;">
                          @else
                          <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
                          @endif
                      <div style=" width: 325px; float: left; padding-top: 7px;">
                        
                         {{ csrf_field() }}
                         <input type="hidden" name="asal" value="{{'beranda#b'.$p->post_id}}">
                        <input type="hidden" name="post_id" value="{{$p->post_id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                        <input type="text" name="comment_desc" placeholder="tulis komentar anda" style="width: 310px;">
                      </div>
                      <div style="float: left; padding-top: 8px;">
                         <input class="btn btn-success" type="submit" value="comment">
                      </div>
                      </td>
                      </form>
                  </tr>
                  </table>
                 </div>
                
                <br class="clr"/>
              </div>
              
              </div>

             <hr class="soft"/>
          </div> 
          <!--
           grup  post 
             @if(!empty($grup_public_post1))
                      @foreach($grup_public_post as $p)

              <div class="row">   
                <div class="span6" style="padding:10px;">
                   
                   <a href="{{'@'.$p->get_grup_public_post_user->username}}"><img src="{{url('image_user/view/'.$p->get_grup_public_post_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;"></a>
                  
                    <table>
                   
                      <tr>
                          <td> <a href="{{'@'.$p->get_grup_public_post_user->username}}"><h5 style="float: left;">{{$p->get_grup_public_post_user->name}}<img src="{{url('image_user/view/'.$p->get_grup_public_post_user->verifikasi.'.png')}}" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> </a>
                             </h5>
                          </td>
                          <td>di <b><a href="{{'group_'.$p->get_grup_post->grup_id}}">{{$p->get_grup_post->grup_name}}</a></b></td>
                      <tr>
                      <tr>
                          <td>
                            <small><i>@</i></small><small><i>{{$p->get_grup_public_post_user->username}}</i></small>
                          </td>
                       
                     </table>
                 
                  
                   <?php
                    $post_id = $p->grup_public_post_id;
                    $post_user_id = $post_user_grup->where('grup_public_post_id',$p->grup_public_post_id)->first();
                    $post_detail_id = $post_detail_grup->where('grup_public_post_id',$post_user_id->grup_public_post_id)->first();
                    $comment_post_get = $comment_post_grup->where('grup_public_post_id',$post_user_id->grup_public_post_id);

                    ?>
                  
                    <p class="clr"></p>
                   <tr  style="border: 0px solid; padding: 10px;">
                      <td><a href="{{'@'.$p->get_grup_public_post_user->username}}"><b>{{$p->get_grup_public_post_user->name}}<img src="{{url('image_user/view/'.$p->get_grup_public_post_user->verifikasi.'.png')}}" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> </b></a></td>
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
                      <td><form action="{{route('grup_public_like_post_save')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="grup_id" value="{{$p->grup_id}}">
                        <input type="hidden" name="grup_public_post_id" value="{{$p->grup_public_post_id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <a href="#" style="background-color: white;"><button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;"><img src="../themes/images/lol.jpg"> </button></a>
                      </form>
                      </td>
                      </div>
                    <td><a href="{{'post_'.$p->post_id}}" style="background-color: white;">
                      <button class="img-circle" data-toggle="modal" data-target="#comment{{$post_id}}" style="background-color: white; width: 37px; height: 35px;">
                        <img src="../themes/images/comment.png"> 
                      </button></a>
                    </td>
                    <td><a href="" style="background-color: white;"><button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;"><img src="../themes/images/right.png"> </button></a></td>
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
                                           $likes_post_user = $likes_user_post_all_grup->where('grup_public_post_id',$p->grup_public_post_id);
                                           $likes_post_user_limit = $likes_user_post_l_grup->where('grup_public_post_id',$p->grup_public_post_id); 
                                           $count_likes_post = $likes_post_user->count();
                                                     
                                          echo $count_likes_post ;
                                       ?>
                               <img src="../themes/images/lol.jpg" style="width: 40%">
                               </a>
                             </td>
                             
                          </div>
                           <a href="" id="{{$p->grup_public_post_id}}" data-toggle="modal" data-target="#comment{{$post_id}}">
                          <div style="width: 100px; border: 0px solid; float: left;">
                             <td >{{$comment_post_get->count()}} <a href="" data-toggle="tab">
                                  
                               <a href="" id="{{$p->grup_public_post_id}}" data-toggle="modal" data-target="#comment{{$post_id}}"><img src="../themes/images/comment.png" style="width: 22%" > </a>
                            </td>
                          </div>
                          </a>
                          <div style="width: 330px; height: 20px; border: 0px solid; text-align: left; float: left;">

                                                @if(!empty($likes_post_user_limit))
                                                    @foreach($likes_post_user_limit as $lu)
                                                        <a href="{{'@'.$lu->get_grup_public_like_user->username}}"><img src="{{url('image_user/view/'.$lu->get_grup_public_like_user->image_profil)}}" class="img-circle" style="width: 15px; height: 15px; float: left; padding: 0px;"></a>
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
                    
                      <a href=""><i data-toggle="modal" data-target="#comment{{$post_id}}" > lihat comentar ...</i></a>
                  </div>
                   <div>
                             Modal comment
                   
            <div class="modal fade" id="comment{{$post_id}}" tabindex="-1" role="dialog" aria-labelledby="comment" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" >
                <div class="modal-header" style="width: 520px; height: auto; border: 0px solid">
                  <button type="button" class="close" data-dismiss="modal" aria-label="tutup"><span aria-hidden="true">&times;</span></button>
                    <div style="width: 500px; height: auto; border: 0px solid; border-color: red;  padding-left: 0px; padding-top: 0px; padding-right: 0px;">
                        <div style="border: 0px; padding-left: 0px; padding-top: 0px;">
                          <button data-dismiss="modal" class="img-circle"  aria-label="kembali" style="float: left; padding: 0px;margin: 0px;">
                            <img src="themes/images/kembali.png"  class="img-circle" style="width: 25px;">
                          </button>
                        </div>
                        <div style="width: 480px; height: auto; border: 0px solid; padding-top: 20px;">
                           <a href="{{'@'.$post_user_id->get_grup_public_post_user->username}}"><img src="{{url('image_user/view/'.$post_user_id->get_grup_public_post_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"/>
                             
                                <h5>{{$post_user_id->get_grup_public_post_user->name}}
                                    <img src="{{url('image_user/view/'.$post_user_id->get_grup_public_post_user->verifikasi.'.png')}}" class="img-circle" style="width: 15px; height: 15px; padding: 0px;"/>
                                      <div style="font-size: 13px;">
                                        <p><small><i>@</i></small><small><i>{{$post_user_id->get_grup_public_post_user->username}}</i></small></p>
                                      </div>
                                </h5>
                                <div style="width:330px; height: auto; border: 0px solid; float: left; padding-left: 40px;">
                                  <b>{{$post_user_id->get_grup_public_post_user->name}} 
                                    <img src="{{url('image_user/view/'.$post_user_id->get_grup_public_post_user->verifikasi.'.png')}}" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> </b>
                                        {{$post_user_id->status}}
                                </div>
                              </a>
                              <div style="width: 100px; border: 0px solid; float:right; font-size:7px; padding-top: 5px; text-align: right;">
                                   <i>{{$post_user_id->updated_at}}</i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;"> </a>
                              </div>
                        </div>

                     <hr class="soft" />
                    </div>
                </div>
                <div class="modal-body" style="height: 220px; border: 0px solid;" >
                  - isi modul    
                  <div style="padding-left: 20px;">
                   @if(!empty($comment_post_get))
                      @foreach($comment_post_get as $cp)
                   
                      <div style="width: 480px; height: auto; border: 0px solid; float: left; padding: 3px;">
                          <img src="{{url('image_user/view/'.$cp->get_grup_public_comment_user->image_profil)}}" class="img-circle" style="width: 25px; height: 25px; float: left;">   
                              <div style="width:  padding-top: 3px;">
                                  <a href="{{'@'.$cp->get_grup_public_comment_user->username}}"><b>{{$cp->get_grup_public_comment_user->name}}<img src="{{url('image_user/view/'.$cp->get_grup_public_comment_user->verifikasi.'.png')}}" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> </b></a>
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
                  end isi modul 
                <div class="modal-footer">
                     <div  style="width: 520px; border: 0px solid; padding-left: 20px;">            
                        <div style="width: 480px; padding-left: 0px; border: 0px solid" >
                            <table>
                              <tr>
                                <td>
                                      <div style="width: 30px; height: 30px; padding-bottom: 8px;">
                                          <a href=""><img src="{{url('image_user/view/'.Auth::user()->image_profil)}}" class="img-circle" style="width: 30px; height: 30px; "> </a>
                                    </div>
                                </td>
                                <form action="{{route('grup_public_comment_post_save')}}" method="POST">
                                <td>

                                      <div style="padding-top: 5px;">
                                          
                                              {{ csrf_field() }}
                                              <input type="hidden" name="grup_id" value="{{$p->get_grup_post->grup_id}}">
                                              <input type="hidden" name="grup_public_post_id" value="{{$post_user_id->grup_public_post_id}}">
                                              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                             
                                              <input type="text" name="comment" placeholder="tulis komentar anda" style="width: 350px; float: left;">
                                    </div>
                               </td>
                               <td>
                                    <div style="width: auto; float: left; padding-bottom: 5px;">
                                              <input class="btn-success" type="submit" value="comment">
                                    </div>
                               </td>
                             </form>
                        
                    </tr>
                    </table>
                   </div>
                      <div style="width: 450px; float: right; border: 0px solid;">
                         <i class="btn btn-secondary" data-dismiss="modal">Close</i>
                      </div>
                </div>
              </div>
            </div>
            </div>
             end modul 
                    
                   </div>
                </div>
                <div class="span8">        
                  
                   <div style="padding-left: 10px">
                    <table>
                    <tr>
                        <div>
                          <td><a href=""><img src="{{url('image_user/view/'.Auth::user()->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;"></a>
                        </div>
                        <div style=" width: 365px; float: left; padding-top: 5px;">
                          <form action="{{route('grup_public_comment_post_save')}}" method="POST">
                            {{ csrf_field() }}
                                              <input type="hidden" name="grup_id" value="{{$p->get_grup_post->grup_id}}">
                                              <input type="hidden" name="grup_public_post_id" value="{{$post_user_id->grup_public_post_id}}">
                                              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                             
                                              <input type="text" name="comment" placeholder="tulis komentar anda" style="width: 350px; float: left;">
                        </div>
                        <div style="float: left; padding-top: 8px;">
                           <input class="btn-success" type="submit" value="comment">
                        </div>
                          </form>
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
             end grup post 
        -->
         @endforeach
        @endif
        <center>
          <a href="beranda={{$limit_tambah+20}}"><button class="btn btn-medium">tampilkan lebih banyak</button></a>
        </center>
    
       </div>
    </div>
    <div style="width: 250px; height: auto; border: 1px solid; border-color: yellow; float: left; padding: 5px;">
       <div style="width: 200px; height: 20px; border: 0px solid; text-align: center;">
           <h5>Popularitas</h5>
       </div>
       <?php $no = 1 ?>
       @if($rating_detail)
         @foreach($rating_detail as $rt)
       <div style="width: 220px; height: 120px; border: 1px solid; border-color: red; float: left; padding: 5px;">
          <div style="width: 200px; height: 50px; border: 0px solid;">
              <div style="width: 50px;  height: 30px; padding: 1px; margin: 0px; border: 0px solid; float: left; text-align: center; padding-top: 5px;">

                {{$no++}}
               
              </div>
              <div style="width: 130px; height: 30px; border: 0px solid; float: left; padding-top: 5px; ">
                <div style="text-align: center;">
                  <b>{{$rt->rating_popularitas}}</b>
                </div style="text-align: center;">
                <div style="text-align: center;"> 
                 <img src="themes\images\star.png" style="width: 50px;">
                </div>
              
            </div>
            <div class="clr"></div>
                        <div style="width: 220px; height: 50px; border: 0px solid;">
                          <div style="width: 50px;  height: 50px; padding: 0px; margin: 0px; border: 0px solid; float: left;">
                            <a href="{{'@'.$rt->get_rating_detail_user->username}}">
                              @if(!empty($rt->get_rating_detail_user->image_profil))
                              <img src="{{url('image_user/view/'.$rt->get_rating_detail_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                              @else
                              <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                              @endif
                             </a>
                          </div>
                          <div style="width: 160px;  height: 50px; border: 0px solid; float: left;">
                              <a href="{{'@'.$rt->get_rating_detail_user->username}}">
                               <div style="width: 155px; height: 15px; border: 0px solid;  padding-top: 10px;"><b>{{$rt->get_rating_detail_user->name}}</b>
                                @if(!empty($rt->get_rating_detail_user->verifikasi))
                                <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                                @else
                                @endif
                              </div>
                                  <div style="width: 155px; font-size: 13px;  height: 15px; border: 0px solid; float: left">
                                      <p><small><i>@</i></small><small><i>{{$rt->get_rating_detail_user->username}}</i></small></p>
                                  </div>
                                  
                               
                              </a>
                         </div>
                      </div>
                      <div style="width: 220px; height: 30px; border: 0px solid;">
                          <div style="width: 50px;  height: 30px; padding: 0px; margin: 0px; border: 0px solid; float: left;">
                           
                           
                          </div>
                          <div style="width: 160px;  height: 30px; border: 0px solid; float: left;">
                        @if($rt->get_rating_detail_user->id == Auth::user()->id)
                        @else
                         <?php
                            $followed_id = $followed_user->where('followed_user_id', $rt->get_rating_detail_user->id)->first();
                         ?>
                        <div style="width: 150px; height: 25px; border: 0px solid; float: right;">
                          <div style="float: left;">
                         @if(!empty($followed_id))
                          <form action="{{route('follow_delete')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="{{'@'.$rt->get_rating_detail_user->username}}">
                          <input type="hidden" name="follower_id" value="{{$rt->get_rating_detail_user->id}}">
                          <input type="hidden" name="followed_id" value="{{$rt->get_rating_detail_user->id}}">
                          <input type="hidden" name="username" value="{{$rt->get_rating_detail_user->username}}">
                          <button tipe="submit" class="btn btn-secondary btn-mini" style="padding-top: 2px; padding-bottom: 2px; margin: 0px;">Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                         </form>
                          @else
                         <form action="{{route('follow_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="{{'@'.$rt->get_rating_detail_user->username}}">
                          <input type="hidden" name="user_id" value="{{$rt->get_rating_detail_user->id}}">
                          <input type="hidden" name="follow_user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="username" value="{{$rt->get_rating_detail_user->username}}">                  
                          <button tipe="submit" class="btn btn-success btn-mini" style="padding-top: 2px; padding-bottom: 2px; margin: 0px;">Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button> 
                        </form>
                         @endif
                            
                          
                        
                         </div>
                     </div>
                     @endif
                          
                         </div>
                      </div>
                             
          </div>
       </div>
        @endforeach
     @endif
     <div style="width: 220px; height: 40px; border: 0px solid; border-color: red; float: left; padding: 5px; ">
          <div style="width: 210px; height: 40px; border: 0px solid; padding-bottom: 10px;">
               
              <div style="width: 210px; height: 25px; border: 0px solid; padding-left: 5px; padding-top: 10px;">
                  <div style="padding-bottom: 2px; float: left;">
                     <button type="submit" class="btn btn-default btn-mini"><i><img src="themes/images/peringkat.jpg"></i></button>
                  </div>
                  <form>
                    <div style="float: left;" >
                          <input type="text" name="name" placeholder="cari popularitas user disini" style="width: 110px;">
                    </div>
                  <div style="padding-bottom: 2px; float: left;">
                     <button type="submit" class="btn btn-default btn-mini"><i><img src="themes/images/search.jpg"></i></button>
                  </div>
                  </form>
               
              </div>
         
       </div>
    </div>
     <div style="width: 220px; height: 150px; border: 1px solid; border-color: red; float: left; padding: 5px;">
          <div style="width: 200px; height: 150px; border: 0px solid;">
               <div style="width: 50px;  height: 30px; padding: 1px; margin: 0px; border: 0px solid; float: left; text-align: center; padding-top: 5px;">
              </div>
              <div style="width: 130px; height: 25px; border: 0px solid; float: left; padding-top: 10px; ">
                <div style="text-align: center;">
                  <b>Popularitas Saya</b>
                </div style="text-align: center;">
              </div>
              <div class="clr"></div>
              <div style="width: 50px;  height: 30px; padding: 1px; margin: 0px; border: 0px solid; float: left; text-align: center; padding-top: 5px;">
                
              </div>

              <div style="width: 125px; height: 31px; border: 0px solid; float: left; padding-top: 5px; ">
                <div style="text-align: center;">
                  <b>{{$rating_detail_id->rating_popularitas}}</b>
                </div style="text-align: center;">
                <div style="text-align: center;"> 
                 <img src="themes\images\star.png" style="width: 50px;">
                </div>
                
             </div>
            <div class="clr"></div>
                        <div style="width: 220px; height: 50px; border: 0px solid;">
                          <div style="width: 50px;  height: 50px; padding: 0px; margin: 0px; border: 0px solid; float: left;">
                            <a href="{{'@'.Auth::user()->username}}">
                              @if(!empty(Auth::user()->image_profil))
                              <img src="{{url('image_user/view/'.Auth::user()->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                              @else
                              <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                              @endif
                             </a>
                          </div>
                          <div style="width: 160px;  height: 50px; border: 0px solid; float: left;">
                              <a href="{{'@'.Auth::user()->username}}">
                               <div style="width: 155px; height: 15px; border: 0px solid;  padding-top: 10px;"><b>{{Auth::user()->name}}</b>
                                @if(!empty(Auth::user()->verifikasi))
                                <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                                @else
                                @endif
                              </div>
                                  <div style="width: 155px; font-size: 13px;  height: 15px; border: 0px solid; float: left">
                                      <p><small><i>@</i></small><small><i>{{Auth::user()->username}}</i></small></p>
                                  </div>
                                  
                               
                              </a>
                         </div>
                      </div>                        
        </div>
    </div>
     
   </div>
 


@endsection
