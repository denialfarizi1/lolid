<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Comment_Produk;
use App\Models\Rating;
use Image;
use Auth;
class ProdukController extends Controller
{    
     public function beranda()
    {        
             $produk= DB::table('produk')->get();
            $data['produk'] = $produk;
            

            
            //return view('beranda', $data);
    }

    public function index()
    {       
            
            $limit_barang = 24;
            $limit_tambah = 24;
            $produk = DB::table('produk')->orderByDesc('created_at')->limit($limit_barang)->orderByDesc('created_at')->get();
            $count_produk= DB::table('produk')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
          
            
            $data['produk'] = $produk;
            $data['limit_tambah'] = $limit_tambah;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
           

           
            return view('produk', $data);

    }
    public function indexm()
    {       
            
            $limit_barang = 24;
            $limit_tambah = 24;
            $produk = DB::table('produk')->orderByDesc('created_at')->limit($limit_barang)->orderByDesc('created_at')->get();
            $count_produk= DB::table('produk')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
          
            
            $data['produk'] = $produk;
            $data['limit_tambah'] = $limit_tambah;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
           

           
            return view('mproduk', $data);

    }
    public function produk_limit_tambah($limit_barang)
    {       
            
              if(empty(Auth::user()))
              {
                   $user =  DB::table('users')->where('id', 21)->first();;
              }else
              {
                   $user = Auth::user();
              }
            $limit_tambah = $limit_barang;
            $produk= DB::table('produk')->orderByDesc('created_at')->limit($limit_barang)->orderByDesc('created_at')->get();
            
            $count_produk= DB::table('produk')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
     
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', $user->id)->count();
          
            
            $data['produk'] = $produk;
            $data['limit_tambah'] = $limit_tambah;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
           

           
            return view('produk', $data);

    }
    public function produk_limit_tambahm($limit_barang)
    {       
            
              if(empty(Auth::user()))
              {
                   $user =  DB::table('users')->where('id', 21)->first();;
              }else
              {
                   $user = Auth::user();
              }
            $limit_tambah = $limit_barang;
            $produk= DB::table('produk')->orderByDesc('created_at')->limit($limit_barang)->orderByDesc('created_at')->get();
            
            $count_produk= DB::table('produk')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
     
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', $user->id)->count();
          
            
            $data['produk'] = $produk;
            $data['limit_tambah'] = $limit_tambah;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
           

           
            return view('mproduk', $data);

    }
          public function cari_barang(Request $request)
    {   
            
            
            $limit_barang = 24;
            $limit_tambah = 24;
            $barang = $request->barang;
            $jenis = $request->produk_jenis;
            $cari_barang = 'cari barang';
            
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            $cart = DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            if(!empty($request->barang))
              { 
                
               if($request->produk_jenis == 'All')
                 {
                  $produk_jenis = DB::table('produk')->where('produk_jenis', 'tidak_ada')->orderByDesc('created_at')->first();
                  $produk = DB::table('produk')->where('produk_name','like','%'.$request->barang.'%')->orderByDesc('created_at')->limit($limit_barang)->get();
                  $count_produk= DB::table('produk')->where('produk_name','like','%'.$request->barang.'%')->count();
                 }else{
                  $produk_jenis = DB::table('produk')->where('produk_jenis', $request->produk_jenis)->orderByDesc('created_at')->first();
                  $produk = DB::table('produk')->where('produk_jenis', $request->produk_jenis)->where('produk_name','like','%'.$request->barang.'%')->orderByDesc('created_at')->limit($limit_barang)->get();
                  $count_produk= DB::table('produk')->where('produk_name','like','%'.$request->barang.'%')->where('produk_jenis', $request->produk_jenis)->count();
                 }
              }
              //dd($produk);
             if(empty($request->barang))
              {
               return redirect('produk=m');
              }
             $data['limit_tambah'] = $limit_tambah;
             $data['barang'] = $barang;
             $data['jenis'] = $jenis;
             $data['cari_barang'] = $cari_barang;
             $data['count_produk'] = $count_produk;
             $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
             $data['count_produk_buku'] = $count_produk_buku;
             $data['count_produk_elektronik'] = $count_produk_elektronik;
             $data['count_produk_hewan'] = $count_produk_hewan;
             $data['count_produk_hiburan'] = $count_produk_hiburan;
             $data['count_produk_jasa'] = $count_produk_jasa;
             $data['count_produk_kendaraan'] = $count_produk_kendaraan;
             $data['count_produk_kesehatan'] = $count_produk_kesehatan;
             $data['count_produk_makanan'] = $count_produk_makanan;
             $data['count_produk_olahraga'] = $count_produk_olahraga;
             $data['count_produk_pakaian'] = $count_produk_pakaian;
             $data['count_produk_tempat'] = $count_produk_tempat;
             $data['count_produk_lain'] = $count_produk_lain;
             $data['count_cart'] = $count_cart;
             $data['cart'] = $cart;
             $data['produk_jenis'] = $produk_jenis;
             $data['produk'] = $produk;
            return view('produk', $data);
         
    }
            public function cari_barangm(Request $request)
    {   
            
            $limit_barang = 24;
            $limit_tambah = 24;
            $barang = $request->barang;
            $jenis = $request->produk_jenis;
            $cari_barang = 'cari barang';
            
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            $cart = DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            if(!empty($request->barang))
              { 
                
               if($request->produk_jenis == 'All')
                 {
                  $produk_jenis = DB::table('produk')->where('produk_jenis', 'tidak_ada')->orderByDesc('created_at')->first();
                  $produk = DB::table('produk')->where('produk_name','like','%'.$request->barang.'%')->orderByDesc('created_at')->limit($limit_barang)->get();
                  $count_produk= DB::table('produk')->where('produk_name','like','%'.$request->barang.'%')->count();
                 }else{
                  $produk_jenis = DB::table('produk')->where('produk_jenis', $request->produk_jenis)->orderByDesc('created_at')->first();
                  $produk = DB::table('produk')->where('produk_jenis', $request->produk_jenis)->where('produk_name','like','%'.$request->barang.'%')->orderByDesc('created_at')->limit($limit_barang)->get();
                  $count_produk= DB::table('produk')->where('produk_name','like','%'.$request->barang.'%')->where('produk_jenis', $request->produk_jenis)->count();
                 }
              }
              //dd($produk);
             if(empty($request->barang))
              {
               return redirect('produk=m');
              }
             $data['limit_tambah'] = $limit_tambah;
             $data['barang'] = $barang;
             $data['jenis'] = $jenis;
             $data['cari_barang'] = $cari_barang;
             $data['count_produk'] = $count_produk;
             $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
             $data['count_produk_buku'] = $count_produk_buku;
             $data['count_produk_elektronik'] = $count_produk_elektronik;
             $data['count_produk_hewan'] = $count_produk_hewan;
             $data['count_produk_hiburan'] = $count_produk_hiburan;
             $data['count_produk_jasa'] = $count_produk_jasa;
             $data['count_produk_kendaraan'] = $count_produk_kendaraan;
             $data['count_produk_kesehatan'] = $count_produk_kesehatan;
             $data['count_produk_makanan'] = $count_produk_makanan;
             $data['count_produk_olahraga'] = $count_produk_olahraga;
             $data['count_produk_pakaian'] = $count_produk_pakaian;
             $data['count_produk_tempat'] = $count_produk_tempat;
             $data['count_produk_lain'] = $count_produk_lain;
             $data['count_cart'] = $count_cart;
             $data['cart'] = $cart;
             $data['produk_jenis'] = $produk_jenis;
             $data['produk'] = $produk;
            return view('mproduk', $data);
         
    }
             public function cari_barang_limit(Request $request, $limit_barang)
    {   
            $limit_tambah = $limit_barang;
            $barang = $request->barang;
            $jenis = $request->produk_jenis;
            $cari_barang = 'cari barang';
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
          
            if(!empty($request->barang))
              { 
                
               if($request->produk_jenis == 'All')
                 {
                  $produk_jenis = DB::table('produk')->where('produk_jenis', 'tidak_ada')->orderByDesc('created_at')->first();
                  $produk = DB::table('produk')->where('produk_name','like','%'.$request->barang.'%')->orderByDesc('created_at')->limit($limit_barang)->get();
                  $count_produk= DB::table('produk')->where('produk_name','like','%'.$request->barang.'%')->count();
                 }else{
                  $produk_jenis = DB::table('produk')->where('produk_jenis', $request->produk_jenis)->orderByDesc('created_at')->first();
                  $produk = DB::table('produk')->where('produk_jenis', $request->produk_jenis)->where('produk_name','like','%'.$request->barang.'%')->orderByDesc('created_at')->limit($limit_barang)->get();
                  $count_produk= DB::table('produk')->where('produk_name','like','%'.$request->barang.'%')->where('produk_jenis', $request->produk_jenis)->count();
                 }
              }
             if(empty($request->barang))
              {
               return $redirect('produk');
              }
             $data['limit_tambah'] = $limit_tambah;
             $data['barang'] = $barang;
             $data['jenis'] = $jenis;
             $data['cari_barang'] = $cari_barang;
             $data['count_produk'] = $count_produk;
             $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
             $data['count_produk_buku'] = $count_produk_buku;
             $data['count_produk_elektronik'] = $count_produk_elektronik;
             $data['count_produk_hewan'] = $count_produk_hewan;
             $data['count_produk_hiburan'] = $count_produk_hiburan;
             $data['count_produk_jasa'] = $count_produk_jasa;
             $data['count_produk_kendaraan'] = $count_produk_kendaraan;
             $data['count_produk_kesehatan'] = $count_produk_kesehatan;
             $data['count_produk_makanan'] = $count_produk_makanan;
             $data['count_produk_olahraga'] = $count_produk_olahraga;
             $data['count_produk_pakaian'] = $count_produk_pakaian;
             $data['count_produk_tempat'] = $count_produk_tempat;
             $data['count_produk_lain'] = $count_produk_lain;
             $data['count_cart'] = $count_cart;
             $data['cart'] = $cart;
             $data['produk_jenis'] = $produk_jenis;
             $data['produk'] = $produk;
            return view('produk', $data);
         
    }
     public function cari_barang_limitm(Request $request, $limit_barang)
    {   
            $limit_tambah = $limit_barang;
            $barang = $request->barang;
            $jenis = $request->produk_jenis;
            $cari_barang = 'cari barang';
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
          
            if(!empty($request->barang))
              { 
                
               if($request->produk_jenis == 'All')
                 {
                  $produk_jenis = DB::table('produk')->where('produk_jenis', 'tidak_ada')->orderByDesc('created_at')->first();
                  $produk = DB::table('produk')->where('produk_name','like','%'.$request->barang.'%')->orderByDesc('created_at')->limit($limit_barang)->get();
                  $count_produk= DB::table('produk')->where('produk_name','like','%'.$request->barang.'%')->count();
                 }else{
                  $produk_jenis = DB::table('produk')->where('produk_jenis', $request->produk_jenis)->orderByDesc('created_at')->first();
                  $produk = DB::table('produk')->where('produk_jenis', $request->produk_jenis)->where('produk_name','like','%'.$request->barang.'%')->orderByDesc('created_at')->limit($limit_barang)->get();
                  $count_produk= DB::table('produk')->where('produk_name','like','%'.$request->barang.'%')->where('produk_jenis', $request->produk_jenis)->count();
                 }
              }
             if(empty($request->barang))
              {
               return $redirect('produk');
              }
             $data['limit_tambah'] = $limit_tambah;
             $data['barang'] = $barang;
             $data['jenis'] = $jenis;
             $data['cari_barang'] = $cari_barang;
             $data['count_produk'] = $count_produk;
             $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
             $data['count_produk_buku'] = $count_produk_buku;
             $data['count_produk_elektronik'] = $count_produk_elektronik;
             $data['count_produk_hewan'] = $count_produk_hewan;
             $data['count_produk_hiburan'] = $count_produk_hiburan;
             $data['count_produk_jasa'] = $count_produk_jasa;
             $data['count_produk_kendaraan'] = $count_produk_kendaraan;
             $data['count_produk_kesehatan'] = $count_produk_kesehatan;
             $data['count_produk_makanan'] = $count_produk_makanan;
             $data['count_produk_olahraga'] = $count_produk_olahraga;
             $data['count_produk_pakaian'] = $count_produk_pakaian;
             $data['count_produk_tempat'] = $count_produk_tempat;
             $data['count_produk_lain'] = $count_produk_lain;
             $data['count_cart'] = $count_cart;
             $data['cart'] = $cart;
             $data['produk_jenis'] = $produk_jenis;
             $data['produk'] = $produk;
            
            return view('mproduk', $data);
         
    }
        public function index_alat_rumah_tangga()
    {       
            $limit_tambah = 24;
            $limit_barang = 24;
            $limit_tambah_jenis = $limit_barang + 24;
             
            $produk = DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->orderByDesc('created_at')->first();
            if(!empty($produk_jenis))
            {
            $target_link = $produk_jenis->produk_jenis;
            }else
            {
             $target_link = 'kosong';
            }
            $count_produk= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
            $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);

    }
         public function index_alat_rumah_tangga_limit($limit_barang)
    {       
            
            $limit_tambah = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk = DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->orderByDesc('created_at')->limit($limit_barang)->get();
              
            $produk= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->orderByDesc('created_at')->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->orderByDesc('created_at')->first();
            $count_produk= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['limit_tambah'] = $limit_tambah;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);

      }
     public function index_buku()
    {       
            $limit_tambah = 24;
            $limit_barang = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Buku')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Buku')->orderByDesc('created_at')->first();
            if(!empty($produk_jenis))
            {
            $target_link = $produk_jenis->produk_jenis;
            }else
            {
             $target_link = 'kosong';
            }
            $count_produk= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;   
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);


    }
    public function index_buku_limit($limit_barang)
    {       
            $limit_tambah = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Buku')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Buku')->orderByDesc('created_at')->first();
            $target_link = $produk_jenis->produk_jenis;
            $count_produk= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);


    }
    
     public function index_elektronik()
    {       
            $limit_tambah = 24;
            $limit_barang = 24;
            $limit_tambah_jenis = $limit_barang + 24;

            $produk = DB::table('produk')->where('produk_jenis', 'Elektronik')->orderByDesc('created_at')->limit($limit_barang)->get();
             
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Elektronik')->orderByDesc('created_at')->first();
            if(!empty($produk_jenis))
            {
            $target_link = $produk_jenis->produk_jenis;
            }else
            {
             $target_link = 'kosong';
            }
            $count_produk= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);

    }
    public function index_elektronik_limit($limit_barang)
    {       
            $limit_tambah = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk = DB::table('produk')->where('produk_jenis', 'Elektronik')->orderByDesc('created_at')->limit($limit_barang)->get();
             
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Elektronik')->orderByDesc('created_at')->first();
            $target_link = $produk_jenis->produk_jenis;
            $count_produk= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);

    }
      public function index_hewan()
    {       
            $limit_tambah = 24;
            $limit_barang = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Hewan')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Hewan')->orderByDesc('created_at')->first();
           if(!empty($produk_jenis))
            {
            $target_link = $produk_jenis->produk_jenis;
            }else
            {
             $target_link = 'kosong';
            }
            $count_produk= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
             
            $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);
    }
     public function index_hewan_limit($limit_barang)
    {       
            $limit_tambah = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Hewan')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Hewan')->orderByDesc('created_at')->first();
            $target_link = $produk_jenis->produk_jenis;
            $count_produk= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
             
            $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);
    }
     public function index_hiburan()
    {       
            $limit_tambah = 24;
            $limit_barang = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Hiburan')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Hiburan')->orderByDesc('created_at')->first();
            if(!empty($produk_jenis))
            {
            $target_link = $produk_jenis->produk_jenis;
            }else
            {
             $target_link = 'kosong';
            }
            $count_produk= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
            $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);
    }
     public function index_hiburan_limit($limit_barang)
    {       
            $limit_tambah = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Hiburan')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Hiburan')->orderByDesc('created_at')->first();
            $target_link = $produk_jenis->produk_jenis;
            $count_produk= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);
    }
    
       public function index_jasa()
    {       
            $limit_tambah = 24;
            $limit_barang = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Jasa')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Jasa')->orderByDesc('created_at')->first();
            if(!empty($produk_jenis))
            {
            $target_link = $produk_jenis->produk_jenis;
            }else
            {
             $target_link = 'kosong';
            }
            $count_produk= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);

     }
          public function index_jasa_limit($limit_barang)
    {       
            $limit_tambah = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Jasa')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Jasa')->orderByDesc('created_at')->first();
            $target_link = $produk_jenis->produk_jenis;
            $count_produk= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);

     }
     public function index_kesehatan()
    {       
            $limit_tambah = 24;
            $limit_barang = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Kesehatan')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Kesehatan')->orderByDesc('created_at')->first();
            if(!empty($produk_jenis))
            {
            $target_link = $produk_jenis->produk_jenis;
            }else
            {
             $target_link = 'kosong';
            }
            $count_produk= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);
    }
     public function index_kesehatan_limit($limit_barang)
    {       
            $limit_tambah = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Kesehatan')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Kesehatan')->orderByDesc('created_at')->first();
            $target_link = $produk_jenis->produk_jenis;
            $count_produk= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);
    }
     public function index_makanan()
    {       
            $limit_tambah = 24;
            $limit_barang = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Makanan')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Makanan')->orderByDesc('created_at')->first();
            if(!empty($produk_jenis))
            {
            $target_link = $produk_jenis->produk_jenis;
            }else
            {
             $target_link = 'kosong';
            }
            $count_produk= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);

    }
     public function index_makanan_limit($limit_barang)
    {       
            $limit_tambah = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Makanan')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Makanan')->orderByDesc('created_at')->first();
            $target_link = $produk_jenis->produk_jenis;
            $count_produk= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);

    }
     public function index_olahraga()
    {       
            $limit_tambah = 24;
            $limit_barang = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Olahraga')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Olahraga')->orderByDesc('created_at')->first();
            if(!empty($produk_jenis))
            {
            $target_link = $produk_jenis->produk_jenis;
            }else
            {
             $target_link = 'kosong';
            }
            $count_produk= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
             
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);
     }
       public function index_olahraga_limit($limit_barang)
    {       
            $limit_tambah = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Olahraga')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Olahraga')->orderByDesc('created_at')->first();
            $target_link = $produk_jenis->produk_jenis;
            $count_produk= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);
     }
     public function index_pakaian()
    {       
            $limit_tambah = 24;
            $limit_barang = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Pakaian')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Pakaian')->orderByDesc('created_at')->first();
            if(!empty($produk_jenis))
            {
            $target_link = $produk_jenis->produk_jenis;
            }else
            {
             $target_link = 'kosong';
            }
            $count_produk= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
             
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);
     }
      public function index_pakaian_limit($limit_barang)
    {       
            $limit_tambah = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Pakaian')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Pakaian')->orderByDesc('created_at')->first();
            $target_link = $produk_jenis->produk_jenis;
            $count_produk= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);
     }
      public function index_tempat()
    {       
            $limit_tambah = 24;
            $limit_barang = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Pakaian')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Pakaian')->orderByDesc('created_at')->first();
            if(!empty($produk_jenis))
            {
            $target_link = $produk_jenis->produk_jenis;
            }else
            {
             $target_link = 'kosong';
            }
            $count_produk= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);
    }
     public function index_tempat_limit($limit_barang)
    {       
            $limit_tambah = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk= DB::table('produk')->where('produk_jenis', 'Pakaian')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Pakaian')->orderByDesc('created_at')->first();
            $target_link = $produk_jenis->produk_jenis;
            $count_produk= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);
    }
      
     public function index_lain_lain()
    {       
            $limit_tambah = 24;
            $limit_barang = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk = DB::table('produk')->where('produk_jenis', 'Lain_lain')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Lain_lain')->orderByDesc('created_at')->first();
            if(!empty($produk_jenis))
            {
            $target_link = $produk_jenis->produk_jenis;
            }else
            {
             $target_link = 'kosong';
            }
            $count_produk = DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);

  }
   public function index_lain_lain_limit($limit_barang)
    {       
            $limit_tambah = 24;
            $limit_tambah_jenis = $limit_barang + 24;
            $produk = DB::table('produk')->where('produk_jenis', 'Lain_lain')->orderByDesc('created_at')->limit($limit_barang)->get();
            $produk_jenis = DB::table('produk')->where('produk_jenis', 'Lain_lain')->orderByDesc('created_at')->first();
            $target_link = $produk_jenis->produk_jenis;
            $count_produk = DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
             $data['limit_tambah'] = $limit_tambah;  
            $data['limit_tambah_jenis'] = $limit_tambah_jenis;
            $data['produk'] = $produk;
            $data['produk_jenis'] = $produk_jenis;
            $data['target_link'] = $target_link;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
            return view('produk', $data);

  }
    public function detail($id)
    {   
        //produk index
            if(empty(Auth::user()))
              {
                   $user =  DB::table('users')->where('id', 21)->first();;
              }else
              {
                   $user = Auth::user();
              }
            $count_produk= DB::table('produk')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            
        if(!empty(Auth::user())){
        $count_cart= DB::table('cart')->where('user_id', $user->id)->count();    
        }else{
           $count_cart = 0; 
        }
        
        $produk_user = Produk::with('get_user')->where('produk_id', $id)->first();
        $produk = DB::table('produk')->where('user_id',$produk_user->get_user->id)->orderByDesc('created_at')->get();
            $user_id = DB::table('users')->where('username', $produk_user->get_user->username)->first();
            $rating_user = Rating::with('get_rating_user')->where('user_id',$produk_user->get_user->id)->get();
            $rating_user_sum = Rating::with('get_rating_user')->where('user_id',$produk_user->get_user->id)->sum('rating_nilai');
            $rating_user_avg = Rating::with('get_rating_user')->where('user_id',$produk_user->get_user->id)->avg('rating_nilai');
            $count_rating = Rating::with('get_rating_user')->where('user_id',$produk_user->get_user->id)->count();
               
        //$produk = DB::table('produk')->where('produk_id', $id)->get();
       //dd($produk_user);
         $cart= DB::table('cart')->get();
            $comment_produk = Comment_Produk::with('get_comment_produk_user')->where('produk_id',$id)->limit(15)->orderByDesc('updated_at')->get();
             // dd($comment_produk);
            
            $data['produk_user'] = $produk_user;
            $data['produk'] = $produk;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
            $data['rating_user'] = $rating_user;
            $data['rating_user_sum'] = $rating_user_sum;
            $data['rating_user_avg'] = $rating_user_avg;
            $data['count_rating'] = $count_rating;
           
            $data['comment_produk'] = $comment_produk;

          //  $data['jml_elektronik'] = $jml_elektronik;

        return view('produk_detail',$data);
    }
    public function detailm($id)
    {   
        //produk index
            if(empty(Auth::user()))
              {
                   $user =  DB::table('users')->where('id', 21)->first();;
              }else
              {
                   $user = Auth::user();
              }
            $count_produk= DB::table('produk')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            
        if(!empty(Auth::user())){
        $count_cart= DB::table('cart')->where('user_id', $user->id)->count();    
        }else{
           $count_cart = 0; 
        }
        
        $produk_user = Produk::with('get_user')->where('produk_id', $id)->first();
       // dd($produk_user);
        $produk = DB::table('produk')->where('user_id',$produk_user->get_user->id)->orderByDesc('created_at')->get();
            $user_id = DB::table('users')->where('username', $produk_user->get_user->username)->first();
            $rating_user = Rating::with('get_rating_user')->where('user_id',$produk_user->get_user->id)->get();
            $rating_user_sum = Rating::with('get_rating_user')->where('user_id',$produk_user->get_user->id)->sum('rating_nilai');
            $rating_user_avg = Rating::with('get_rating_user')->where('user_id',$produk_user->get_user->id)->avg('rating_nilai');
            $count_rating = Rating::with('get_rating_user')->where('user_id',$produk_user->get_user->id)->count();
               
        //$produk = DB::table('produk')->where('produk_id', $id)->get();
       //dd($produk_user);
         $cart= DB::table('cart')->get();
            $comment_produk = Comment_Produk::with('get_comment_produk_user')->where('produk_id',$id)->limit(15)->orderByDesc('updated_at')->get();
             // dd($comment_produk);
            $data['produk_user'] = $produk_user;
            $data['produk'] = $produk;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
            $data['rating_user'] = $rating_user;
            $data['rating_user_sum'] = $rating_user_sum;
            $data['rating_user_avg'] = $rating_user_avg;
            $data['count_rating'] = $count_rating;
           
            $data['comment_produk'] = $comment_produk;

          //  $data['jml_elektronik'] = $jml_elektronik;

        return view('mproduk_detail',$data);
    }
     public function comment_produk_save(Request $request)
    {   
        //$comment_produk_id= DB::table('comment_produk')->where('produk_id', $request->produk_id)->first(); 
        $comment_produk= DB::table('comment_produk')->get();

        $comment_produk                          = new Comment_Produk;
        $comment_produk->produk_id               = $request->produk_id;
        $comment_produk->user_id                 = $request->user_id;
        $comment_produk->comment_produk_desc     = $request->comment_produk_desc;
        $comment_produk->save();
       
       /*
       if(($request->post_id == $comment_post_id->post_id) && ($request->user_id == $comment_post_id->user_id)) 
          {
            return redirect('/beranda#'.$like_post_id->post_id);
          } 
       */
        return redirect($request->asal);
          
    }
   
    public function tambah(){


              //produk index
            
            $count_produk= DB::table('produk')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            
        if(Auth::user()){
        $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();    
        }else{
           $count_cart = 0; 
        }
        
         $cart= DB::table('cart')->get();
            
      
           
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;


            

        return view('produk_tambah',$data);
    }
    public function tambahm(){


              //produk index
            
            $count_produk= DB::table('produk')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            
        if(Auth::user()){
        $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();    
        }else{
           $count_cart = 0; 
        }
        
         $cart= DB::table('cart')->get();
            
      
           
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;


            

        return view('mproduk_tambah',$data);
    }
  public function viewImage($fileImage){
        $filepath = storage_path(env('PATH_IMAGE').$fileImage);
        return Image::make($filepath)->response();
    }

    public function create()
    {
         
    }

   
    public function store(Request $request)
    {
        

        $file1       = $request->file('produk_image_src1');
        $ext1        = $file1->getClientOriginalExtension();

        $dateTime   = date('Ymd_his');
        $newName1    = 'image_1_'.$dateTime.'.'.$ext1;

        $file1->move(storage_path(env('PATH_IMAGE')), $newName1);
        
        
        if($request->file('produk_image_src2'))
          {
        $file2       = $request->file('produk_image_src2');
        $ext2        = $file2->getClientOriginalExtension();
        $newName2    = 'image_2_'.$dateTime.'.'.$ext2;

        $file2->move(storage_path(env('PATH_IMAGE')), $newName2);

        
        $file3       = $request->file('produk_image_src3');
        $ext3        = $file3->getClientOriginalExtension();
        $newName3    = 'image_3_'.$dateTime.'.'.$ext3;
        $file3->move(storage_path(env('PATH_IMAGE')), $newName3);
         }
        $produk                      = new produk;
        
        $produk->user_id             = $request->user_id;
        
        $produk->produk_name         = $request->produk_name;
        $produk->produk_lokasi         = $request->produk_lokasi;
        $produk->produk_jenis        = $request->produk_jenis;
        $produk->produk_brand        = $request->produk_brand;
        $produk->produk_model        = $request->produk_model;
        $produk->produk_released_on  = $request->produk_released_on;
        $produk->produk_dimensions   = $request->produk_dimensions;
        $produk->produk_size         = $request->produk_size;
        $produk->produk_desc         = $request->produk_desc;
        $produk->produk_qty          = $request->produk_qty;
        $produk->produk_price        = $request->produk_price;
        $produk->produk_image_src1   = $newName1;
        if($request->file('produk_image_src2'))
          {
        $produk->produk_image_src2   = $newName2;
        $produk->produk_image_src3   = $newName3;
        }
        $produk->save();

        return redirect($request->asal)->with('success', 'Image have been saved');
    }

 public function user_produk_post()
    {       
        //produk index
            $user_produk_post= DB::table('produk')->where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get();
            $count_produk_user= DB::table('produk')->where('user_id', Auth::user()->id)->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
            
            
            $data['user_produk_post'] = $user_produk_post;
            $data['count_produk_user'] = $count_produk_user;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
           

            //$count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
            return view('produk_user',$data);
    }
    public function user_produk_postm()
    {       
        //produk index
            $user_produk_post= DB::table('produk')->where('user_id', Auth::user()->id)->orderByDesc('created_at')->get();
            $count_produk_user= DB::table('produk')->where('user_id',Auth::user()->id)->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $jml_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            
            
            $data['user_produk_post'] = $user_produk_post;
            $data['count_produk_user'] = $count_produk_user;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
            
            return view('mproduk_user',$data);
    }

    public function edit($id)
    {   

         
           $produk_id = DB::table('produk')->where('produk_id', $id)->first();
           //produk index
            $produk= DB::table('produk')->orderByDesc('created_at')->get();
            $count_produk= DB::table('produk')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
            
            
            $data['produk_id'] = $produk_id;
            $data['produk'] = $produk;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
    return view('produk_edit',$data); 
    }
    public function editm($id)
    {   

         
           $produk_id = DB::table('produk')->where('produk_id', $id)->first();
           //produk index
            $produk= DB::table('produk')->orderByDesc('created_at')->get();
            $count_produk= DB::table('produk')->count();
            $count_produk_alat_rumah_tangga= DB::table('produk')->where('produk_jenis', 'Alat_Rumah_Tangga')->count();
            $count_produk_buku= DB::table('produk')->where('produk_jenis', 'Buku')->count();
            $count_produk_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            $count_produk_hewan= DB::table('produk')->where('produk_jenis', 'Hewan')->count();
            $count_produk_hiburan= DB::table('produk')->where('produk_jenis', 'Hiburan')->count();
            $count_produk_jasa= DB::table('produk')->where('produk_jenis', 'Jasa')->count();
            $count_produk_kendaraan= DB::table('produk')->where('produk_jenis', 'Kendaraan')->count();
            $count_produk_kesehatan= DB::table('produk')->where('produk_jenis', 'Kesehatan')->count();
            $count_produk_makanan= DB::table('produk')->where('produk_jenis', 'Makanan')->count();
            $count_produk_olahraga= DB::table('produk')->where('produk_jenis', 'Olahraga')->count();
            $count_produk_pakaian= DB::table('produk')->where('produk_jenis', 'Pakaian')->count();
            $count_produk_tempat= DB::table('produk')->where('produk_jenis', 'Tempat')->count();
            $count_produk_lain= DB::table('produk')->where('produk_jenis', 'Lain_lain')->count();
            
            //cart
            $cart= DB::table('cart')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            
            
            
            $data['produk_id'] = $produk_id;
            $data['produk'] = $produk;
            $data['count_produk'] = $count_produk;
            $data['count_produk_alat_rumah_tangga'] = $count_produk_alat_rumah_tangga;
            $data['count_produk_buku'] = $count_produk_buku;
            $data['count_produk_elektronik'] = $count_produk_elektronik;
            $data['count_produk_hewan'] = $count_produk_hewan;
            $data['count_produk_hiburan'] = $count_produk_hiburan;
            $data['count_produk_jasa'] = $count_produk_jasa;
            $data['count_produk_kendaraan'] = $count_produk_kendaraan;
            $data['count_produk_kesehatan'] = $count_produk_kesehatan;
            $data['count_produk_makanan'] = $count_produk_makanan;
            $data['count_produk_olahraga'] = $count_produk_olahraga;
            $data['count_produk_pakaian'] = $count_produk_pakaian;
            $data['count_produk_tempat'] = $count_produk_tempat;
            $data['count_produk_lain'] = $count_produk_lain;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
    
    return view('mproduk_edit',$data); 
    }
    public function update(Request $request, $id)
    {   
      
        $produk_id = DB::table('produk')->where('produk_id', $id)->first();
        /*
        // $produk = DB::table('produk')->where('produk_id',$request->produk_id);
         
        $file1       = $request->file('produk_image_src1');
        if(!$file1->getClientOriginalExtension()){
            $newName1 = $produk_id->produk_image_src1;
          }else{
        $ext1        = $file1->getClientOriginalExtension();
        
        $dateTime   = date('Ymd_his');
        $newName1    = 'image_1_'.$dateTime.'.'.$ext1;
        $file1->move(storage_path(env('PATH_IMAGE')), $newName1);
         }

        $file2       = $request->file('produk_image_src2');
        if(!$file2->getClientOriginalExtension()){
            $newName2 = $produk_id->produk_image_src2;
          }else{
        $ext2        = $file2->getClientOriginalExtension();
        $newName2    = 'image_2_'.$dateTime.'.'.$ext2;
        $file2->move(storage_path(env('PATH_IMAGE')), $newName2);
        }

        $file3       = $request->file('produk_image_src3');
        if(!$file1->getClientOriginalExtension()!){
            $newName1 = $produk_id->produk_image_src1;
          }else{
        $ext3        = $file3->getClientOriginalExtension();
        $newName3    = 'image_3_'.$dateTime.'.'.$ext3;
        $file3->move(storage_path(env('PATH_IMAGE')), $newName3);
        }
         
        
         
        

        //$produk                      = new produk;
        //$produk->id              = $request->id;
        //$produk->produk_id             = $request->produk_id;
        $produk->user_id             = $request->user_id;
        $produk->user_name           = $request->user_name;
        $produk->hp                  = $request->hp;
        $produk->alamat              = $request->alamat;
        $produk->produk_name         = $request->produk_name;
        $produk->produk_jenis        = $request->produk_jenis;
        $produk->produk_brand        = $request->produk_brand;
        $produk->produk_model        = $request->produk_model;
        $produk->produk_released_on  = $request->produk_released_on;
        $produk->produk_dimensions   = $request->produk_dimensions;
        $produk->produk_size         = $request->produk_size;
        $produk->produk_desc         = $request->produk_desc;
        $produk->produk_qty          = $request->produk_qty;
        $produk->produk_price        = $request->produk_price;
        if($request->file('produk_image_src1'))
        $produk->produk_image_src1   = $newName1;
        if($request->file('produk_image_src2'))
        $produk->produk_image_src2   = $newName2;
        if($request->file('produk_image_src3'))
        $produk->produk_image_src3   = $newName3;
       */ 
        DB::table('produk')->where('produk_id',$request->produk_id)->update([
        'user_id'=>$request->user_id,
        'produk_name'=>$request->produk_name,
        'produk_lokasi'=>$request->produk_lokasi,
        'produk_jenis'=>$request->produk_jenis,
        'produk_brand'=>$request->produk_brand,
        'produk_model'=>$request->produk_model,
        'produk_released_on'=>$request->produk_released_on,
        'produk_dimensions'=>$request->produk_dimensions,
        'produk_size'=>$request->produk_size,
        'produk_desc'=>$request->produk_desc,
        'produk_qty'=>$request->produk_qty,
        'produk_price'=>$request->produk_price
        //if($request->file('produk_image_src1'))
        //'produk_image_src1'=>$newName1,
        //if($request->file('produk_image_src2'))
        //'produk_image_src2'=>$newName2,
        //if($request->file('produk_image_src3'))
        //'produk_image_src3'=>$newName3
        
    ]);

        return redirect($request->asal)->with('success', 'produk berhasil diupdate');
    
    }

    public function hapus(Request $request , $id)
    {   
         DB::table('produk')->where('produk_id',$id)->delete();
         
        return redirect($request->asal);
    }
    public function hapus_back()
    {   
         
         /*
         if(Auth::user())
            {
                return redirect('');
            }
        else
        */
        return redirect('/user_produk_{{$produk->user_id}}');
    }

}
