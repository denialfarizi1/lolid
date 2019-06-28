<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Likes;
use App\Models\Message;
use App\Models\Inbox;
use App\Models\Produk;
use App\Models\Rating;
use App\Models\Follower;
use App\Models\Followed;
use App\Models\Grup;
use App\Models\Grup_Public_Admin;
use App\Models\Grup_Public_User;
use App\Models\Grup_Public_Post;
use App\Models\Grup_Public_Comment;
use App\Models\Grup_Public_Like;

use Image;
use App\user;
use Auth;

class GrupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function grup_public($grupid)
    {
        $grup_id = DB::table('grup')->where('grup_id', $grupid)->first();
        $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
        //dd($grup_list);
        $grup_public_user = Grup_Public_User::with('get_grup_public_anggota')->where('grup_id',$grupid)->get();
        $grup_public_admin = Grup_Public_Admin::with('get_grup_public_admin')->where('grup_id',$grupid)->get();
        //dd($grup_public_admin);
        $grup_public_post = Grup_Public_Post::with('get_grup_public_post_user')->where('grup_id',$grupid)->orderByDesc('updated_at')->get();
        $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
        $follower_user = DB::table('follower')->where('follower_user_id', Auth::user()->id)->get();
        $followed_user = DB::table('followed')->where('user_id', Auth::user()->id)->get();
        $follower =  Follower::with('get_follower_user')->where('user_id', Auth::user()->id)->get();
        $followed = Followed::with('get_followed_user')->where('user_id', Auth::user()->id)->get();
        $post_user = Grup_Public_Post::with('get_grup_public_post_user')->where('grup_id',$grupid)->get();
        $post_detail = Grup_Public_Post::with('get_grup_public_post_user','get_grup_public_post')->where('grup_id',$grupid)->get();
        $comment_post = Grup_Public_Comment::with('get_grup_public_comment_user','get_grup_public_comment_post')->where('grup_id',$grupid)->get();
         $likes_user_post_all = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->where('grup_id', $grupid)->get();
         $likes_user_post_l = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->limit(15)->get();
        $grup_public_anggota = Grup_Public_User::with('get_grup_public_user')->where('grup_id',$grupid)->where('user_id', Auth::user()->id)->orderByDesc('updated_at')->first(); 
       // dd($comment_post);
        $data['grup_id'] = $grup_id;
        $data['grup_list'] = $grup_list;
        $data['grup_public_user'] = $grup_public_user;
        $data['grup_public_admin'] = $grup_public_admin;
        $data['grup_public_post'] = $grup_public_post;
        $data['grup_public_post_all'] = $grup_public_post_all;
        $data['follower_user'] = $follower_user;
        $data['followed_user'] = $followed_user;
        $data['follower'] = $follower;
        $data['followed'] = $followed;
        $data['post_user'] = $post_user;
        $data['post_detail'] = $post_detail;
        $data['comment_post'] = $comment_post;
        $data['likes_user_post_all'] = $likes_user_post_all;
        $data['likes_user_post_l'] = $likes_user_post_l;
        $data['grup_public_anggota'] =  $grup_public_anggota;
      return view('grup_public', $data);
    

    }
    public function grup_publicm($grupid)
    {
        $grup_id = DB::table('grup')->where('grup_id', $grupid)->first();
        $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
        //dd($grup_list);
        $grup_public_user = Grup_Public_User::with('get_grup_public_anggota')->where('grup_id',$grupid)->get();
        $grup_public_admin = Grup_Public_Admin::with('get_grup_public_admin')->where('grup_id',$grupid)->get();
        //dd($grup_public_admin);
        $grup_public_post = Grup_Public_Post::with('get_grup_public_post_user')->where('grup_id',$grupid)->orderByDesc('updated_at')->get();
        $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
        $follower_user = DB::table('follower')->where('follower_user_id', Auth::user()->id)->get();
        $followed_user = DB::table('followed')->where('user_id', Auth::user()->id)->get();
        $follower =  Follower::with('get_follower_user')->where('user_id', Auth::user()->id)->get();
        $followed = Followed::with('get_followed_user')->where('user_id', Auth::user()->id)->get();
        $post_user = Grup_Public_Post::with('get_grup_public_post_user')->where('grup_id',$grupid)->get();
        $post_detail = Grup_Public_Post::with('get_grup_public_post_user','get_grup_public_post')->where('grup_id',$grupid)->get();
        $comment_post = Grup_Public_Comment::with('get_grup_public_comment_user','get_grup_public_comment_post')->where('grup_id',$grupid)->get();
         $likes_user_post_all = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->where('grup_id', $grupid)->get();
         $likes_user_post_l = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->limit(15)->get();
        $grup_public_anggota = Grup_Public_User::with('get_grup_public_user')->where('grup_id',$grupid)->where('user_id', Auth::user()->id)->orderByDesc('updated_at')->first(); 
       // dd($comment_post);
        $data['grup_id'] = $grup_id;
        $data['grup_list'] = $grup_list;
        $data['grup_public_user'] = $grup_public_user;
        $data['grup_public_admin'] = $grup_public_admin;
        $data['grup_public_post'] = $grup_public_post;
        $data['grup_public_post_all'] = $grup_public_post_all;
        $data['follower_user'] = $follower_user;
        $data['followed_user'] = $followed_user;
        $data['follower'] = $follower;
        $data['followed'] = $followed;
        $data['post_user'] = $post_user;
        $data['post_detail'] = $post_detail;
        $data['comment_post'] = $comment_post;
        $data['likes_user_post_all'] = $likes_user_post_all;
        $data['likes_user_post_l'] = $likes_user_post_l;
        $data['grup_public_anggota'] =  $grup_public_anggota;
      return view('mgrup_public', $data);
    

    }
    
     public function grup_buat()
    {    
        $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
        $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            
            
           // $data['likes_user'] = $likes_user;
            //$data['count_cart'] = $count_cart;
            $data['grup_public_post_all'] = $grup_public_post_all;
            $data['grup_list'] = $grup_list;
            return view('grup_tambah', $data);
    }
     public function grup_buatm()
    {    
        $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
        $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            
            
           // $data['likes_user'] = $likes_user;
            //$data['count_cart'] = $count_cart;
            $data['grup_public_post_all'] = $grup_public_post_all;
            $data['grup_list'] = $grup_list;
            return view('mgrup_tambah', $data);
    }
    public function grup_buat_save(Request $request)
    {   
        
       
        $grup= DB::table('grup')->get();
        
        $grup                   = new Grup;
        $grup->grup_jenis          = $request->grup_jenis;
        $grup->grup_name          = $request->grup_name;
       
        $grup->save();
        $grup_id = DB::table('grup')->where('grup_name',$request->grup_name)->first();

        $grup_public_admin = DB::table('grup_public_admin')->get();
        $grup_public_admin                   = new Grup_Public_Admin;
        $grup_public_admin->grup_id          = $grup_id->grup_id;
        $grup_public_admin->user_id          = $request->user_id;
       
        $grup_public_admin->save();
        
        $grup_anggota= DB::table('grup_public_user')->get();
        $grup_anggota                    = new Grup_Public_User;
        $grup_anggota->grup_id           = $grup_id->grup_id;
        $grup_anggota->grup_name         = $request->grup_name;
        $grup_anggota->user_id           = $request->user_id;
       
        $grup_anggota->save();


        return redirect('/group_'.$grup_id->grup_id)->with('success', 'grup telah dibuat');
         
    }
     public function grup_anggota_save(Request $request)
    {   
        
        
        $anggota_id = DB::table('users')->where('username',$request->username)->first();
        //  dd($anggota_id);
        if(empty($anggota_id))
           {
             return redirect('/group_'.$request->grup_id)->with('warning', 'username yang anda masukan tidak ada');
           }
      
        $grup_anggota= DB::table('grup_public_user')->get();
        $grup_anggota_id= DB::table('grup_public_user')->where('grup_id',$request->grup_id)->where('user_id',$anggota_id->id)->first();
         //dd($grup_anggota_id);
        if(!empty($grup_anggota_id))
           {
             return redirect('/group_'.$request->grup_id)->with('warning', 'user yang anda masukan sudah ada di grup');
           }else{
        $grup_anggota                   = new Grup_Public_User;
        $grup_anggota->grup_id           = $request->grup_id;
        $grup_anggota->grup_name         = $request->grup_name;
        $grup_anggota->user_id           = $anggota_id->id;
       
        $grup_anggota->save();


        return redirect('/group_'.$request->grup_id)->with('success', 'anggota sudah ditambahkan');
         }
    }
     public function grup_anggota_delete(Request $request)
    {   
        DB::table('grup_public_user')->where('grup_id',$request->grup_id)->where('user_id',$request->user_id)->delete();
        if(!empty($request->admin))
        {
            return redirect('/group_'.$request->grup_id);
        }else{
        return redirect('/beranda');
         }
    }
    public function post_grup_public_user_save(Request $request)
    {   
        //$grup = DB::table('grup')->where('grup_id',$request->grup_id)->first();
       
        $grup_public_post= DB::table('grup_public_post')->get();
        
        $grup_public_post                   = new Grup_Public_Post;
        $grup_public_post->grup_id          = $request->grup_id;
        $grup_public_post->user_id          = $request->user_id;
        $grup_public_post->status          = $request->status;
        $grup_public_post->save();

        return redirect('/group_'.$request->grup_id)->with('success', 'like have been saved');
        
    }
     public function grup_public_comment_post_save(Request $request)
    {   
        //$comment_post_id= DB::table('grup_public_comment')->where('grup_public_post_id', $request->post_id)->first(); 
        $comment_post= DB::table('grup_public_comment')->get();
      //  dd($like_post_id->user_id);
       // dd($like_post_id->post_id);
        $comment_post                      = new Grup_Public_Comment;
        $comment_post->grup_id             = $request->grup_id;
        $comment_post->grup_public_post_id = $request->grup_public_post_id;
        $comment_post->user_id             = $request->user_id;
        $comment_post->comment             = $request->comment;
        $comment_post->save();
       
       /*
       if(($request->post_id == $comment_post_id->post_id) && ($request->user_id == $comment_post_id->user_id)) 
          {
            return redirect('/beranda#'.$like_post_id->post_id);
          } 
       */
        return redirect('/group_'.$request->grup_id);
          
    }
    public function grup_public_like_post(Request $request)
    {   
        $like_post_id= Grup_Public_Like::with('get_grup_public_like_post')->where('grup_public_post_id', $request->grup_public_post_id)->where('user_id', $request->user_id)->first();
       
        $like_post= DB::table('grup_public_like')->get();
        if (empty($like_post_id) )
          {
        $like_post                        = new Grup_Public_Like;
        $like_post->grup_id               = $request->grup_id;
        $like_post->grup_public_post_id   = $request->grup_public_post_id;
        $like_post->user_id               = $request->user_id;
        $like_post->save();

        return redirect('/group_'.$request->grup_id.'#'.$request->grup_public_post_id)->with('success', 'like have been saved');
         }else
          {
            return redirect('/group_'.$request->grup_id.'#'.$request->grup_public_post_id)->with('warning', 'user sudah like');;
          } 
    }
    public function grup_public_like_delete($id)    
    {
       $like_user = DB::table('grup_public_like')->where('grup_public_like_id',$id)->where('user_id', Auth::user()->id)->first();
         DB::table('grup_public_like')->where('grup_public_like_id',$id)->where('user_id', Auth::user()->id)->delete();     
         $like_post_id = $like_user->grup_id;
        return redirect('group_'.$like_post_id);
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
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
