@extends('master_beranda')

@section('content')
<!-- post comment-->
<div style="width: 780px; height: auto; border:1px solid; float: right; padding: 5px;">
  
   <div style="width: 525px; height: auto; border:1px solid; border-color: red; float: left; padding: 4px;">
     <div style="width: 510px;height: auto; border: 1px solid; border-color: blue; padding: 5px;">
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
                      <input type="file" name="image_post"  style="width: 200px; ">
                      </div>
                </div>
                <div class="form-group">
                       <div class="col-sm-10">
                            <input class="form-control" id="#" type="hidden" name="user_id" value="{{Auth::user()->id}}" placeholder="">
                           
                            <input class="form-control" type="text" name="status" placeholder="Apa yang anda lakukan ?" style="width: 495px;">
                       </div>
                </div>
                <div class="form-group">
                         <div class="col-sm-10">
                            <button class="btn btn-sm btn-primary">Post</button>        
                         </div>
                </div>
              </form>
     </div>
     <div style="width: 510px;height: auto; border: 1px solid; border-color: blue; padding: 5px;">
        
            @if(!empty($post_user))
            @foreach($post_user as $p )
                    
              <div class="row">
                     <?php
                                    $post_id = $p->post_id;
                                    $post_user_id = $post_user->where('post_id',$post_id)->first();
                                    $comment_post_get = $comment_post->where('post_id',$post_id);
                      ?>   
                      <div class="span6" style="padding:10px;">
                      <a href="{{'@'.$p->get_post_user->username}}">
                        @if(!empty($p->get_post_user->image_profil))
                      <img src="{{url('image_user/view/'.$p->get_post_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                        @else
                        <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                        @endif
                       </a>
                      <a href="{{'@'.$p->get_post_user->username}}">
                       <h5>{{$p->get_post_user->name}}
                        @if(!empty($p->get_post_user->verifikasi))
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                        @else
                        @endif
                      </h5>
                          <div style="font-size: 13px;">
                              <p><small><i>@</i></small><small><i>{{$p->get_post_user->username}}</i></small></p>
                          </div>
                       
                      </a>
                      <center>
                         <div style="height: 350px; overflow: hidden; margin: 0;">
                            <a href="{{'post_'.$p->post_id}}"><img src="{{url('image_post/view/'.$p->image_post)}}" id="b{{$p->post_id}}" alt="" style="display: block; height: 100%;  margin: 0;" /></a>
                          </div>
                      </center>
                       
                              <div style="width: 500px; height: 35px; border: 0px solid; padding-top: 5px;">
                                <div style="width: 240px; height: 35px; border: 0px solid; float: left;">
                                      <div style="width: 40px; float: left;">
                                          <form action="{{route('like_post_save')}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="post_id" value="{{$p->post_id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                                              <img src="themes/images/lol.jpg"> 
                                            </button>
                                          </form>
                                      </div>
                                      <div style="width: 40px; float: left;">
                                          <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#comment{{$post_id}}" style="background-color: white; width: 37px; height: 35px;">
                                            <img src="themes/images/comment.png"> 
                                         </button>
                                      </div>
                                      <div style="width: 40px; float: left;">
                                          <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                                            <img src="themes/images/right.png"> 
                                          </button>
                                      </div>
                                  </div>
                                  <div style="width: 250px; border: 0px solid; float: right; text-align: right; padding-top: 10px;">
                                {{$p->created_at}}
                                  </div>
                              </div>
                              <div style="width: 450px; border: 0px solid; float: left; padding-left: 10px; padding-bottom: 0px;">  
                                  <div style="width: 55px; border: 0px solid; float: left;">         
                                          <a href="{{'post_'.$p->post_id}}" data-toggle="tab" id="{{$p->post_id}}">
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
                                            <?php $comment_post_w = $comment_post_t->where('post_id',$p->post_id)->count();
                                              echo $comment_post_w ;
                                          ?>
                                        <img src="themes/images/comment.png" style="width: 22%"> 
                                      </a>
                                    </div>
                                    <br/>
                                    <div style="width: 330px; height: 20px; border: 0px solid; text-align: left; float: left;">

                                      @if(!empty($likes_post_user_limit))
                                          @foreach($likes_post_user_limit as $lu)
                                              <a href="{{'@'.$lu->get_like_user->username}}">
                                                @if(!empty($lu->get_like_user->image_profil))
                                                <img src="{{url('image_user/view/'.$lu->get_like_user->image_profil)}}" class="img-circle" style="width: 15px; height: 15px; float: left; padding: 0px;">
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
                              
                               
                              <a href=""><i data-toggle="modal" data-target="#comment{{$post_id}}">lihat comentar ...</i></a>
                            </div>
                              <!-- Modal comment-->
     
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
             <a href="{{'@'.$post_user_id->get_post_user->username}}">
                @if(!empty($post_user_id->get_post_user->image_profil))
                <div style="width: 40px; height: 40px; border: 0px solid; float: left;">
                    <img src="{{url('image_user/view/'.$post_user_id->get_post_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"/>
              </div>
                @else
                <div style="width: 40px; height: 40px;cborder: 0px solid; float: left;">
                    <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"/>
                </div>
                @endif
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
                 
                  <div style="width:330px; height: auto; border: 0px solid; float: left; padding-left: 40px;">
                    <b>{{$post_user_id->get_post_user->name}}</b>
                       @if(!empty($post_user_id->get_post_user->verifikasi))</b>
                      <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> 
                      @else
                      @endif
                          {{$post_user_id->status}}
                  </div>
                </a>
                <div style="width: 100px; border: 0px solid; float:right; font-size:7px; padding-top: 5px; text-align: right;">
                     <i>{{$post_user_id->updated_at}}</i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;"> </a>
                </div>
          </div>

       
      </div>
      <hr class="soft clr" />
  </div>

  <div class="modal-body" style="width: 490px; height: 220px; border: 0px solid;" >

    <!-- isi modul -->   
    <div style=" padding-left: 20px;">
     @if(!empty($comment_post_get))
        @foreach($comment_post_get as $cp)
     
        <div style=" height: auto; border: 0px solid; float: left; padding: 3px;">
            @if(!empty($cp->get_comment_user->image_profil))
            <img src="{{url('image_user/view/'.$cp->get_comment_user->image_profil)}}" class="img-circle" style="width: 22px; height: 22px; float: left;">   
            @else
             <img src="themes/images/profil.jpg" class="img-circle" style="width: 25px; height: 25px; float: left;"> 
            @endif
                <div style="width:440px;  height: auto; padding-top: 3px;">
                    <a href="{{'@'.$cp->get_comment_user->username}}"><b>{{$cp->get_comment_user->name}}
                      @if($cp->get_comment_user->verifikasi)
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
    <!-- end isi modul -->
  <div class="modal-footer">
       <div  style="width: 520px; border: 0px solid; padding-left: 20px;">            
          <div style="width: 480px; padding-left: 0px; border: 0px solid" >
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
                               
                                <input type="hidden" name="post_id" value="{{$post_user_id->post_id}}">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="text" name="comment_desc" placeholder="tulis komentar anda" style="width: 350px; float: left;">
                      </div>
                 </td>
                 <td>
                      <div style="width: auto; float: left; padding-bottom: 5px;">
                                <input class="btn-primary" type="submit" value="comment">
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
<!--end modul --> 
                                  
              <div class="span8">       
                 <div style="padding-left: 10px">
                  <table>
                  <tr>
                       <form action="{{route('comment_post_id_save')}}" method="POST">
                       <td>
                          @if(!empty(Auth::user()->image_profil))
                        <img src="{{url('image_user/view/'.Auth::user()->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;">
                          @else
                          <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
                          @endif
                      <div style=" width: 335px; float: left; padding-top: 5px;">
                        
                         {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{{$p->post_id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                        <input type="text" name="comment_desc" placeholder="tulis komentar anda" style="width: 320px;">
                      </div>
                      <div style="float: left; padding-top: 8px;">
                         <input class="btn-success" type="submit" value="comment">
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
          
         @endforeach
        @endif
    
       </div>
    </div>
    <div style="width: 220px; height: auto; border:1px solid; border-color: yellow; float: left; padding: 10px;">
    
    </div>
</div>


@endsection
