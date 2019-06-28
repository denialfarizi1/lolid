@extends('mmaster_beranda')

@section('content')

<div style="width: 510px; height: auto; border:1px solid;  padding: 5px;">
  
   <div style="width: 500px; height: auto; border:1px solid; border-color: red;  padding: 4px;">
     <div style="width: 490px; height: auto; border:1px solid; border-color: blue;  padding: 4px;" >
        
       <div class="col-md-7"><h3>Buat Grup</h3></div>
        <div class="col-md-7">
            <form action="{{route('grup_buat_save')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    
                         <div class="col-sm-6">
                            <input class="form-control" id="#" type="hidden" name="user_id" value="{{Auth::user()->id}}" placeholder="">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Nama Grup <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-6">
                            <input class="form-control" type="text" name="grup_name" >
                         </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-6 control-label">Jenis Grup</label>
                         <div class="col-sm-6">
                    <label>
                    <select name="grup_jenis" required="required" style="width: 100px; height: 30px;">
                            <option value="Public">Public</option>
                            <option value="Edukasi">Edukasi</option>
                            
                    </select>
                    </label>
                    </div>
                </div>
                <!--
                <div class="form-group">
                    <label class="col-sm-6 control-label">Anggota<i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-6">
                            <input class="form-control" type="text" name="user_id" style="width: 200px;">
                         </div>
                </div>
               -->
                <div class="form-group">
                         <div class="col-sm-6">
                            <br/>
                            <button class="btn btn-mini btn-primary">Tambah Grup</button>
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

   <div style="width: 490px; height: auto; border:1px solid; border-color: yellow;  padding: 10px;">
    
    </div>
   
 
</div>
<br/>
          

@endsection
