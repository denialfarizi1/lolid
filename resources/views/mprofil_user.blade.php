@extends('mmaster_beranda')

@section('content')
<div style="width: 495px; height: auto; border: 0px solid; padding: 2px; ">
  <center><a href="{{'image_user/view/'.Auth::user()->image_background}}">
    <div style="width: 490px; height: 290px; border: 0px solid;  padding: 1px; @if(!empty(Auth::user()->image_background)) background: url({{'image_user/view/'.Auth::user()->image_background}}); @else background: url('themes/images/profil_background.jpg'); @endif background-size: 490px; background-repeat: no-repeat; background-position: center;">  
            <div style="width: 490px; height: 210px; border: 0px solid; border-color: blue; padding: 0px; ">
              
            </div>
            <div style="width: 480px; height: 70px; border: 0px solid; border-color: blue; padding: 4px;">
               <div style="width: 80px; height: 70px; float: left; border: 0px solid; border-color: blue; padding: 4px;">
                <center>
                  @if(!empty(Auth::user()->image_profil))
                <a href="{{'image_user/view/'.Auth::user()->image_profil}}"><img style="width: 70px; height: 70px; border:0px solid;" src="{{url('image_user/view/'.Auth::user()->image_profil)}}"/></a>
                  @else
                 <img style="width: 70px; height: 70px; border:0px solid;" src="themes/images/profil.jpg"/>
                  @endif
                </center>
               </div>
               <div style="width: 380px; height: 50px; float:left; border: 0px solid; border-color: green; padding-top: 20px; ">
                    <center>

                    <div style=" width: 220px ; text-align: center; background-color: #F0FFFF;">
                      <table style="width: 220px;border: 0px solid;" class="rounded">
                            <tr>
                              <td><center>{{$count_post}}</center></td>
                              <td><center>{{$count_follower}}</center></td>
                              <td><center>{{$count_followed}}</center></td>
                            </tr>
                            <tr>
                              <td><center><a href="#status"><b class="btn btn-mini" style="padding-top: 0px; padding-bottom: 0px; padding-left: 2px; padding-right: 2px; margin: 0">post</b></a></center></td>
                              <td><center><b class="btn btn-mini" data-toggle="modal" data-target="#follower" style="padding-top: 0px; padding-bottom: 0px; padding-left: 2px; padding-right: 2px; margin: 0">follower</b>
                                  </center>
                              </td>
                              <td>
                                <center><b class="btn btn-mini" data-toggle="modal" data-target="#followed" style="padding-top: 0px; padding-bottom: 0px; padding-left: 2px; padding-right: 2px; margin: 0">followed</b>
                                  </center>
                              </td>
                            </tr>
                           </table>
                    
                    </div>
                    <div style="padding-right: 35px;">
                      <a href="edit_profil"><button class="btn btn-success btn-mini" data-toggle="modal" data-target="#edit_profil" >Edit </button></a>
                    </div>  
                </center>
              </div>
            </div>

          
     </div>
     </a>
     </center>
     <center>
     <div style="width: 480px; border: 0px solid; clear: left;">
        <div style="width: 200px; border: 0px solid; float: left; text-align: left;">
                  <b>{{Auth::user()->name}}</b>
                    @if(!empty(Auth::user()->verifikasi))                     
                    <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> 
                    @else
                     
                    @endif

                  <div style="font-size: 10px; padding-left: 10px;">@<i>{{Auth::user()->username}}</i></div>
        </div>
         <div style="width: 120px height: 160px border: 0px solid; float: right;">
            <div style="width: 110px; border: 0px solid; font-size: 10px; padding-top: 5px;">
                <div style="text-align: center;">
                <b>{{$rating_user_sum}}</b>
                </div style="text-align: center;">
                <div style="text-align: center;"> 
                <img src="themes\images\star.png" style="width: 50px;">
                </div>
                <div style="text-align: center;">
                {{$rating_user_avg}}<img src="themes\images\user.png"> {{$count_rating}}
                </div>
                <div style="text-align: center;">
                <form action="{{route('rating_save')}}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="user_id" value="{{$user_id->id}}">
                  <input type="hidden" name="rating_pengirim_id" value="{{Auth::user()->id}}">
                  <input type="hidden" name="username" value="{{$user_id->username}}">
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="1" style="width: 13px;" />
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="2" style="width: 13px;"/>
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="3" style="width: 13px;"/>
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="4" style="width: 13px;"/>
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="5" style="width: 13px;"/>
                  
                </form>
                </div>
            </div>
        </div>
    </div>
    </center>
   
   
   <div style=" clear: left; width: 350px; height: 100px; border: 0px solid; border-color: blue; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; text-align: left; ">
               <div style="width: 320px; height: 90px; padding-left: 10px; padding-top: 5px; float: left; background-color: #F0FFFF;">
               <b>{!! Auth::user()->desc !!}</b>    
               </div>

    </div>
   <div style="width: 485px; height: 40px; border: 1px solid; border-color: red; padding: 4px;">
      <div id="myTab">
        <div style="width: 160px; float: left; text-align: center;">
        <a href="#status" data-toggle="tab"><span class="btn" style="width: 27px; height: 27px;"><i><img src="themes/images/post.png" style="width: 30px; height: 30px;"></i></span></a>
        </div>
        <div style="width: 160px; float: left; text-align: center;">
          <a href="#produk" data-toggle="tab"><span class="btn" style="width: 27px; height: 27px;""><i><img src="themes/images/keranjang.png" style="width: 30px; height: 30px;"></i></span></a>
        </div>
        <div style="width: 160px; float: left; text-align: center;">
          <a href="#catatan" data-toggle="tab"><span class="btn" style="width: 27px; height: 27px;""><i><img src="themes/images/blog.png" style="width: 30px; height: 30px;"></i></span></a>
        </div>
      </div>
   </div>
   <div style="width: 470px; height: auto; border: 0px solid; border-color: yellow; padding: 10px;">
     
<br class="clr"/>
<div class="tab-content">
  <div class="tab-pane active" id="status" style="border: 0px solid;">
     
       @if(!empty($post))
            @foreach($post as $p)
      <div style="width: 152px; padding: 0px;  border: 0px solid ; margin: 0px; float: left; padding: 1px;">
        
          <center>
          <div style="height: 130px; overflow: hidden; margin: 0px;">
                <a href="{{'post=m_'.$p->post_id}}"><img src="{{url('image_post/view/'.$p->image_post)}}" alt="" style="display: block; height: 100%;  margin: 0px;" /></a>
          </div>
          </center>
      </div>
      @endforeach
        @endif
      
       
     </div>
  <div class="tab-pane" id="produk">
       @if(!empty($produk_user))
            @foreach($produk_user as $val)
       <div style="width: 153px; border: 0px solid; float: left;">
        <center>
       <div style="width: 120px; height: 90px; overflow: hidden">        
        <a href="mproduk_{{$val->produk_id}}"><img src="{{url('image/view/'.$val->produk_image_src1)}}" alt="" style="display: block; height: 100%;  margin: 0px;"/></a>
       </div>
        <div class="caption">
           <h5>{{$val->produk_name}}</h5>
           {{$val->produk_model}}
           <div style="text-align:center" ><a class="btn btn-primary btn-mini" >Rp.{{$val->produk_price}},00</a>
           </div>
           <div style="padding-top: 5px;">
            @guest
         
        <form action="register" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}              
                <center><input type="number" name="produk_cart_qty" class="span1" placeholder="Qty."/></center>
                <center>
                <a href="register" class="btn btn-mini btn-secondary">Add to <i class=" icon-shopping-cart"></i></a>
                <a href="produk_{{$val->produk_id}}" class="btn btn-secondary btn-mini"><i class="icon-zoom-in"></i></a>
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
                <a href="produk_{{$val->produk_id}}" class="btn btn-secondary btn-mini"><i class="icon-zoom-in"></i></a>
                <button class="btn btn-secondary btn-mini"> Add to <i class=" icon-shopping-cart"></i></button>
                 </center>
         </form>
         @endguest
         </div>
        </div>
        </center>
       </div> 
      @endforeach
        @endif
    </div>
     <div class="tab-pane" id="catatan">
         <div style="width: 460px; height: auto; border: 0px solid; border-color: yellow;">
           <div style="width: 460px; height: 30px; border: 0px solid;">
              
             <div style="width: 120px; float: right">
               <a href="mcatatan_tambah"><button class="btn btn-success btn-mini" style="font-size: 9px;"><img src="themes/images/blog.png" style="width: 20px; height: 20px;">Tulis Catatan</button>
               </a>
             </div>
           </div>
           <div style="width: 450px; height: auto; border: 0px solid; float: left; padding: 5px;">
             
              @if(!empty($catatan))
              @foreach($catatan as $c)
             <div>
               <h6 style="border: 0px solid;"><img src="themes/images/blog.png" style="width: 20px; height: 20px;">{{$c->catatan_judul}}</h6>
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
           
        </div>

    </div> 
   </div>

  </div>
  
</div>
<br/>
</div>
<!-- Button trigger modal -->

<!-- Modal follower-->
<div class="modal fade" id="follower" tabindex="-1" role="dialog" aria-labelledby="follower" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header" style="height: 25px; padding-left: 10px; padding-top: 0px; padding-bottom: 0px; margin: 0px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="follower">Follower</h5>
        
      </div>
      <div class="modal-body" style="height: 120px;">
        <table>
        <div>
          @if(!empty($follower))
            @foreach($follower as $fr)
            <tr>
              <td>
               <div style="width: 250px; height: 40px; border: 0px solid;">
                  <div style="width: 40px; height: 40px; border: 0px solid; float: left">
                      <a href="{{'@'.$fr->get_follower_user->username}}">
                         @if(!empty($fr->get_follower_user->image_profil))
                        <img src="{{url('image_user/view/'.$fr->get_follower_user->image_profil)}}" class="img-circle" style="width: 30px; height: 30px; float: left; padding: 5px;">
                         @else
                         <img src="themes/images/profil.jpg" class="img-circle" style="width: 30px; height: 30px; float: left; padding: 5px;">
                         @endif
                      </a>
                  </div>
                  <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px; float: left; font-size: 13px;">
                    <div style="height: 15px; font-size: 13px;">
                      <a href="{{'@'.$fr->get_follower_user->username}}" style="padding: 0px; margin: 0px;"><b>
                      {{$fr->get_follower_user->name}}</b></a>
                        @if(!empty($fr->get_follower_user->verifikasi))
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 13px; height: 13px; padding: 1px;">
                        @else
                        @endif
                    </div>
                  <div style="height: 15px; font-size: 11px; padding: 0px; margin: 0px;">
                  <p><small><i>@</i></small><small><i>{{$fr->get_follower_user->username}}</i></small></p>
                  </div> 
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
                        <div style="width: 200px; height: 35px; border: 0px solid; float: right;">
                        <div style="width: 80px; float: left;">
                         @if(!empty($follower_id_f))
                          <form action="{{route('follow_delete')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="{{'=@'.$user_id_f->username}}">
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
                          <button tipe="submit" class="btn btn-success btn-mini" > Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button>
                          </form> 
                            @endif
                            
                         </div>
                        
                        <div style="width: 100px; float: left;">
                        <form action="{{route('message_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="mmessage_">
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
      <div class="modal-footer" style="height: 30px; padding: 0px; margin: 0px;">
        <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--end follower -->
<!-- followed -->
<div class="modal fade" id="followed" tabindex="-1" role="dialog" aria-labelledby="followed" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="height: 25px; padding-left: 10px; padding-top: 0px; padding-bottom: 0px; margin: 0px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="followed">Followed</h5>
        
      </div>
      <div class="modal-body" style="height: 120px;">
        <table>
        @if(!empty($followed))
            @foreach($followed as $fd)
            <tr>
              <td>
                  <div style="width: 250px; height: 40px; border: 0px solid;">
                      <div style="width: 40px; height: 40px; border: 0px solid;float: left;">
                          <a href="{{'@'.$fd->get_followed_user->username}}">
                              @if(!empty($fd->get_followed_user->image_profil))
                            <img src="{{url('image_user/view/'.$fd->get_followed_user->image_profil)}}" class="img-circle" style="width: 30px; height: 30px; float: left; padding: 5px;">
                              @else
                            <img src="themes/images/profil.jpg" class="img-circle" style="width: 30px; height: 30px; float: left; padding: 5px;">
                              @endif
                          </a>
                      </div>
                      <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px; float: left">
                      <a href="{{'@'.$fd->get_followed_user->username}}">
                      <h6 style="height: 12px; border: 0px solid; padding: 0px; margin: 0px; " >{{$fd->get_followed_user->name}}
                        @if(!empty($fd->get_followed_user->verifikasi))
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                        @else
                        @endif
                      </h6>
                      </a>
                      <div style="height: 11px; font-size: 11px; padding: 0px; margin: 0px;">
                          <p><small><i>@</i></small><small><i>{{$fd->get_followed_user->username}}</i></small></p>
                      </div>
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
                        <div style="width: 200px; height: 35px; border: 0px solid; float: right;">
                        <div style="width: 80px; float: left;">
                         @if(!empty($follower_id_fd))
                          <form action="{{route('follow_delete')}}" method="POST">
                          {{ csrf_field() }}
                           <input type="hidden" name="asal" value="{{'=@'.$user_id_fd->username}}">
                          <input type="hidden" name="follower_id" value="{{$follower_id_fd->follower_id}}">
                          <input type="hidden" name="followed_id" value="{{$followed_id_fd->followed_id}}">
                          <input type="hidden" name="username" value="{{$user_id_fd->username}}">
                          <button tipe="submit" class="btn btn-secondary btn-mini" >Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'> </button>
                         </form>
                          @else
                         <form action="{{route('follow_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id" value="{{$user_id_fd->id}}">
                          <input type="hidden" name="follow_user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="username" value="{{$user_id_fd->username}}">
                          <button tipe="submit" class="btn btn-success btn-mini" > Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button>
                          </form> 
                            @endif
                         
                         </div>
                        
                        <div style="width: 80px; float: left;">
                        <form action="{{route('message_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="asal" value="mmessage_">
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
      <div class="modal-footer" style="height: 30px; padding: 0px; margin: 0px;">
        <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal">Close</button>
        
      </div>
        
    </div>
  </div>
</div>
<!-- end followed -->
<!-- edit profil -->
<div class="modal fade" id="edit_profil" tabindex="-1" role="dialog" aria-labelledby="edit_profil" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="height: 25px; padding-left: 10px; padding-top: 0px; padding-bottom: 0px; margin: 0px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="followed">Edit Profil</h5>
        
      </div>
      <div class="modal-body" style="height: 120px; padding: 5px;">
        <center>
        <div style="width: 440px; height: 520px; border: 0px solid; padding-left: 10px; padding-top: 20px; font-size: 11px;">
  
           <form action="{{route('update_user')}}" method="POST" enctype="multipart/form-data">
       {{ csrf_field() }}
        <table style="font-size: 11px;">
           <tr>
            <td>Background</td>
            <td>:</td>
            <td><div style="padding-bottom: 10px;">
                    <input type="file" name="image_background" style="height: 25px;">
                </div>
            </td>
          </tr>
          <tr>
            <td>Foto Profil</td>
            <td>:</td>
            <td><div style="padding-bottom: 10px;">
                    <input type="file" name="image_profil" style="height: 25px;">
               </div>
            </td>
          </tr>
          <tr>
            <td>Nama </td>
            <td style="width: 10px;">:</td>
             <input type="hidden" name="asal" value="profil=m">
            <input type="hidden" name="id" value="{{Auth::user()->id}}">
            <td><div style="padding-top: 10px;">
              <input type="text" name="name" value="{{Auth::user()->name}}" style="height: 12px;">
               </div>
            </td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td><div style="padding-top: 10px;"> 
              <input type="email" name="email" value="{{Auth::user()->email}}" style="height: 12px;">
                </div>
            </td>
          </tr>
          <tr>
            <td>HP/WA </td>
            <td>:</td>
            <td><div style="padding-top: 10px;">
              <input type="number" name="hp" value="0{{Auth::user()->hp}}" style="height: 12px;">
              </div>
            </td>
          </tr>
          <tr>
            <td>Deskripsi </td>
            <td>:</td>
            <td><div style="padding-top: 20px;">
              <textarea name="desc" style="width: 300px;">{{Auth::user()->desc}}</textarea>
                </div>
            </td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><div style="padding-top: 10px;">
              <input type="text" name="alamat" value="{{Auth::user()->alamat}}" style="width: 320px; height: 12px;"/>
                </div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
     
  
        <script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
        <script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

        <script type="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
        <script type="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
        <script>tynymice.init({selector:'textarea'});</script>
        </div>
       </center>
      </div>
      <div class="modal-footer" style="width: 440px; height: 30px; padding: 0px; margin: 0px;">
        <div style="width: 400px; float: left; text-align: 
        center;">
        <input type="submit" class="btn btn-primary btn-mini" value="update">
         </div>
      <div style="width: 40px; float: right;">
        <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal">Close</button>
       </div> 
      </div>
        </form>
    </div>
  </div>
</div>
<!-- end edit profil-->


                

@endsection
