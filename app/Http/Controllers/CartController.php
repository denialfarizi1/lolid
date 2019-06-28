<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    
    public function index()
    {
            $count = DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $cart = DB::table('cart')->get();
            $produk = DB::table('produk')->get();
            return view('produk',['produk' => $produk],['cart' => $cart], ['count' => $count]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cart_detail()
    {     
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
            $cart= DB::table('cart')->where('user_id', Auth::user()->id)->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
           
            
            
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
    
           
     
        return view('produk_cart', $data);
    }
    public function cart_detailm()
    {     
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
            $cart= DB::table('cart')->where('user_id', Auth::user()->id)->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
           
            
            
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
    
           
     
        return view('mproduk_cart', $data);
    }
    public function store(Request $request)
    {   
        
        $cart = DB::table('cart')->get();
        DB::table('cart')->insert([
            'user_id' => $request->user_id,
            'produk_id' => $request->produk_id,
            'produk_name' => $request->produk_name,
            'produk_cart_qty' => $request->produk_cart_qty,
            'produk_price' => $request->produk_price,
            'produk_image_src1' => $request->produk_image_src1

        ]);

        return redirect($request->asal)->with('success', 'Image have been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        ///produk index
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
            $cart= DB::table('cart')->where('user_id', Auth::user()->id)->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $jml_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            
            
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
           
       
        
    return view('edit_produk_cart',$data);
    }
    public function editm()
    {
        ///produk index
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
            $cart = DB::table('cart')->where('user_id', Auth::user()->id)->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $jml_elektronik= DB::table('produk')->where('produk_jenis', 'Elektronik')->count();
            
            
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
           
       
        
    return view('medit_produk_cart',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('cart')->where('cart_id',$request->cart_id)->update([
        'produk_cart_qty'=>$request->produk_cart_qty
        
    ]);
    return redirect($request->asal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus(Request $request , $id)
    {
         DB::table('cart')->where('cart_id',$id)->delete();
     return redirect($request->asal);
    }
}
        