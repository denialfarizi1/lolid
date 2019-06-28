@extends('master_beranda')

@section('content')
<!-- post -->
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
     

                              <!--end modul --> 
             
              
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
