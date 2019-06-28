@extends('mmaster')

@section('content')

<div class="span7" style="width: 520px; border: 0px solid; font-size: 13px;">
    <ul class="breadcrumb">
    <li ><a href="home" >Home</a> <span class="divider">/</span></li>
    <li class="produk">Produk</li>
    <li class="produk"><span class="divider">/</span>
       @if(!empty($produk_jenis))
      {{$produk_jenis->produk_jenis}}
       @endif
    </li>
    </ul>
     <div style="width: 500px; height:  200px; border: 0px solid;">
      <div style="width: 85px; height: 85px; float: left; border: 0px solid; padding: 5px;">
        <img src="themes/images/alat_rumah_tangga.png" style="width: 80px; height: 80px;">
      </div>
      <div style="width: 85px; height: 85px; float: left; border: 0px solid; padding: 5px;">
        <img src="themes/images/buku.png" style="width: 80px; height: 80px;">
      </div>
      <div style="width: 85px; height: 85px; float: left; border: 0px solid; padding: 5px;">
        <img src="themes/images/elektronik.png" style="width: 80px; height: 80px;">
      </div>
      <div style="width: 85px; height: 85px; float: left; border: 0px solid; padding: 5px;">
        <img src="themes/images/hewan.jpg" style="width: 80px; height: 80px;">
      </div>
      <div style="width: 85px; height: 85px; float: left; border: 0px solid; padding: 5px;">
        <img src="themes/images/hiburan.png" style="width: 80px; height: 80px;">
      </div>
      <div style="width: 85px; height: 85px; float: left; border: 0px solid; padding: 5px;">
        <img src="themes/images/jasa.jpg" style="width: 80px; height: 80px;">
      </div>
      <div style="width: 85px; height: 85px; float: left; border: 0px solid; padding: 5px;">
        <img src="themes/images/kendaraan.png" style="width: 80px; height: 80px;">
      </div>
      <div style="width: 85px; height: 85px; float: left; border: 0px solid; padding: 5px;">
        <img src="themes/images/kecantikan.jpg" style="width: 80px; height: 80px;">
      </div>
      <div style="width: 85px; height: 85px; float: left; border: 0px solid; padding: 5px;">
        <img src="themes/images/makanan.png" style="width: 80px; height: 80px;">
      </div>
      <div style="width: 85px; height: 85px; float: left; border: 0px solid; padding: 5px;">
        <img src="themes/images/olahraga.png" style="width: 80px; height: 80px;">
      </div>
      
    </div> 
  <h3 style="padding-right: 40px;">
      @if(!empty($produk_jenis))
      {{$produk_jenis->produk_jenis}}
       @endif
        <small class="pull-right">  [{{$count_produk}}] produk tersedia </small>
  </h3> 
  <hr class="soft"/>
  <p>
    Pilih barang yang ada suka.
  </p>
  <hr class="soft"/>
  <form class="form-horizontal span6">
    <div class="control-group">
      <label class="control-label alignL">Sort By </label>
      <select>
              <option>Urutkan A - Z</option>
              <option>Urutkan Z - A</option>
              <option>Stoke</option>
              <option>Harga terendah</option>
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
        <a href="mproduk_{{$val->produk_id}}"><img src="{{url('image/view/'.$val->produk_image_src1)}}"  style="width: 100% ;  display: block; height: 100%;  margin: 0px;" /></a>
      </div>
      <div style="width: 250px; height: 80px; overflow: hidden; margin: 0px;">       
        <div style="height: 15px; font-size: 12px; text-align: center; border: 0px solid ; "><b>{{$val->produk_name}}</b></div>
        <div class="desc">
       {!! $val->produk_desc !!}
        </div>
        
        <a class="btn btn-small pull-center" href="mproduk_{{$val->produk_id}}">View Details</a>
       
        <br class="clr"/>
      </div>
      <div>
      <div style=" border: 0px solid; text-align:center" ><a class="btn btn-primary btn-mini" href="#"> Rp.{{$val->produk_price}},00
      </a>
      </div>
      <label class="checkbox" style="float: right; padding-right: 20px;">
        <input type="checkbox">  Nego
      </label><br/>
      <center>
        <div style="width: 200px;">
          @guest

        <form action="register" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}              
                <input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty."/>
                <a href="register" class="btn btn-mini btn-primary">Add to <i class=" icon-shopping-cart"></i></a>
                <a href="mproduk_{{$val->produk_id}}" class="btn btn-mini"><i class="icon-zoom-in"></i></a>
                
        </form>
         @else
          <form action="{{route('cart_save')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                 <input type="hidden" name="asal" id="" value="mcart_produk"/>      
                <input type="hidden" name="user_id" id="" value="{{Auth::user()->id}}"/>
                <input type="hidden" name="produk_id" id="" value="{{$val->produk_id}}"/>           
                <input type="hidden" name="produk_name" id="" value="{{$val->produk_name}}">
                <input type="hidden" name="produk_price" id="" value="{{$val->produk_price}}"/>
                <input type="hidden" name="produk_image_src1" id="" value="{{$val->produk_image_src1}}"/>
                <input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty." value="1" />
                
                <a href="mproduk_{{$val->produk_id}}" class="btn btn-mini"><i class="icon-zoom-in"></i></a>
                <button class="btn btn-mini"> Add to <i class=" icon-shopping-cart"></i></button>
                 
         </form>
         @endguest
         </div>
         </center>      
       </div>
    </div>
    <hr class="soft"/>
    @endforeach
     @else
       <center> Barang tidak tersedia</center>
        @endif
        
     </div>
   
  <div class="tab-pane  active" id="blockView" style="padding-left: 5px;">
       @if(!empty($produk) && $count_produk > 0 && $count_produk < 10)
            @foreach($produk as $val)
      
        <div style="width: 150px; float: left; padding: 5px;">
          <center>
          <div style="width: 100px; height: 80px; overflow: hidden; margin: 0px;">

            <a href="mproduk_{{$val->produk_id}}"><img src="{{url('image/view/'.$val->produk_image_src1)}}" alt="" style="display: block; height: 100%;  margin: 0;"/></a>
            
        </div>
        </center>
        <div style=" border: 0px solid;">
          <div>
           <div style="height: 15px; font-size: 12px; text-align: center; border: 0px solid ; "><b>{{$val->produk_name}}</b></div>
          <div style="font-size: 10px; height: 15px;"> 
            <center>
           {{$val->produk_model}}
           </center>
          </div>
          </div>
           
           <div style=" border: 0px solid; text-align:center" ><a class="btn btn-primary btn-mini" href="#">Rp.{{$val->produk_price}},00</a></div>
           <div style="width: 145px; height: 26px; border: 0px solid;">
            <center>
           @guest

        <form action="register" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}              
                <center><input type="number" name="produk_cart_qty" class="span1" placeholder="Qty."/></center>
                <center>
                <a href="register" class="btn btn-medium btn-primary">Add to <i class=" icon-shopping-cart"></i></a>
                <a href="mproduk_{{$val->produk_id}}" class="btn btn-medium"><i class="icon-zoom-in"></i></a>
                </center>
        </form>
         @else
          <form action="{{route('cart_save')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="asal" id="" value="mcart_produk"/>          
                <input type="hidden" name="user_id" id="" value="{{Auth::user()->id}}"/>
                <input type="hidden" name="produk_id" id="" value="{{$val->produk_id}}"/>           
                <input type="hidden" name="produk_name" id="" value="{{$val->produk_name}}">
                <input type="hidden" name="produk_price" id="" value="{{$val->produk_price}}"/>
                <input type="hidden" name="produk_image_src1" id="" value="{{$val->produk_image_src1}}"/>
                <div style="width: 100px; height: 20px; padding-left: 12px; border: 0px solid;">
                <input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty." value="1"  />
                <div style="width: 25px; float: left;">
                                <a href="mproduk_{{$val->produk_id}}" class="btn btn-mini"><i class="icon-zoom-in"></i></a>
                </div>
                <div style="width: 70px; float: left;">
                <button class="btn btn-mini" style="float: left;"> Add to <i class=" icon-shopping-cart"></i></button>
                </div>
              </div>
                 
         </form>
         @endguest
         </center>
         </div>
        </div>
      </div>
      
       @endforeach
       @else
       <center> Barang tidak tersedia</center>
        @endif
      <div class="clr"></div>
      
  <hr class="soft"/>
  </div>
  @if(!empty($cari_barang))
           @if(!empty($limit_tambah))
      <center>
        <div style="width: 420px; padding-right: 35px;">
        <form action="mcari_barang={{$limit_tambah+24}}" method="POST">
           {{ csrf_field() }}
          <input type="hidden" name="barang" value="{{$barang}}">
          <input type="hidden" name="produk_jenis" value="{{$jenis}}">
          <button class="btn btn-mini">tampilkan lebih banyak barang</button>
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
            <button class="btn btn-mini">tampilkan lebih banyak barang</button>
            </form>
            </div>      
          </center>
        @else
          <center>
            
            Barang tidak ada
                 
          </center>
        @endif
      @endif
      @else
      <center>
        <div style="width: 420px; padding-right: 35px;">
          <a href="mproduk={{$limit_tambah+24}}"><button class="btn btn-mini">tampilkan lebih banyak barang</button></a>
        </div>
      </center>
      @endif
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
