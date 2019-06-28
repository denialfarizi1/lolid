@extends('master_user')

@section('content')

<div style="width: 600px; height: 600px; border:1px solid; float: right; padding-left: 50px; padding-right: 50px; padding-top: 40px; padding-bottom: 20px">
  <center>
    <form action="{{route('update_user')}}" method="POST" enctype="multipart/form-data">
       {{ csrf_field() }}
        <table style="font-size: 15px;">
           <tr>
            <td><label for="">Upload Foto Backgorund Anda</label></td>
            <td></td>
            <td>  <div class="form-group">
                    <input type="hidden" name="asal" value="profil">
                    <input type="file" name="image_background">
                </div>
            </td>
          </tr>
          <tr>
            <td><label for="">Upload Foto Profil Anda</label></td>
            <td></td>
            <td>  <div class="form-group">
                    <input type="file" name="image_profil">
                </div>
            </td>
          </tr>
          <tr>
            <td>Nama </td>
            <td style="width: 10px;">:</td>
            <input type="hidden" name="id" value="{{Auth::user()->id}}">
            <td> <input type="text" name="name" value="{{Auth::user()->name}}"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td> <input type="mail" name="email" value="{{Auth::user()->email}}"></td>
          </tr>
          <tr>
            <td>HP/WA </td>
            <td>:</td>
            <td><input type="number" name="hp" value="0{{Auth::user()->hp}}"></td>
          </tr>
          <tr>
            <td>Deskripsi </td>
            <td>:</td>
            <td><textarea name="desc">{{Auth::user()->desc}}</textarea></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" value="{{Auth::user()->alamat}}"/></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><input type="submit" class="btn btn-primary" value="update"></td>
          </tr>
        </table>
     </form>
  </center>
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
