@extends('master')

@section('content')
@if(empty($produk))
<div class="container">
<b> Anda tidak memiliki produk</b>
</div>
@endif
        
<div class="span9">
    <ul class="breadcrumb">
    <li><a href="home">Home</a> <span class="divider">/</span></li>
    <li><a href="produk">Products</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul> 
  <div class="row">   
      <div id="gallery" class="span3">
            <a href="{{'image/view/'.$produk_user->produk_image_src1}}" title="Fujifilm FinePix S2950 Digital Camera">
        <img src="{{url('image/view/'.$produk_user->produk_image_src1)}}" style="width:100%" alt="Fujifilm FinePix S2950 Digital Camera"/>
            </a>
      <div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="{{'image/view/'.$produk_user->produk_image_src1}}"> <img style="width:29%" src="{{url('image/view/'.$produk_user->produk_image_src1)}}" alt=""/></a>
                   <a href="{{'image/view/'.$produk_user->produk_image_src2}}"> <img style="width:29%" src="{{url('image/view/'.$produk_user->produk_image_src2)}}" alt=""/></a>
                   <a href="{{'image/view/'.$produk_user->produk_image_src3}}" > <img style="width:29%" src="{{url('image/view/'.$produk_user->produk_image_src3)}}" alt=""/></a>
                  </div>
                  <div class="item">
                   <a href="{{'image/view/'.$produk_user->produk_image_src1}}" > <img style="width:50%" src="{{'image/view/'.$produk_user->produk_image_src1}}" alt=""/></a>
                   <a href="{{'image/view/'.$produk_user->produk_image_src2}}"> <img style="width:50%" src="{{'image/view/'.$produk_user->produk_image_src2}}" alt=""/></a>
                   <a href="{{'image/view/'.$produk_user->produk_image_src3}}"> <img style="width:50%" src="{{'image/view/'.$produk_user->produk_image_src3}}" alt=""/></a>
                  </div>
                </div>
              <!--  
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
        -->
              </div>
        
       <div class="btn-toolbar">
        <div class="btn-group">
        <span class="btn"><i class="icon-envelope"></i></span>
        <span class="btn" ><i class="icon-print"></i></span>
        <a href="{{'image/view/'.$produk_user->produk_image_src1}}"><<span class="btn" ><i class="icon-zoom-in"></i></span></a>
        <span class="btn" ><i class="icon-star"></i></span>
        <span class="btn" ><i class=" icon-thumbs-up"></i></span>
        <span class="btn" ><i class="icon-thumbs-down"></i></span>
        </div>
      </div>
      </div>
      
      <div class="span6">
        <div style="text-align: left;">
        <h3>{{$produk_user->produk_name}} </h3> 
        <small>- {{$produk_user->produk_model}}</small>
        <small><img src="themes/images/alamat.jpg" style="width: 15px;">{{$produk_user->produk_lokasi}}</small>
        </div>
        <hr class="soft"/>
        @guest
        <form action="register" class="form-horizontal qtyFrm">
      
        @else
         @endguest  
          <div class="control-group">

          <label class="control-label" style="text-align: left; font-size: 20px;"><span class="btn btn-primary">Rp.{{$produk_user->produk_price}}</span></label>
              <div class="controls">
                  @guest

                    <form action="register" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}              
                            <div style="float: right;"><input type="number" name="produk_cart_qty" class="span1" placeholder="Qty."/></div>
                            <center>
                            <a href="register" class="btn btn-medium btn-primary">Add to <i class=" icon-shopping-cart"></i></a>
                            </center>
                    </form>
              <div class="clr"></div>
                  @else

                  <form action="{{route('cart_save')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}              
                        <input type="hidden" name="asal" id="" value="cart_produk"/>
                        <input type="hidden" name="user_id" id="" value="{{Auth::user()->id}}"/>
                        <input type="hidden" name="produk_id" id="" value="{{$produk_user->produk_id}}"/>           
                        <input type="hidden" name="produk_name" id="" value="{{$produk_user->produk_name}}">
                        <input type="hidden" name="produk_price" id="" value="{{$produk_user->produk_price}}"/>
                        <input type="hidden" name="produk_image_src1" id="" value="{{$produk_user->produk_image_src1}}"/>
                        <div style="width: 250px; border: 0px solid; text-align: right; float: left; padding-top: 5px; padding-left: 10px;">
                        <input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty." />
                        </div>
                        <div style="float: right;">
                        <button type="submit" class="btn btn-large btn-primary pull-right"> Add to <i class=" icon-shopping-cart"></i></button>
                        </div>
                        
                 </form>
         @endguest
          
              </div>
          </div>
         
        <hr class="soft"  />
        <div class="clr" style="text-align: right; padding-top: 20px; height: 80px; font-size: 20px;">[{{$produk_user->produk_qty}}] barang tersedia</div>
        <form class="form-horizontal qtyFrm pull-right">
          <div class="control-group" style="height:  50px;">
          <label class="control-label"><span>Color</span></label>
          <div class="controls">
            <select class="span2">
              <option>Black</option>
              <option>Red</option>
              <option>Blue</option>
              <option>Brown</option>
            </select>
          </div>
          </div>
        </form>
        <hr class="soft clr"/>
        
          {!! $produk_user->produk_desc !!}
        
        <a class="btn btn-small pull-right" href="#detail">More Details</a>
        <br class="clr"/>
      <a href="#" name="detail"></a>
      <hr class="soft"/>
      </div>
      <div class="user" style="width: 300px ; height: 250px;  border: 0px solid;">
        
           
        <table>
          <tr>
            <td></td>
            <td></td>
            <td>
               <div style="padding-top: 20px; float: left;">
              <a href="{{'@'.$produk_user->get_user->username}}">
                  @if(!empty($produk_user->get_user->image_profil))
                <img src="{{url('image_user/view/'.$produk_user->get_user->image_profil)}}" class="img-circle" style="width: 50px; height: 50px;  padding: 5px;">
                  @else
                 <img src="themes/images/profil.jpg" class="img-circle" style="width: 50px; height: 50px;  padding: 5px;">
                  @endif
              </a>
              </div>
              <div style="width: 100px height: 90px border: 0px solid; float: right; padding-left: 30px;">
            <div style="width: 100px; height: 80px; border: 0px solid; padding-top: 5px; font-size: 9px;">
                <div style="text-align: center;">
                <b>{{$rating_user_sum}}</b>
                </div style="text-align: center;">
                <div style="text-align: center;"> 
                <img src="themes\images\star.png" style="width: 50px; height: 15px;">
                </div>
                <div style="text-align: center;">
                {{$rating_user_avg}}<img src="themes\images\user.png" style="width: 10px; height: 10px;"> {{$count_rating}}
                </div>
                <div style="text-align: center;">
                   @if(!empty(Auth::user()))
                <form action="{{route('rating_save')}}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="asal" value="{{'@'.$produk_user->get_user->username}}">
                  <input type="hidden" name="user_id" value="{{$produk_user->get_user->id}}">
                  <input type="hidden" name="rating_pengirim_id" value="{{Auth::user()->id}}">
                 
                  <input type="hidden" name="rating_pengirim_id" value="21">
                 
                  <input type="hidden" name="username" value="{{$produk_user->get_user->username}}">
                  <input type="image" name="rating_nilai" src="themes\images\star2.png" value="1" />
                  <input type="image" name="rating_nilai" src="themes\images\star2.png" value="2" />
                  <input type="image" name="rating_nilai" src="themes\images\star2.png" value="3" />
                  <input type="image" name="rating_nilai" src="themes\images\star2.png" value="4" />
                  <input type="image" name="rating_nilai" src="themes\images\star2.png" value="5" />
                  
                </form>
                 @else
                  @endif
                </div>
            </div>
            </div>   
            </td>
            
          </tr>

          <tr>
            <td>Penjual</td>
            <td style="padding-left: 10px;">:</td>
            <td style="padding-left: 10px;"><a href="{{'@'.$produk_user->get_user->username}}">{{ $produk_user->get_user->name }}
                @if(!empty($produk_user->get_user->verifikasi))
              <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                @else
                @endif
            </a>
            
            </td>
          </tr>
          <tr>
            <td><img src="themes/images/wa.png" style="width: 30px; height: 25px;"></td>
            <td style="padding-left: 10px;">:</td>
            <td style="padding-left: 10px;">{{ $produk_user->get_user->hp }}</td>
          </tr>
          <tr>
            <td><img src="themes/images/alamat.png" style="width: 30px; height: 25px;"></td>
            <td style="padding-left: 10px;">:</td>
            <td style="padding-left: 10px;">{{ $produk_user->get_user->alamat }}</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>
              @if(!empty(Auth::user()))
               @if($produk_user->get_user->id == Auth::user()->id)
               @else
              <form action="{{route('message_save')}}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id1" value="{{Auth::user()->id}}">
                          <input type="hidden" name="user_id2" value="{{$produk_user->get_user->id}}">
                          <button tipe="submit" class="btn btn-success btn-medium" >Message <img src="themes/images/mail.png" class="img-circle"> </button> 
             </form>
             @endif  
             @else
             @endif 
            </td>
          </tr>
        </table>
      </div>
      

      <div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
        <h4>Product Information</h4>
                <table class="table table-bordered">
        <tbody>
        <tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">{{$produk_user->produk_brand}}</td></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2">{{$produk_user->produk_model}}</td></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"> {{$produk_user->produk_released_on}}</td></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Dimensions:</td><td class="techSpecTD2"> {{$produk_user->produk_dimensions}}</td></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Display size:</td><td class="techSpecTD2">{{$produk_user->produk_size}}</td></tr>
        </tbody>
        </table>
        
        <h5>Features</h5>
        {!! $produk_user->produk_desc !!}
              </div>
    <div class="tab-pane fade" id="profile">
    <div id="myTab" class="pull-right">
     <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
     <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
    </div>
    <br class="clr"/>
    <hr class="soft"/>
    <div class="tab-content">
      <div class="tab-pane" id="listView">
     @if(!empty($produk))
            @foreach($produk as $p)
    <div class="row">   
      <div class="span2">
        <a href="produk_{{$p->user_id}}"><img src="{{url('image/view/'.$p->produk_image_src1)}}" alt="" style="width: auto; height: 110px;" /></a>
      </div>
      <div class="span4">
        <h3>{{$p->produk_name}}</h3>        
        <hr class="soft"/>
        <div class="desc">
       {!! $p->produk_desc !!}
        </div>
        <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
        <br class="clr"/>
      </div>
      <div class="span3 alignR">
      <form class="form-horizontal qtyFrm">
      <h3> Rp.{{$p->produk_price}},00</h3>
      <label class="checkbox">
        <input type="checkbox">  Nego
      </label><br/>
      
        <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
        <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
      
        </form>
      </div>
    </div>
    <hr class="soft"/>
    @endforeach
        @endif
     </div>
  <div class="tab-pane  active" id="blockView">
    <ul class="thumbnails">
       @if(!empty($produk))
            @foreach($produk as $p)
      <li class="span3">
        <div class="thumbnail">
        <a href="produk_{{$p->user_id}}"><img src="{{url('image/view/'.$p->produk_image_src1)}}" alt="" style="width: auto; height: 110px;" /></a>
        <div class="caption">
           <h5>{{$p->produk_name}}</h5>
          <p> 
           {{$p->produk_model}}
          </p>
           <h4 style="text-align:center"><a class="btn" href="produk_{{$p->produk_id}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rp.{{$p->produk_price}},00</a></h4>
        </div>
        </div>
      </li>
      @endforeach
        @endif
      </ul>
  <hr class="soft"/>
  </div>

    </div>
        <br class="clr">
           </div>
    </div>
          </div>

  </div>
  <div style="width: 700px; height: auto; border: 1px ; padding-top: 25px;">
    <hr class="soft">
    @if(!empty(Auth::user()))
    <div style="width: 665px; height: 45px; border: 1px ;  padding-top: 5px; padding-left: 30px">
      <form action="{{route('comment_produk_save')}}"" method="POST">
         {{ csrf_field() }}
        <div style="float: left;">
        <input type="hidden" name="asal" value="{{'produk_'.$produk_user->produk_id}}">
        <input type="hidden" name="produk_id" value="{{$produk_user->produk_id}}">
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <a href="">
         
           @if(!empty(Auth::user()->image_profil))
          <img src="{{url('image_user/view/'.Auth::user()->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;">
            @else
           <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
            @endif
          
        </a>
        </div>
         <div style="padding-top: 5px; padding-left: 5px; float: left;">
        <input type="text" name="comment_produk_desc" style="width: 500px;">
        </div>
        <div style="float: left; padding-top: 5px;">
        <input type="submit" class="btn btn-primary btn-medium" value="comment">
        </div>
      </form>
    </div>
    @else
    @endif
    <div style="width: 685px; height: auto; border: 1px  ;padding-top: 5px; padding-left: 10px; padding-bottom: 20px;">
        @if(!empty($comment_produk))
            @foreach($comment_produk as $cp)
             <div style="width: 600px; height: auto; border: 0px solid; padding-left: 20px; padding-top: 10px; padding-bottom: 20px;">

                 <div style="width: 40px; border: 0px solid; height: 40px; float: left;">
                   <a href="">
                      @if(!empty($cp->get_comment_produk_user->image_profil))
                    <img src="{{url('image_user/view/'.$cp->get_comment_produk_user->image_profil)}}" class="img-circle" style="width: 40px; height: 40px; float: left;">
                     @else
                      <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
                     @endif
                  </a>
                 </div>
                 <div style="width: auto; border: 0px solid; float: left; padding-left: 5px; padding-top: 10px;">
                   <b>{{$cp->get_comment_produk_user->name}}</b>
                 </div>
                 
                 <div style="border: 0px solid ; float: left; padding-left: 5px; padding-top: 10px;">
                   {{$cp->comment_produk_desc}}
                 </div>
                 <div style="float: right; font-size: 9px; padding-top: 10px;">
                   {{$cp->created_at}}
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


@endsection
