@extends('master_beranda_id')

@section('content')

<div style="width: 780px; height: auto; border: 0px solid; float: left; padding: 5px; ">
  <center><a href="{{'image_user/view/'.$user_id->image_background}}">
    <div style="width: 720px; height: 390px; border: 0px solid;  padding: 4px;  @if(!empty($user_id->image_background)) background: url({{'image_user/view/'.$user_id->image_background}}); @else background: url('themes/images/profil_background.jpg'); @endif background-size: 730px; background-repeat: no-repeat; background-position: center;">  
            <div style="width: 710px; height: 290px; border: 0px solid; border-color: blue; padding: 0px; ">
              
            </div>
            <div style="width: 710px; height: 90px; border: 0px solid; border-color: blue; padding: 4px;">
               <div style="width: 140px; height: 90px; float: left; border:0px solid; border-color: blue; padding: 4px;">
                <center>
                @if(!empty($user_id->image_profil))
                <a href="{{'image_user/view/'.$user_id->image_profil}}"><img style="width:90px; height: 90px; border: 0px solid;" src="{{url('image_user/view/'.$user_id->image_profil)}}"/></a>
                 @else
                 <img style="width:90px; height: 90px; border: 0px solid;" src="themes/images/profil.jpg"/>
                 @endif 
                </center>
               </div>
               <div style="width: 550px; height: 50px; float:left; border:0px solid; border-color: green; padding-top: 40px; ">
                    <center>

                    <div style=" width: 350px ; text-align: center; background-color: #F0FFFF;">
                      <table style="width: 350px;border: 1px solid;" class="rounded">
                            <tr>
                              <td><center>{{$count_post_id}}</center></td>
                              <td><center>{{$count_follower}}</center></td>
                              <td><center>{{$count_followed - 1}}</center></td>
                            </tr>
                            <tr>
                              <td><center><a href="#status"><b class="btn" style="padding-top: 2px; padding-bottom: 2px; padding-left: 2px; padding-right: 2px; margin: 0">post</b></a></center></td>
                              <td><center><b class="btn" data-toggle="modal" data-target="#follower" style="padding-top: 2px; padding-bottom: 2px; padding-left: 2px; padding-right: 2px; margin: 0">follower</b>
                                  </center>
                              </td>
                              <td>
                                <center><b class="btn" data-toggle="modal" data-target="#followed" style="padding-top: 2px; padding-bottom: 2px; padding-left: 2px; padding-right: 2px; margin: 0">followed</b>
                                  </center>
                              </td>
                            </tr>
                        </table>
                    </div>
                    @guest
                          @else
                         @if($user_id->id == Auth::user()->id)
                          @else
                        <div style="width: 330px; height: 35px; border: 0px solid; float: right;">
                        <div style="float: left;">
                         @if(!empty($follower_id))
                          <form action="{{route('follow_delete')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="{{'@'.$user_id->username}}">
                          <input type="hidden" name="follower_id" value="{{$follower_id->follower_id}}">
                          <input type="hidden" name="followed_id" value="{{$followed_id->followed_id}}">
                          <input type="hidden" name="username" value="{{$user_id->username}}">
                          <button tipe="submit" class="btn btn-secondary btn-mini" > Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                         </form>
                          @else
                         <form action="{{route('follow_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="{{'@'.$user_id->username}}">
                          <input type="hidden" name="user_id" value="{{$user_id->id}}">
                          <input type="hidden" name="follow_user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="username" value="{{$user_id->username}}">
                          <button tipe="submit" class="btn btn-success btn-mini" >Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button>
                          </form> 
                            @endif
                         </div>
                        
                        <div style="float: left;">
                        <form action="{{route('message_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="message_">
                          <input type="hidden" name="user_id1" value="{{Auth::user()->id}}">
                          <input type="hidden" name="user_id2" value="{{$user_id->id}}">

                          <button tipe="submit" class="btn btn-success btn-mini" >Message <img src="themes/images/mail.png" class="img-circle"> </button>
                         </form>
                         </div>

                         </div>
                          @endif
                    @endguest    
                </center>
              </div>
            </div>

          
     </div>
     </a>
     </center>
     <center>
     <div style="width: 720px; border: 0px solid; clear: left;">
        <div style="width: 165px; border: 0px solid; float: left;">
                  <b>{{$user_id->name}}</b>                     
                    @if(!empty($user_id->verifikasi))<img src="{{url('themes/images/verifikasi.png')}}" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                    @else
                    @endif             
                  <div style="font-size: 10px; padding-right: 20px;">@<i>{{$user_id->username}}</i></div>
        </div>
        <div style="width: 150px height: 140px border:0px solid; float: right;">
            <div style="width: 130px; border: 0px solid; padding-top: 5px;">
                <div style="text-align: center;">
                <b>{{$rating_user_sum}}</b>
                </div style="text-align: center;">
                <div style="text-align: center;"> 
                <img src="themes\images\star.png">
                </div>
                <div style="text-align: center;">
                {{$rating_user_avg}}<img src="themes\images\user.png"> {{$count_rating}}
                </div>
                <div style="height: 20px; text-align: center; border: 0px solid">
                <form action="{{route('rating_save')}}" method="POST">
                  {{ csrf_field() }}    
                  <input type="hidden" name="user_id" value="{{$user_id->id}}">
                  @guest @else<input type="hidden" name="rating_pengirim_id" value="{{Auth::user()->id}}">@endguest
                  <input type="hidden" name="username" value="{{$user_id->username}}">
                  <div class="bintang">
                  <input type="hidden" name="asal" value="{{'@'.$user_id->username}}">
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="1" />
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="2" />
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="3" />
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="4" />
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="5" />
                  </div>
                </form>
                <div style="border: 0px solid;">Beri Rating</div>
                </div>
            </div>
        </div>
    </div>
    </center>
   
   
   <div style=" clear: left; width: 690px; height: 100px; border:0px solid; border-color: blue; padding-left: 25px; padding-top: 20px; padding-bottom: 20px; text-align: left; ">
               <div style="width: 450px; height: 90px; padding-left: 20px; padding-top: 5px; float: left; background-color: #F0FFFF;">
                 <b>{!! $user_id->desc !!}</b> 

               </div>

            </div>
    
   <div style="width: 770px; height: 40px; border: 0px solid; border-color: red; padding: 4px;">
      <div id="myTab">
        <div style="width: 250px; float: left; text-align: center;">
        <a href="#status" data-toggle="tab"><span class="btn" style="width: 32px; height: 32px;""><i><img src="themes/images/post.png" style="width: 30px; height: 30px;"></i></span></a>
        </div>
        <div style="width: 250px; float: left; text-align: center;">
          <a href="#produk" data-toggle="tab"><span class="btn" style="width: 32px; height: 32px;""><i><img src="themes/images/keranjang.png" style="width: 30px; height: 30px;"></i></span></a>
        </div>
        <div style="width: 250px; float: left; text-align: center;">
          <a href="#catatan" data-toggle="tab"><span class="btn" style="width: 32px; height: 32px;""><i><img src="themes/images/blog.png" style="width: 30px; height: 30px;"></i></span></a>
        </div>
      </div>
   </div>
   <div style="width: 757px; height: auto; border:0px solid; border-color: yellow; padding: 10px;">
     
<br class="clr"/>
<div class="tab-content" style="padding: 0px;">
  <div class="tab-pane active" id="status" style=" border: 0px solid; text-align: center; padding-bottom: 0px; margin: 0px;">
    
      <ul class="thumbnails" style="padding: 0px;  margin: 0px;">
        <center>
       @if(!empty($post_id))
            @foreach($post_id as $p)
            <li class="span3" style="width: 250px; padding: 0px;  border: 0px solid ; margin: 0px;">
        <div class="thumbnail" style="padding: 0px;  margin: 0px;">
          <center>
          <div style="height: 220px; overflow: hidden; margin: 0px; padding: 0px;">
                <a href="{{'post_'.$p->post_id}}"><img src="{{url('image_post/view/'.$p->image_post)}}" alt="" style="display: block; height: 100%;  margin: 0px ;padding: 0px;" /></a>
          </div>
          </center>
        </div>
      </li>
      @endforeach
        @endif
      </center>
        </ul>
      
     </div>
  <div class="tab-pane" id="produk">
    <ul class="thumbnails">
       @if(!empty($produk_id))
            @foreach($produk_id as $val)
       <li class="span3">
        <div class="thumbnail">
        <a href="produk_{{$val->produk_id}}"><img src="{{url('image/view/'.$val->produk_image_src1)}}" alt="" style="width: 120px; height: 120px;"/></a>
        <div class="caption">
           <h5>{{$val->produk_name}}</h5>
           <div style="height: 15px;">
          <p> 
           {{$val->produk_model}}
          </p>
         </div>
           <h4 style="text-align:center" ><a class="btn btn-primary" href="#">Rp.{{$val->produk_price}},00</a></h4>
             @guest

        <form action="register" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}              
                <center><input type="number" name="produk_cart_qty" class="span1" placeholder="Qty."/></center>
                <center>
                <a href="register" class="btn btn-medium btn-primary">Add to <i class=" icon-shopping-cart"></i></a>
                <a href="produk_{{$val->produk_id}}" class="btn btn-medium"><i class="icon-zoom-in"></i></a>
                </center>
        </form>
         @else
          <form action="{{route('cart_save')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}              
                <input type="hidden" name="user_id" id="" value="{{Auth::user()->id}}"/>
                <input type="hidden" name="produk_id" id="" value="{{$val->produk_id}}"/>           
                <input type="hidden" name="produk_name" id="" value="{{$val->produk_name}}">
                <input type="hidden" name="produk_price" id="" value="{{$val->produk_price}}"/>
                <input type="hidden" name="produk_image_src1" id="" value="{{$val->produk_image_src1}}"/>
                <center><input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty." value="1" /></center>
                <center>
                <a href="produk_{{$val->produk_id}}" class="btn btn-medium"><i class="icon-zoom-in"></i></a>
                <button class="btn"> Add to <i class=" icon-shopping-cart"></i></button>
                 </center>
         </form>
         @endguest
        </div>
        </div>
      </li>
      @endforeach
        @endif
      
      </ul>

  </div>

     <div class="tab-pane" id="catatan">
           <div style="width: 750px; height: auto; border: 0px solid; border-color: yellow;">
           <div style="width: 700px; height: 40px; border: 0px solid;">
              
           </div>
           <div style="width: 500px; height: auto; border: 0px solid; float: left; padding: 5px;">
             
              @if(!empty($catatan))
              @foreach($catatan as $c)
             <div>
               <h4 style="border: 0px solid;"><img src="themes/images/blog.png" style="width: 20px; height: 20px;">{{$c->catatan_judul}}</h4>
                <div style="padding-left: 10px;">
               <i style="font-size: 10px;">{{$c->created_at}}</i>
                  <br>
               {!! $c->catatan_isi  !!}
                </div>
             </div>
             <hr class="soft">
             @endforeach
             @endif
           </div>
           <div style="width: 230px; height: auto; border: 0px solid; float: left; padding: 3px;">
               @if(!empty($catatan))
                 @foreach($catatan as $c)
                   <h5 style="border: 0px solid;"><img src="themes/images/blog.png" style="width: 15px; height: 15px;">{{$c->catatan_judul}}</h5>
                 @endforeach
               @endif
           </div>
        </div>

    </div>   
</div>
 

<br/>

<div class="container">
  
  <div class="row" style="width: 790px; height: 200px; ;float: left; padding-left: 15px;">
  <!-- Elemen yang akan menjadi kontainer peta -->
    <div id="googleMap" style="width:100%;height:200px;"></div>
  </div>
</div>

<!-- Button trigger modal -->

<!-- Modal follower-->
<div class="modal fade" id="follower" tabindex="-1" role="dialog" aria-labelledby="follower" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="follower">Follower</h5>
        
      </div>
      <div class="modal-body">
        <table>
        <div>
          @if(!empty($follower))
            @foreach($follower as $fr)
            <tr>
              <td>
               <div style="width: 250px; height: 50px; border: 0px solid;">
                  <div style="width: 50px; height: 50; border: 0px solid;">
                      <a href="{{'@'.$fr->get_follower_user->username}}">
                         @if(!empty($fr->get_follower_user->image_profil))
                        <img src="{{url('image_user/view/'.$fr->get_follower_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                         @else
                         <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                         @endif
                      </a>
                  </div>
                  <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px;">
                      <a href="{{'@'.$fr->get_follower_user->username}}">
                      <h5 style="margin: 4px;" >{{$fr->get_follower_user->name}}
                        @if(!empty($fr->get_follower_user->verifikasi))
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                        @else
                        @endif
                  <div style="font-size: 13px;">
                  <p><small><i>@</small><small>{{$fr->get_follower_user->username}}</i></small></p>
                  </div>
                  </h5>
                  </a>
                  </div>
                </div>
            </td>
            <td>          <?php 
                            $user_id_f =  $fr->get_follower_user;
                            $follower_id_f = $follower_user->where('user_id', $user_id_f->id)->first();
                            $followed_id_f = $followed_user->where('followed_user_id', $user_id_f->id)->first();
                         ?>
                        @guest
                        @else
                         @if($user_id_f->id == Auth::user()->id)
                          @else
                        <div style="width: 330px; height: 35px; border: 0px solid; float: right;">
                        <div style="float: left;">
                         @if(!empty($follower_id_f))
                          <form action="{{route('follow_delete')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="{{'@'.$user_id_f->username}}">
                          <input type="hidden" name="follower_id" value="{{$follower_id_f->follower_id}}">
                          <input type="hidden" name="followed_id" value="{{$followed_id_f->followed_id}}">
                          <input type="hidden" name="username" value="{{$user_id_f->username}}">
                          <div style="width: 80px;">
                          <button tipe="submit" class="btn btn-secondary btn-mini" >Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
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
            
                           
                          </button>
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
                          @endguest
                </td> 
            </tr> 
           @endforeach
         @endif
        </div>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--end follower -->
<!-- followed -->
<div class="modal fade" id="followed" tabindex="-1" role="dialog" aria-labelledby="followed" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="followed">Followed</h5>
        
      </div>
      <div class="modal-body">
        <table>
        @if(!empty($followed))
            @foreach($followed as $fd)
            <tr>
              <td>
                  <div style="width: 250px; height: 50px; border: 0px solid;">
                      <div style="width: 50px; height: 50; border: 0px solid;">
                          <a href="{{'@'.$fd->get_followed_user->username}}">
                              @if(!empty($fd->get_followed_user->image_profil))
                            <img src="{{url('image_user/view/'.$fd->get_followed_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                              @else
                            <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                              @endif
                          </a>
                      </div>
                      <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px;">
                      <a href="{{'@'.$fd->get_followed_user->username}}">
                      <h5 style="margin: 4px;" >{{$fd->get_followed_user->name}}
                        @if(!empty($fd->get_followed_user->verifikasi))
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                        @else
                        @endif
                      <div style="font-size: 13px;">
                          <p><small><i>@</small><small>{{$fd->get_followed_user->username}}</i></small></p>
                      </div>
                      </h5>
                      </a>
                      </div>
                  </div>
            </td>
            <td>        
                        <?php 
                            $user_id_fd =  $fd->get_followed_user;
                            $follower_id_fd = $follower_user->where('user_id', $user_id_fd->id)->first();
                            $followed_id_fd = $followed_user->where('followed_user_id', $user_id_fd->id)->first();
                         ?>
                       @guest
                       @else
                         @if($user_id_fd->id == Auth::user()->id)
                          @else
                        <div style="width: 330px; height: 35px; border: 0px solid; float: right;">
                        <div style="float: left;">
                         @if(!empty($follower_id_fd))
                          <form action="{{route('follow_delete')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="{{'@'.$user_id_fd->username}}">
                          <input type="hidden" name="follower_id" value="{{$follower_id_fd->follower_id}}">
                          <input type="hidden" name="followed_id" value="{{$followed_id_fd->followed_id}}">
                          <input type="hidden" name="username" value="{{$user_id_fd->username}}">
                          <div style="width: 80px;">
                          <button tipe="submit" class="btn btn-secondary btn-mini" >Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                          </div>
                          </form> 
                          @else
                         <form action="{{route('follow_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="{{'@'.$user_id_fd->username}}">
                          <input type="hidden" name="user_id" value="{{$user_id_fd->id}}">
                          <input type="hidden" name="follow_user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="username" value="{{$user_id_fd->username}}">
                           <div style="width: 80px;">
                              <button tipe="submit" class="btn btn-success btn-mini" > Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button>
                           </div>
                          </form> 
                            @endif
                                   
                          </button>
                         </form>
                         </div>
                        
                        <div style="float: left;">
                        <form action="{{route('message_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="message_">
                          <input type="hidden" name="user_id1" value="{{Auth::user()->id}}">
                          <input type="hidden" name="user_id2" value="{{$user_id_fd->id}}">

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
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
        
    </div>
  </div>
</div>
<!-- end followed -->

</div>


@endsection
