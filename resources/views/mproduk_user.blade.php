@extends('mmaster')

@section('content')


<div class="span7" style="width: 520px; border: 0px solid; font-size: 13px;">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li class="active"> SHOPPING CART</li>
    </ul>
  <h4>  Detail Produk Anda [ <small>{{$count_produk_user}} Item(s) </small>]</h4>  
  <a href="tambah_produk=m" class="btn btn-medium pull-right"><i class="icon-arrow-up"></i> Tambah Produk </a>
  <hr class="soft"/> 
 @if(!empty($user_produk_post))
      @foreach($user_produk_post as $val)
  <table class="table table-bordered" style="font-size: 10px;">
              <thead>
                <tr>
                  <th><div style="width: 80px;">Product Name</div></th>
                  <th><div style="width: 50px;">Model</div></th>
                  <th><div style="width: 80px;">Size</div></th>
                  <th>stock</th>
                  <th>Price</th>
                  <th><div style="width: 120px;">Action</div></th>
             </tr>
              </thead>
              <tbody>
                <tr>
                  <td><center><div style="width: 60px;"><img width="40" src="{{url('image/view/'.$val->produk_image_src1)}}" alt=""/></br>{{$val->produk_name}}</div></center></td>
                  
                  <td><center><div style="width: 50px;">{{$val->produk_model}}</div></center></td>
                  <td><center><div style="width: 80px;">{{$val->produk_size}}</div></center></td>
                  <td><center>{{$val->produk_qty}}</center></td>
                  <td><center>Rp.{{$val->produk_price}},00</center></td>
                  <td><center>
                      <div style="width: 120px;">
                        <div style="float: left; padding-right: 2px;">
                             <a href="medit_produk_{{$val->produk_id}}"><button style="font-size: 10px" type="button" class="btn btn-success btn-mini">edit </button></a>
                        </div>
                       <div style="float: left; padding-right: 2px;">
                           <a href="mproduk_{{$val->produk_id}}"><button style="font-size: 10px" type="button" class="btn btn-info btn-mini"> detail</button></a>
                        </div>
                         <div style="float: left;">
                           <form action="/produk/hapus/{{$val->produk_id}}" method="post" >
                           {{ csrf_field() }}
                           <input type="hidden" name="asal" value="user_produk=m">
                           <button style="font-size: 10px" type="submit" class="btn btn-danger btn-mini"> delete</button>
                         </form>
                          </div>
                        </div>
                      </center>
                  </td>
                  
                </tr>
        
            </table>
    
    @endforeach
        @endif
                
  <a href="produk=m" class="btn btn-medium"><i class="icon-arrow-left"></i> Continue Shopping </a>
  <a href="#" class="btn btn-medium pull-right">Next <i class="icon-arrow-right"></i></a>
  
</div>
</div>
</div>
</div>
      

@endsection
