@extends('master')

@section('content')
<div class="container" style="width: 800px; height: auto;border: 1px solid;">
<div class="span9">
    <ul class="breadcrumb">
    <li><a href="home">Home</a> <span class="divider">/</span></li>
    <li class="produk">Produk</li>
    
    </ul>
  <h3> Produk <small class="pull-right"> [{{$count_produk}}] produk tersedia </small></h3> 
  <hr class="soft"/>
  <p>
    Pilih produk yang ada suka.
  </p>
  <hr class="soft"/>
  <form class="form-horizontal span6">
    <div class="control-group">
      <label class="control-label alignL">Sort By </label>
      <select>
              <option>Priduct name A - Z</option>
              <option>Priduct name Z - A</option>
              <option>Priduct Stoke</option>
              <option>Price Lowest first</option>
            </select>
    </div>
    </form>
    
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
  <div class="tab-pane" id="listView">
     @if(!empty($produk))
            @foreach($produk as $val)
    <div class="row">   
      <div class="span2">
        <a href="produk_{{$val->produk_id}}"><img src="{{url('image/view/'.$val->produk_image_src1)}}" alt=""  /></a>
      </div>
      <div class="span3">
        <h3>New | Available</h3>        
        <hr class="soft"/>
        <h5>{{$val->produk_name}}</h5>
        <div class="desc">
       {{$val->produk_desc}}
        </div>
        <a class="btn btn-small pull-right" href="produk_{{$val->produk_id}}">View Details</a>
        <br class="clr"/>
      </div>
      <div class="span3 alignR">
      <h3> Rp.{{$val->produk_price}},00</h3>
      <label class="checkbox">
        <input type="checkbox">  Nego
      </label><br/>
            
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
                <center><input type="number" name="produk_cart_qty" class="span1" placeholder="Qty."/></center>
                <center>
                <a href="produk_{{$val->produk_id}}" class="btn btn-medium"><i class="icon-zoom-in"></i></a>
                <button> Add to <i class=" icon-shopping-cart"></i></button>
                 </center>
         </form>
         @endguest      </div>
    </div>
    <hr class="soft"/>
    @endforeach
        @endif
     </div>
  <div class="tab-pane  active" id="blockView">
    <ul class="thumbnails">
       @if(!empty($produk))
            @foreach($produk as $val)
      <li class="span3">
        <div class="thumbnail">
        
        <a href="produk_{{$val->produk_id}}"><img src="{{url('image/view/'.$val->produk_image_src1)}}" alt="" style="width: 120px; height: 120px;"/></a>
        <div class="caption">
           <h5>{{$val->produk_name}}</h5>
          <p> 
           {{$val->produk_model}}
          </p>
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
                <center><input type="number" name="produk_cart_qty" class="span1" placeholder="Qty."/></center>
                <center>
                <a href="produk_{{$val->produk_id}}" class="btn btn-medium"><i class="icon-zoom-in"></i></a>
                <button> Add to <i class=" icon-shopping-cart"></i></button>
                 </center>
         </form>
         @endguest
           <h4 style="text-align:center" ><a class="btn btn-primary" href="#">Rp.{{$val->produk_price}},00</a></h4>
        </div>
        </div>
      </li>
      @endforeach
        @endif
      </ul>
  <hr class="soft"/>
  </div>
</div>

  <a href="" class="btn btn-large pull-right">Next</a>
  
  <div class="pagination">
      <ul>
      <li><a href="#">&lsaquo;</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">...</a></li>
      <li><a href="#">&rsaquo;</a></li>
      </ul>
      </div>
      <br class="clr"/>
</div>
</div>
</div>
</div>

</div>
@endsection
