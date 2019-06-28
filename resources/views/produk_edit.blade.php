@extends('master')

@section('content')
<div class="container" style="padding-left: 300px;">
    <div class="row">
        <div class="col-md-12"><h3>Edit Produk</h3></div>
        <div class="col-md-12">
            <form action="{{'/produk/update/'.$produk_id->produk_id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}


                <div class="form-group">
                    
                         <div class="col-sm-10">
                             <input type="hidden" name="asal" value="user_produk" >
                            <input class="form-control" id="#" type="hidden" name="produk_id" value="{{$produk_id->produk_id}}" placeholder="">
                         </div>
                </div>

                <div class="form-group">
                    
                         <div class="col-sm-10">
                            <input class="form-control" id="#" type="hidden" name="user_id" value="{{$produk_id->user_id}}" placeholder="">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Nama Produk</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_name" value="{{$produk_id->produk_name}}" >
                         </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Lokasi</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_lokasi" value="{{$produk_id->produk_lokasi}}" >
                         </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Jenis Produk</label>
                         <div class="col-sm-10">
                    <label>
                    <select name="produk_jenis" required="required" style="width: 100px; height: 30px;">
                           <option value="Elektronik">Elektronik</option>
                            <option value="Alat_Rumah_Tangga">Alat Rumah Tangga</option>
                            <option value="Buku">Buku</option>
                            <option value="Hewan">Hewan</option>
                            <option value="Hiburan">Hiburan</option>
                            <option value="Jasa">Jasa</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Pakaian">Pakaian</option>
                            <option value="Tempat">Tempat</option>
                            <option value="Lain_Lain">Lain-Lain</option>
                    </select>
                    </label>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Merek</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_brand" style="width: 200px;" value="{{$produk_id->produk_brand}}">
                         </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Model</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_model" style="width: 200px;" value="{{$produk_id->produk_model}}">
                         </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Tanggal Released</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="date" name="produk_released_on" style="width: 200px;" value="{{$produk_id->produk_released_on}}">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Dimensi P x L x T</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_dimensions" style="width: 200px;" value="{{$produk_id->produk_dimensions}}">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Ukuran Tersedia</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_size" style="width: 200px;" value="{{$produk_id->produk_size}}">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Descripsi</label>
                         <div class="col-sm-10">
                            <textarea name="produk_desc" style="width: 700px;">{!! $produk_id->produk_desc !!}</textarea>
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Stock</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="number" name="produk_qty" style="width: 200px;" value="{{$produk_id->produk_qty}}">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Harga</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="number" name="produk_price" style="width: 200px;" value="{{$produk_id->produk_price}}">
                         </div>
                </div>
                <!--
                <div class="form-group">
                    <label class="col-sm-10 control-label">Upload Foto 1 <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="file" name="produk_image_src1" value="">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Upload Foto 2 <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="file" name="produk_image_src2" value="">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Upload Foto 3 <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="file" name="produk_image_src3" value="">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Upload Video</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="file" name="produk_video_url">
                         </div>
                </div>
                -->
                <div class="form-group">
                         <div class="col-sm-10">
                            <br/>
                            <button class="btn btn-sm btn-primary">Update Produk</button>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                         </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<script type="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script type="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
<script>tynymice.init({selector:'textarea'});</script>

@endsection
