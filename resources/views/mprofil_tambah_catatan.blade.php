@extends('mmaster_beranda')

@section('content')

<div style="width: 500px; height: 500px; border:1px solid;   padding-top: 40px; padding-bottom: 20px">
  
    <form action="{{route('catatan_save')}}" method="POST" enctype="multipart/form-data">
       {{ csrf_field() }}
       <div style="width: 500px">
        Judul 
        <br/>
        <input type="hidden" name="asal" style="width: 460px;" value="profil=m" />
        <input type="hidden" name="user_id" style="width: 460px;" value="{{Auth::user()->id}}" />
        <input type="text" name="catatan_judul" style="width: 465px;" />
        <br/>
         <textarea name="catatan_isi" style="width: 480px; height: 400px"></textarea>
         <br/>
          <input type="submit" class="btn btn-primary  btn-mini" value="Tambah Catatan">
        </div>
     </form>
  
</div>
<br/>
<div class="container">
  
  
</div>

                
<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<script type="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script type="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
<script>tynymice.init({selector:'textarea'});</script>
@endsection
