@extends('mmaster')

@section('content')

<div class="span7" style="width: 520px; border: 1px solid; font-size: 13px;">
    <ul class="breadcrumb">
    <li><a href="home">Home</a> <span class="divider">/</span></li>
    <li class="produk">Produk</li>
    <li class="produk"><span class="divider">/</span>
       @if(!empty($produk_jenis))
      {{$produk_jenis->produk_jenis}}
       @endif
    </li>
    </ul>
  <h3 style="padding-right: 40px;"> 
       @if(!empty($produk_jenis))
      {{$produk_jenis->produk_jenis}}
       @endif
        <small class="pull-right">  [{{$count_produk}}] produk tersedia </small></h3> 
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
    
<div id="myTab" class="pull-right" style="padding-right: 40px; padding-bottom: 5px;">
 <a href="#listView" data-toggle="tab"><span class="btn btn-medium"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-medium btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
  <div class="tab-pane" id="listView">
     @if(!empty($produk))
            @foreach($produk as $val)
    <div class="row">   
      <center>  
      <div style="width: 200px; height: 150px; overflow: hidden; margin: 0px;">
        <a href="produk_{{$val->produk_id}}"><img src="{{url('image/view/'.$val->produk_image_src1)}}" style="width: 100% ;  display: block; height: 100%;  margin: 0px;" /></a>
      </div>
      <div style="width: 250px; height: 80px; overflow: hidden; margin: 0px;">
        <div style="height: 15px; font-size: 12px; text-align: center; border: 1px solid ; ">      
        <b>{{$val->produk_name}}</b>
        <div class="desc">
       {!! $val->produk_desc !!}
        </div>
        <a class="btn btn-small pull-right" href="produk_{{$val->produk_id}}">View Details</a>
        <br class="clr"/>
        </div>
      
      <div style=" border: 1px solid; text-align:center" ><a class="btn btn-primary btn-mini" href="#"> Rp.{{$val->produk_price}},00
      </a>
     </div>
      <div class="span3 alignR">
      <h3> Rp.{{$val->produk_price}},00</h3>
      <label class="checkbox" style="float: right; padding-right: 20px;">
        <input type="checkbox">  Nego
      </label>
      <br/>
       <center>
        <div style="width: 200px;">
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
        </div>
         </center>      
       </div>
    </div>
    <hr class="soft"/>
    </center>
    </div>
    @endforeach
        @endif
        <center>
        <div style="padding-left: 5px;">
          <a href="mproduk={{$limit_tambah+24}}"><button class="btn btn-mini">tampilkan lebih banyak barang</button></a>
        </div>
      </center>
     
  <div class="tab-pane  active" id="blockView" style="padding-left: 5px;">
    <ul class="thumbnails">
       @if(!empty($produk) )
            @foreach($produk as $val)
      <li class="span3" style="width: 150px; float: left; padding: 5px;">
         <center>
          <div style="width: 100px; height: 80px; overflow: hidden; margin: 0px;">

           <a href="produk_{{$val->produk_id}}"><img src="{{url('image/view/'.$val->produk_image_src1)}}" alt="" style="display: block; height: 100%;  margin: 0;"/></a>
         </div>
        </center>
        <div style=" border: 1px solid;">
           <div>
           <div style="height: 15px; font-size: 12px; text-align: center; border: 1px solid ; "><b>{{$val->produk_name}}</b>
           </div>
         <div style="font-size: 10px; height: 15px;"> 
            <center> 
           {{$val->produk_model}}
           </center>
          </div>
          </div>
           
           <div style=" border: 1px solid; text-align:center" ><a class="btn btn-primary btn-mini" href="#">Rp.{{$val->produk_price}},00</a></div>
           <div style="width: 145px; height: 26px; border: 1px solid;">
            <center>
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
          </center>
         </div>
        </div>
      </li>
      @endforeach
    @endif
    </ul>
    </div>
      @if(!empty($limit_tambah))
      <center>
        <div style="width: 420px; padding-right: 35px;">
        <form action="mcari_barang={{$limit_tambah+24}}" method="POST">
           {{ csrf_field() }}
          <input type="hidden" name="barang" value="{{$barang}}">
          <input type="hidden" name="produk_jenis" value="{{$jenis}}">
          <button class="btn btn-medium">tampilkan lebih banyak barang</button>
        </form>
        </div>      
      </center>
      @else
      @endif
      @if(!empty($target_link))
        @if(!empty($produk_jenis->produk_jenis))
          <center>
            <div style="width: 420px; padding-right: 35px;">
            <form action="{{$target_link.'='.$limit_tambah_jenis}}" method="POST">
              {{ csrf_field() }}
            <button class="btn btn-medium">tampilkan lebih banyak barang</button>
            </form>
            </div>      
          </center>
        @else
          <center>
            
            Barang tidak ada
                 
          </center>
        @endif
      @endif
  <hr class="soft"/>
  </div>
</div>

  <a href="" class="btn btn-medium pull-right">Compair Product</a>
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
@endsection
