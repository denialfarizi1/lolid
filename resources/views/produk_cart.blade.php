@extends('master')

@section('content')

        <div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li class="active"> SHOPPING CART</li>
    </ul>
  <h3>  SHOPPING CART [ <small>{{$count_cart}} Item(s) </small>]<a href="produk" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>  
  <hr class="soft"/>
  @guest
  <table class="table table-bordered">
    <tr><th> I AM ALREADY REGISTERED  </th></tr>
     <tr> 
     <td>
      <form class="form-horizontal">
        <div class="control-group">
          <label class="control-label" for="inputUsername">Username</label>
          <div class="controls">
          <input type="text" id="inputUsername" placeholder="Username">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputPassword1">Password</label>
          <div class="controls">
          <input type="password" id="inputPassword1" placeholder="Password">
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
          <button type="submit" class="btn">Sign in</button> OR <a href="register.html" class="btn">Register Now!</a>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <a href="forgetpass.html" style="text-decoration:underline">Forgot password ?</a>
          </div>
        </div>
      </form>
      </td>
      </tr>
  </table>    
  @else
  

  <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Produk</th>
                  <th>Nama Produk</th>
                  <th>Quantity</th>
                  <th>Harga</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($cart))
                     @foreach($cart as $c)

                <tr>
                  <td> <img width="60" src="{{url('image/view/'.$c->produk_image_src1)}}" alt=""/></td>
                  <td>{{$c->produk_name}}<br/></td>
                  <td>
                    @if(!empty($c->produk_cart_qty))
                      <?php

                        
                        $produk_total = $c->produk_cart_qty * $c->produk_price ;
                     ?>
                       {{$c->produk_cart_qty}}
                      @else
                      <?php
                        $produk_cart_qty = 0 ;
                        $produk_total = $produk_cart_qty * $c->produk_price ;
                     ?>
                       {{$produk_cart_qty}}
                      @endif
                    
                  </td>
                  <td>Rp.{{$c->produk_price}},00</td>
                  <td>
                       Rp.{{$produk_total}},00
                  </td>
                  <td><div style="width: 130px;">
                      <div style="width: 35px; float: left;">
                       <a href="edit_cart_produk"><button type="button" class="btn btn-success btn-mini">edit </button></a>
                      </div>
                      <div style="width: 45px; float: left;">
                      <a href="produk_{{$c->produk_id}}"><button type="button" class="btn btn-info btn-mini" > detail</button></a>
                     </div>
                      <div style="width: 50px; float: left;">
                      <form action="/cart_produk/hapus/{{$c->cart_id}}" method="POST">
                        {{ csrf_field() }} 
                      <input type="hidden" name="asal" value="cart_produk">
                      <button type="submit" class="btn btn-danger btn-mini"> delete</button>
                      </form>
                     </div>
                   </div>
                  </td>
                  
                </tr>
                     @endforeach
                 @endif
                <tr>
                  <td colspan="4" style="text-align:right" >Total Price: </td>
                  <td></td>
                </tr>
                 <tr>
                  <td colspan="4" style="text-align:right">Total Discount:  </td>
                  <td> Rp.0,00</td>
                </tr>
                 <tr>
                  <td colspan="4" style="text-align:right">Total Tax: </td>
                  <td> Rp.0,00</td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align:right"><strong>TOTAL =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> Rp.,00 </strong></td>
                </tr>
              </tbody>
            </table>
   
      <a href="products.html" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
  <a href="login.html" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
  
</div>
</div>
</div>
</div>
@endguest
 
@endsection
