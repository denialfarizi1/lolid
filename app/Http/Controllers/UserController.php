<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Likes;
use App\Models\Message;
use App\Models\Message_Anggota;
use App\Models\Message_Chat;
use App\Models\Follower;
use App\Models\Followed;
use App\Models\Produk;
use App\Models\Rating;
use App\Models\Rating_Detail;
use App\Models\Grup;
use App\Models\Grup_Public_User;
use App\Models\Grup_Public_Post;
use App\Models\Grup_Public_Comment;
use App\Models\Grup_Public_Like;
use App\Models\Catatan;

use Image;
use App\user;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {      
           $limit_post = 12;
           $limit_tambah = 12;
           $post_user = Post::with('get_post_user')->orderByDesc('updated_at')->limit($limit_post)->get();
           $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
           
           $data['limit_tambah'] = $limit_tambah;
           $data['post_user'] = $post_user;
           $data['count_cart'] = $count_cart;
          
            return view('home', $data);
    }
    public function homem()
    {      
           $limit_post = 12;
           $limit_tambah = 12;
           $post_user = Post::with('get_post_user')->orderByDesc('updated_at')->limit($limit_post)->get();
           $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
           
           $data['limit_tambah'] = $limit_tambah;
           $data['post_user'] = $post_user;
           $data['count_cart'] = $count_cart;
          
            return view('mhome', $data);
    }
    public function home_limit($limit_post)
    {      
           $limit_tambah = $limit_post;
           $post_user = Post::with('get_post_user')->orderByDesc('updated_at')->limit($limit_post)->get();
           $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
           
           $data['limit_tambah'] = $limit_tambah;
           $data['post_user'] = $post_user;
           $data['count_cart'] = $count_cart;
           
            return view('home', $data);
    }
     public function home_limitm($limit_post)
    {      
           $limit_tambah = $limit_post;
           $post_user = Post::with('get_post_user')->orderByDesc('updated_at')->limit($limit_post)->get();
           $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
           
           $data['limit_tambah'] = $limit_tambah;
           $data['post_user'] = $post_user;
           $data['count_cart'] = $count_cart;
           
            return view('mhome', $data);
    }

     public function beranda()
    {       
            $followed_user = Followed::with('get_followed')->where('user_id',Auth::user()->id)->get();
            $post_user = Post::with('get_post_user','get_comment_post')->orderByDesc('updated_at')->limit(20)->get(); //where(user_id, 
            //$post_user_all = Post::with('get_post_user','get_comment_post')->orderByDesc('updated_at')->get(); //where(user_id, $followed_user->followed_user_id)
           //dd($followed_user);
           // $post_user_followed = $post_user->get_followed->get();
            $likes_user_post_all = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->get();
            $likes_user_post_l = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->limit(15)->get();
            $comment_post_t = DB::table('comment')->get();
            
           $post_detail = Post::with('get_post_user','get_comment_post')->get();
           //$post_user_id = Post::with('get_post_user')->get();
            //$comment_post = Comment::with('get_comment_post')->where('post_id',$request->post_id)->get();
     
           // $like_user->get_like_post->post_id;
            
            //$count_likes = DB::table('t_like')->where('post_id',$p_id)->count();

            $post= DB::table('post')->get();
            $post_comment = Post::with('get_comment_post')->get();
            //dd($post_comment);
            $comment_post = Comment::with('get_comment_user')->get();
            //$count_comment = Comment::with('get_comment_post')->where('post_id',$id)->count();
            //$likes_user = Likes::with('get_like_user')->where('post_id',$id)->get();
         // dd($likes_user);
            //$count_likes = Likes::with('get_like_post')->where('post_id',$id)->count();
            $message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
             $message_user = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
          
            $message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
            $message_chat_user_all_order = Message_Chat::with('get_message_chat_user')->orderByDesc('updated_at')->first();
            //$message_user_id = Message::with('get_message_user1','get_message_user2')->where('message_id',$message_id)->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();

            
            $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            //$count_grup_public_post = Grup_Public_Post::with('get_grup_public_post_user')->where('grup_id',$grupid)->get();
              $grup_public_post = Grup_Public_Post::with('get_grup_public_post_user')->orderByDesc('updated_at')->get();
             //$grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            $post_user_grup = Grup_Public_Post::with('get_grup_post','get_grup_public_post_user')->get();
        $post_detail_grup = Grup_Public_Post::with('get_grup_public_post_user','get_grup_public_post')->get();
        $comment_post_grup = Grup_Public_Comment::with('get_grup_public_comment_user','get_grup_public_comment_post')->get();
         $likes_user_post_all_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->get();
         $likes_user_post_l_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->limit(15)->get();
            
            //dd($grup_list);
            $data['followed_user'] = $followed_user;
            $data['post_user'] = $post_user;
            //$data['post_user_all'] = $post_user_all;
            //$data['post_comment'] = $post_comment;
            //$data['count_comment'] = $count_comment;
            //$data['comment'] = $comment;
            $data['likes_user_post_all'] = $likes_user_post_all;
            $data['likes_user_post_l'] = $likes_user_post_l;
            $data['comment_post_t'] = $comment_post_t;
            //$data['likes_user'] = $likes_user;
            //$data['likes_user_t'] = $likes_user_t;
           // $data['count_likes'] = $count_likes;
            //$data['count_cart'] = $count_cart;
            $data['post'] = $post;
           
            $data['post_comment'] = $post_comment;
            $data['post_detail'] = $post_detail;
            //$data['post_user_id'] = $post_user_id;
            $data['comment_post'] = $comment_post;
            $data['message'] = $message;
            $data['message_user'] = $message_user;
            $data['message_chat_user_all'] = $message_chat_user_all;
            $data['message_chat_user_all_order'] = $message_chat_user_all_order;
            $data['grup_list'] = $grup_list;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            $data['grup_public_post'] = $grup_public_post;
            $data['grup_public_post_all'] = $grup_public_post_all;
            $data['post_user_grup'] = $post_user_grup;
            $data['post_detail_grup'] = $post_detail_grup;
            $data['comment_post_grup'] = $comment_post_grup;
            $data['likes_user_post_all_grup'] = $likes_user_post_all_grup;
            $data['likes_user_post_l_grup'] = $likes_user_post_l_grup;
           
            return view('beranda', $data);
    }
    
     public function pencarian()
    {       
            $post_user = DB::table('users')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $grup_list = Grup_Public_User::with('get_grup')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            $data['post_user'] = $post_user;
            $data['count_cart'] = $count_cart;
            $data['grup_list'] = $grup_list;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            return view('pencarian_user', $data);
    }
     public function pencarian_like(request $request)
    {       
            $post_user = DB::table('users')->where('name','like','%'.$request->name.'%')->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $grup_list = Grup_Public_User::with('get_grup')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            $data['post_user'] = $post_user;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            $data['count_cart'] = $count_cart;
            $data['grup_list'] = $grup_list;
            
            return view('pencarian_user', $data);
    }
    public function like_post(Request $request)
    {   
        $like_post_id= Likes::with('get_like_post')->where('post_id', $request->post_id)->where('user_id', $request->user_id)->first();
       
        $like_post= DB::table('t_like')->get();
        if (empty($like_post_id) )
          {
        $like_post                   = new Likes;
        $like_post->post_id          = $request->post_id;
        $like_post->user_id          = $request->user_id;
        $like_post->save();

        return redirect($request->asal.'#b'.$request->post_id)->with('success', 'like have been saved');
         }else
          {
            return redirect($request->asal.'#b'.$request->post_id);
          } 
    }
    
    public function like_post_id(Request $request)
    {   
        $like_post_id= Likes::with('get_like_post')->where('post_id', $request->post_id)->where('user_id', $request->user_id)->first();
       
        $like_post= DB::table('t_like')->get();
        if (empty($like_post_id) )
          {
        $like_post                   = new Likes;
        $like_post->post_id          = $request->post_id;
        $like_post->user_id          = $request->user_id;
        $like_post->save();

        return redirect('/post_'.$request->post_id)->with('success', 'like have been saved');
         }else
          {
            return redirect('/post_'.$request->post_id);
          } 
    }
    public function like_post_delete(Request $request , $id)
    {
       $like_user = DB::table('t_like')->where('like_id',$id)->where('user_id', Auth::user()->id)->first();
         DB::table('t_like')->where('like_id',$id)->where('user_id', Auth::user()->id)->delete();     
         $like_post_id = $like_user->post_id;
        return redirect($request->asal.'#b'.$request->post_id);
    }
    public function like_post_id_delete($id)    
    {
       $like_user = DB::table('t_like')->where('like_id',$id)->where('user_id', Auth::user()->id)->first();
         DB::table('t_like')->where('like_id',$id)->where('user_id', Auth::user()->id)->delete();     
         $like_post_id = $like_user->post_id;
        return redirect('post_'.$like_post_id);
    }
     public function post_detail($id)
    { 
      if(empty(Auth::user()))
              {
                   $user =  DB::table('users')->where('id', 4)->first();;
              }else
              {
                   $user = Auth::user();
              }

      $post_detail = DB::table('post')->where('post_id',$id)->first();
      $post_user = Post::with('get_post_user')->where('post_id',$id)->first();
      $follower_user = DB::table('follower')->where('follower_user_id', $post_user->get_post_user->id)->get();
      $followed_user = DB::table('followed')->where('user_id', $post_user->get_post_user->id)->get();
      $comment_post = Comment::with('get_comment_post')->where('post_id',$id)->get();
      $count_comment = Comment::with('get_comment_post')->where('post_id',$id)->count();
      $likes_user = Likes::with('get_like_user')->where('post_id',$id)->orderByDesc('updated_at')->get();
      $likes_post_user_limit = Likes::with('get_like_user')->where('post_id',$id)->orderByDesc('updated_at')->limit(15)->get();
      $likes_post_user_id = DB::table('t_like')->where('post_id',$id)->where('user_id', $user->id)->first();
      $count_likes = Likes::with('get_like_post')->where('post_id',$id)->count();
     
      $data['post_detail'] = $post_detail;
      $data['post_user']   = $post_user;
      $data['follower_user']   = $follower_user;
      $data['followed_user']   = $followed_user;
      $data['comment_post']   = $comment_post;
      $data['count_comment']   = $count_comment;
      $data['likes_user']   = $likes_user;
      $data['likes_post_user_limit']   = $likes_post_user_limit;
      $data['likes_post_user_id']   = $likes_post_user_id;
      $data['count_likes']   = $count_likes;
      
      //$data['comment_user']   = $comment_user;

      return view('post_id', $data);
    }
    public function post_detailm($id)
    { 
      if(empty(Auth::user()))
              {
                   $user =  DB::table('users')->where('id', 4)->first();;
              }else
              {
                   $user = Auth::user();
              }
      $post_detail = DB::table('post')->where('post_id',$id)->first();
      $post_user = Post::with('get_post_user')->where('post_id',$id)->first();
      $comment_post = Comment::with('get_comment_post')->where('post_id',$id)->get();
      $count_comment = Comment::with('get_comment_post')->where('post_id',$id)->count();
      $likes_user = Likes::with('get_like_user')->where('post_id',$id)->orderByDesc('updated_at')->get();
      $likes_post_user_limit = Likes::with('get_like_user')->where('post_id',$id)->orderByDesc('updated_at')->limit(15)->get();
      $likes_post_user_id = DB::table('t_like')->where('post_id',$id)->where('user_id', $user->id)->first();
      $count_likes = Likes::with('get_like_post')->where('post_id',$id)->count();
     
      $data['post_detail'] = $post_detail;
      $data['post_user']   = $post_user;
      $data['comment_post']   = $comment_post;
      $data['count_comment']   = $count_comment;
      $data['likes_user']   = $likes_user;
      $data['likes_post_user_limit']   = $likes_post_user_limit;
      $data['likes_post_user_id']   = $likes_post_user_id;
      $data['count_likes']   = $count_likes;
      
      //$data['comment_user']   = $comment_user;

      return view('mpost_id', $data);
    }
     
    public function comment_post(Request $request)
    {   
        $comment_post_id= DB::table('comment')->where('post_id', $request->post_id)->first(); 
        $comment_post= DB::table('comment')->get();
      //  dd($like_post_id->user_id);
       // dd($like_post_id->post_id);
        $comment_post                   = new Comment;
        $comment_post->post_id          = $request->post_id;
        $comment_post->user_id          = $request->user_id;
        $comment_post->comment_desc     = $request->comment_desc;
        $comment_post->save();
       
       /*
       if(($request->post_id == $comment_post_id->post_id) && ($request->user_id == $comment_post_id->user_id)) 
          {
            return redirect('/beranda#'.$like_post_id->post_id);
          } 
       */
        return redirect($request->asal.'#b'.$request->post_id);
          
    }
     public function comment_post_id(Request $request)
    {   
        $comment_post_id= DB::table('comment')->where('post_id', $request->post_id)->first(); 
        $comment_post= DB::table('comment')->get();

      //  dd($like_post_id->user_id);
       // dd($like_post_id->post_id);
        $comment_post                   = new Comment;
        $comment_post->post_id          = $request->post_id;
        $comment_post->user_id          = $request->user_id;
        $comment_post->comment_desc     = $request->comment_desc;
        $comment_post->save();
       
       /*
       if(($request->post_id == $comment_post_id->post_id) && ($request->user_id == $comment_post_id->user_id)) 
          {
            return redirect('/beranda#'.$like_post_id->post_id);
          } 
       */
        return redirect($request->asal);
          
    }
    public function username($username)
    {       
            if(empty(Auth::user()))
              {
                   $user =  DB::table('users')->where('id', 21)->first();;
              }else
              {
                   $user = Auth::user();
              }

            $user_id = DB::table('users')->where('username', $username)->first();
            //$user= DB::table('users')->where('username', $username)->first();
            //$user_produk = Produk::with('get_user')->get();
           // dd($user_produk);
            $count_cart= DB::table('cart')->where('user_id', $user->id)->count();
            $count_post_id= DB::table('post')->where('user_id', $user_id->id)->count();
            //$cart= DB::table('cart')->get();
            $produk_id= DB::table('produk')->where('user_id', $user_id->id)->orderByDesc('updated_at')->get();
            
           // $userid1= DB::table('users')->where('username', $user->username)->first();
            $post_id= DB::table('post')->where('user_id', $user_id->id)->orderByDesc('updated_at')->get();
            $follower_id = DB::table('follower')->where('user_id', $user_id->id)->where('follower_user_id', $user->id)->first();
            $follower_user = DB::table('follower')->where('follower_user_id', $user->id)->get();
            $followed_id = DB::table('followed')->where('user_id', $user->id)->where('followed_user_id', $user_id->id)->first();
            $followed_user = DB::table('followed')->where('user_id', $user->id)->get();
           // dd($followed_id);
            $count_follower= DB::table('follower')->where('user_id', $user_id->id)->count();
            $follower=  Follower::with('get_follower_user')->where('user_id', $user_id->id)->get();
            $count_followed= DB::table('followed')->where('user_id', $user_id->id)->count();
            $followed=Followed::with('get_followed_user')->where('user_id', $user_id->id)->get();

            $rating_user = Rating::with('get_rating_user')->where('user_id',$user_id->id)->get();
            $rating_user_sum = Rating::with('get_rating_user')->where('user_id',$user_id->id)->sum('rating_nilai');
            $rating_user_avg = Rating::with('get_rating_user')->where('user_id',$user_id->id)->avg('rating_nilai');
            $count_rating = Rating::with('get_rating_user')->where('user_id',$user_id->id)->count();
            $grup_list = Grup_Public_User::with('get_grup')->where('user_id',$user->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            //$link_message = $message_user->message_id;
            $catatan = Catatan::with('get_catatan_user')->where('user_id', $user_id->id)->orderByDesc('updated_at')->get();


            $data['count_post_id'] = $count_post_id;
            $data['produk_id'] = $produk_id;
            $data['count_cart'] = $count_cart;
            //$data['cart'] = $cart;
            
            $data['user_id'] = $user_id;
            $data['post_id'] = $post_id;
            $data['follower_id'] = $follower_id;
            $data['follower_user'] = $follower_user;
            $data['followed_id'] = $followed_id;
            $data['followed_user'] = $followed_user;
            $data['count_follower'] = $count_follower;
            $data['follower'] = $follower;
            $data['count_followed'] = $count_followed;
            $data['followed'] = $followed;
            $data['rating_user'] = $rating_user;
            $data['rating_user_sum'] = $rating_user_sum;
            $data['rating_user_avg'] = $rating_user_avg;
            $data['count_rating'] = $count_rating;
            $data['grup_list'] = $grup_list;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            $data['catatan'] = $catatan;
            return view('profil_id', $data);
    }
    public function profil()
    {       
            if(empty(Auth::user()))
              {
                   $user =  DB::table('users')->where('id', 4)->first();;
              }else
              {
                   $user = Auth::user();
              }
            $user_produk = Produk::with('get_user')->get();
           // dd($user_produk);
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $count_post= DB::table('post')->where('user_id', Auth::user()->id)->count();
            $cart= DB::table('cart')->get();
            $produk_user= DB::table('produk')->where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get();
            
            $userid= DB::table('users')->where('username', Auth::user()->username)->first();
            $post= DB::table('post')->where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get();
            $count_follower= DB::table('follower')->where('user_id', Auth::user()->id)->count();
            $count_followed= DB::table('followed')->where('user_id', Auth::user()->id)->count();
            
            $follower_id = DB::table('follower')->where('user_id', Auth::user()->id)->where('follower_user_id', $user->id)->first();
            $follower_user = DB::table('follower')->where('follower_user_id', $user->id)->get();
            $followed_id = DB::table('followed')->where('user_id', $user->id)->where('followed_user_id', Auth::user()->id)->first();
            $followed_user = DB::table('followed')->where('user_id', $user->id)->get();
          
            $follower=  Follower::with('get_follower_user')->where('user_id', Auth::user()->id)->get();
            $followed=Followed::with('get_followed_user')->where('user_id', Auth::user()->id)->get();


            $user_id = DB::table('users')->where('username', Auth::user()->username)->first();
            $rating_user = Rating::with('get_rating_user')->where('user_id',$user_id->id)->get();
            $rating_user_sum = Rating::with('get_rating_user')->where('user_id',$user_id->id)->sum('rating_nilai');
            $rating_user_avg = Rating::with('get_rating_user')->where('user_id',$user_id->id)->avg('rating_nilai');
            $count_rating = Rating::with('get_rating_user')->where('user_id',$user_id->id)->count();
            
            $catatan = Catatan::with('get_catatan_user')->where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get();

            $data['count_post'] = $count_post;
            $data['produk_user'] = $produk_user;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
            $data['userid'] = $userid;
            $data['user_id'] = $user_id;
            $data['post'] = $post;
            $data['count_follower'] = $count_follower;
            $data['count_followed'] = $count_followed;
            $data['follower_id'] = $follower_id;
            $data['follower_user'] = $follower_user;
            $data['followed_id'] = $followed_id;
            $data['followed_user'] = $followed_user;
           
            $data['follower'] = $follower;
            $data['followed'] = $followed;
            $data['rating_user'] = $rating_user;
            $data['rating_user_sum'] = $rating_user_sum;
            $data['rating_user_avg'] = $rating_user_avg;
            $data['count_rating'] = $count_rating;
            $data['catatan'] = $catatan;
            
            return view('profil_user', $data);
    }
     public function profilm()
    {       
            if(empty(Auth::user()))
              {
                   $user =  DB::table('users')->where('id', 4)->first();;
              }else
              {
                   $user = Auth::user();
              }
            $user_produk = Produk::with('get_user')->get();
           // dd($user_produk);
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $count_post= DB::table('post')->where('user_id', Auth::user()->id)->count();
            $cart= DB::table('cart')->get();
            $produk_user= DB::table('produk')->where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get();
            
            $userid= DB::table('users')->where('username', Auth::user()->username)->first();
            $post= DB::table('post')->where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get();
            $count_follower= DB::table('follower')->where('user_id', Auth::user()->id)->count();
            $count_followed= DB::table('followed')->where('user_id', Auth::user()->id)->count();
            
            $follower_id = DB::table('follower')->where('user_id', Auth::user()->id)->where('follower_user_id', $user->id)->first();
            $follower_user = DB::table('follower')->where('follower_user_id', $user->id)->get();
            $followed_id = DB::table('followed')->where('user_id', $user->id)->where('followed_user_id', Auth::user()->id)->first();
            $followed_user = DB::table('followed')->where('user_id', $user->id)->get();
          
            $follower=  Follower::with('get_follower_user')->where('user_id', Auth::user()->id)->get();
            $followed=Followed::with('get_followed_user')->where('user_id', Auth::user()->id)->get();


            $user_id = DB::table('users')->where('username', Auth::user()->username)->first();
            $rating_user = Rating::with('get_rating_user')->where('user_id',$user_id->id)->get();
            $rating_user_sum = Rating::with('get_rating_user')->where('user_id',$user_id->id)->sum('rating_nilai');
            $rating_user_avg = Rating::with('get_rating_user')->where('user_id',$user_id->id)->avg('rating_nilai');
            $count_rating = Rating::with('get_rating_user')->where('user_id',$user_id->id)->count();
            
            $catatan = Catatan::with('get_catatan_user')->where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get();

            $data['count_post'] = $count_post;
            $data['produk_user'] = $produk_user;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
            $data['userid'] = $userid;
            $data['user_id'] = $user_id;
            $data['post'] = $post;
            $data['count_follower'] = $count_follower;
            $data['count_followed'] = $count_followed;
            $data['follower_id'] = $follower_id;
            $data['follower_user'] = $follower_user;
            $data['followed_id'] = $followed_id;
            $data['followed_user'] = $followed_user;
           
            $data['follower'] = $follower;
            $data['followed'] = $followed;
            $data['rating_user'] = $rating_user;
            $data['rating_user_sum'] = $rating_user_sum;
            $data['rating_user_avg'] = $rating_user_avg;
            $data['count_rating'] = $count_rating;
            $data['catatan'] = $catatan;
            
            return view('mprofil_user', $data);
    }
   
    public function edit_profil()
    {       
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $cart= DB::table('cart')->get();
            $produk= DB::table('produk')->get();
            $data['produk'] = $produk;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
            


            return view('edit_profil', $data);
    }


    public function update_profil(Request $request)
    {
      //dd($request);
        if($request->hasFile('image_profil'))
         {
        $file       = $request->file('image_profil');
        $ext        = $file->getClientOriginalExtension();

        $dateTime   = date('Ymd_his');
        $newName    = 'image_user_'.$dateTime.'.'.$ext;
          $file->move(storage_path(env('PATH_IMAGE_USER')), $newName);
           DB::table('users')->where('id',$request->id)->update([
          'image_profil'=>$newName
         
           ]);
          }
          
            if($request->hasFile('image_background'))
          {
        $file_back       = $request->file('image_background');
        $ext_back        = $file_back->getClientOriginalExtension();

        $dateTime   = date('Ymd_his');
        $newName_back    = 'image_background_'.$dateTime.'.'.$ext_back;
        $imageBack = $newName_back; 
         $file_back->move(storage_path(env('PATH_IMAGE_USER')), $newName_back);
          DB::table('users')->where('id',$request->id)->update([
          'image_background'=>$newName_back
                          
           ]);
         }
          DB::table('users')->where('id',$request->id)->update([
          'name'=>$request->name,
          'email'=>$request->email,
          'hp'=>$request->hp,
          'desc'=>$request->desc,
          'alamat'=>$request->alamat,
           ]);
        
        
         return redirect($request->asal)->with('success', 'Image have been saved');
    }
    public function catatan_tambah()
    {       
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $cart= DB::table('cart')->get();
            $produk= DB::table('produk')->get();
            $data['produk'] = $produk;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
  
            return view('profil_tambah_catatan', $data);
    }
    public function catatan_tambahm()
    {       
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $cart= DB::table('cart')->get();
            $produk= DB::table('produk')->get();
            $data['produk'] = $produk;
            $data['count_cart'] = $count_cart;
            $data['cart'] = $cart;
  
            return view('mprofil_tambah_catatan', $data);
    }

    public function catatan_save(Request $request)
    {
        $catatan = DB::table('catatan')->get();

        $catatan                       = new Catatan;
        $catatan->user_id              = $request->user_id;
        $catatan->catatan_judul        = $request->catatan_judul;
        $catatan->catatan_isi          = $request->catatan_isi;
        $catatan->save();
         return redirect($request->asal);
    }
    public function message()
    {
          
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
           
            $message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
             $message_user = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
          
            $message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
            $message_chat_user_all_order = Message_Chat::with('get_message_chat_user')->orderByDesc('updated_at')->first();
          
            //$message_last = Message_Anggota::with('get_message_chat_comment')->where('message_id',15)->where('user_id', 9)->get();
            //dd($message_last);
            //$message_lastest = $message_last->get_message_chat_comment->message_chat_comment;

            //dd($message_lastest);
            $data['message_user'] = $message_user;
            $data['message_chat_user_all'] = $message_chat_user_all;
            $data['message_chat_user_all_order'] = $message_chat_user_all_order;
            $data['count_cart'] = $count_cart;
            $data['message'] = $message;
            //$data['message_last'] = $message_last;
            return view('message_user', $data);
    }
    public function messagem()
    {
          
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
           
            $message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
             $message_user = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
          
            $message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
           
            //$message_last = Message_Anggota::with('get_message_chat_comment')->where('message_id',15)->where('user_id', 9)->get();
            //dd($message_last);
            //$message_lastest = $message_last->get_message_chat_comment->message_chat_comment;

            //dd($message_lastest);
            $data['message_user'] = $message_user;
            $data['message_chat_user_all'] = $message_chat_user_all;
            $data['count_cart'] = $count_cart;
            $data['message'] = $message;
            //$data['message_last'] = $message_last;
            return view('mmessage_user', $data);
    }
    public function message_save(Request $request)
    {
        //$message_inbox_id= DB::table('message_inbox')->where('message_id', $request->message_id)->first(); 
       // $message= DB::table('message')->get();
        //$message_user= DB::table('message_inbox')->where('user_id', Auth::user()->id)->first();
        //$inbox_id = DB::table('message')->where('inbox_id',$request->inbox_id)->where('user_id',Auth::user()->id)->first(); // 9,9

        $message_user_id = DB::table('message')->where('message_kode', $request->user_id1.'_'.$request->user_id2)->orWhere('message_kode', $request->user_id2.'_'.$request->user_id1)->first();

        $message = DB::table('message')->get();
        $message_ruang1 = DB::table('message')->where('message_kode', $request->user_id1.'_'.$request->user_id2)->first();
        //1. ada 4_9 r -> 4_9
        //2. ada 4_9 r-> 9_4
        //3. ada 4_9 r-> 9_13
         $message_ruang2 = DB::table('message')->where('message_kode', $request->user_id2.'_'.$request->user_id1)->first();
        //1.ada 4_9 r-> 9_4
         //2.ada 4_9 r-> 4_9
         //3.ada 4_9 4->13_9
 
        if(empty($message_ruang1) && (empty($message_ruang2))) // 1.ada  && kosong 2.kosong && ada 3.kosong &&  kosong   
        {
           $message                   = new Message;
        $message->message_kode      = $request->user_id1.'_'.$request->user_id2;
        $message->message_user1      = $request->user_id1;
        $message->message_user2      = $request->user_id2;
        $message->save();
        
        $message_anggota = DB::table('message_anggota')->get();
        
        $message_user = DB::table('message')->where('message_kode', $request->user_id1.'_'.$request->user_id2)->first();
        $message_anggota                   = new Message_Anggota;
        $message_anggota->message_id       = $message_user->message_id;
        $message_anggota->user_id          = $request->user_id1;
        $message_anggota->save();
        $message_anggota                   = new Message_Anggota;
        $message_anggota->message_id       = $message_user->message_id;
        $message_anggota->user_id          = $request->user_id2;
        $message_anggota->save();
         return redirect($request->asal.$message_user_id->message_id);

        }
        /*
        if( ($message_ruang1->message_kode == $request->user_id1.'_'.$request->user_id2) || ($message_ruang2->message_kode == $request->user_id2.'_'.$request->user_id1)) //1. ada 4_9 r-> 
          //(4_9 = 4_9 || 4_9 = 9_4)
          //0 = 9_4|| 4_9 = 4_9
        {
          return redirect('message');
        }else
        {
        
       
       /*
       if(($request->post_id == $comment_post_id->post_id) && ($request->user_id == $comment_post_id->user_id)) 
          {
            return redirect('/beranda#'.$like_post_id->post_id);
          } 
       
        }
        */
       
        //dd($message_user_id);
         return redirect($request->asal.$message_user_id->message_id);
       

     }
    public function message_chat($message_id)
    {
            //$user_produk = Produk::with('get_user')->get();
           // dd($user_produk);
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            //$count_post= DB::table('post')->where('user_id', Auth::user()->id)->count();
            //$cart= DB::table('cart')->get();
            //$produk_user= DB::table('produk')->where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get();
           
            //$userid= DB::table('users')->where('username', Auth::user()->username)->first();
             $message_chat_user = Message_Chat::with('get_message_chat_user')->where('message_id', $message_id )->get();
          //   $message_chat_user_id = Message_Chat::with('get_message_chat')->where('message_id', $message_id )->first();
            $message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
           $message_user_id = Message::with('get_message_user1','get_message_user2')->where('message_id',$message_id)->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
            $message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
            $message_chat_user_all_order = Message_Chat::with('get_message_chat_user')->orderByDesc('updated_at')->first();
            //$message_chat_latest = Message::with('get_message_chat_id')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->latest()->first();
            
            //$message_chat_latest = DB::table('Message_Chat')->where('message_id', $message_id)->latest('message_chat_id')->first();

          // dd($message_chat_latest);
           // $message_i= Message::with('get_message_user')->where( 'inbox_id', Auth::user()->id)->orderByDesc('updated_at')->get();
           // $message_id= Message::with('get_message_user')->where('message_id',$id)->first();
           // $message_i_id= Message::with('get_message_user')->where('message_id',$id)->first();
           // $message_i_id= Message::with('get_message_user_i')->where('message_id',$id)->first();
           // $inbox= Inbox::with('get_message_inbox_user')->where('message_id',$id)->get();
            //$message_chat_user_kiri= Message_Chat::with('get_message_chat_user')->where('message_id',$Message_id)->where('inbox_id', Auth::user()->id)->first();
          // dd($message_chat_user);
            
            //$data['id'] = $id;
            //$data['count_cart'] = $count_cart;
            
            
            $data['count_cart'] = $count_cart;
            $data['message'] = $message;
            $data['message_id'] = $message_id;
            $data['message_chat_user'] = $message_chat_user;
            //$data['message_chat_user_id'] = $message_chat_user_id;
            $data['message_user_id'] = $message_user_id;
            $data['message_id'] = $message_id;
            $data['message_chat_user_all'] = $message_chat_user_all;
            $data['message_chat_user_all_order'] = $message_chat_user_all_order;
            //$data['message_chat_latest'] = $message_chat_latest;
            //$data['message_i_id'] = $message_i_id;
            //$data['message_i_id'] = $message_i_id;
            //$data['inbox'] = $inbox;
            //$data['inbox_user_kanan'] = $inbox_user_kanan;
            //$data['inbox_user_kiri'] = $inbox_user_kiri;
            //dd($data);
            return view('message_chat', $data);
    }
     public function message_chatm($message_id)
    {
            //$user_produk = Produk::with('get_user')->get();
           // dd($user_produk);
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            //$count_post= DB::table('post')->where('user_id', Auth::user()->id)->count();
            //$cart= DB::table('cart')->get();
            //$produk_user= DB::table('produk')->where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get();
           
            //$userid= DB::table('users')->where('username', Auth::user()->username)->first();
             $message_chat_user = Message_Chat::with('get_message_chat_user')->where('message_id', $message_id )->get();
          //   $message_chat_user_id = Message_Chat::with('get_message_chat')->where('message_id', $message_id )->first();
            $message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
           $message_user_id = Message::with('get_message_user1','get_message_user2')->where('message_id',$message_id)->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
            $message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
            $message_chat_user_all_order = Message_Chat::with('get_message_chat_user')->orderByDesc('updated_at')->first();
            //$message_chat_latest = Message::with('get_message_chat_id')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->latest()->first();
            
            //$message_chat_latest = DB::table('Message_Chat')->where('message_id', $message_id)->latest('message_chat_id')->first();

          // dd($message_chat_latest);
           // $message_i= Message::with('get_message_user')->where( 'inbox_id', Auth::user()->id)->orderByDesc('updated_at')->get();
           // $message_id= Message::with('get_message_user')->where('message_id',$id)->first();
           // $message_i_id= Message::with('get_message_user')->where('message_id',$id)->first();
           // $message_i_id= Message::with('get_message_user_i')->where('message_id',$id)->first();
           // $inbox= Inbox::with('get_message_inbox_user')->where('message_id',$id)->get();
            //$message_chat_user_kiri= Message_Chat::with('get_message_chat_user')->where('message_id',$Message_id)->where('inbox_id', Auth::user()->id)->first();
          // dd($message_chat_user);
            
            //$data['id'] = $id;
            //$data['count_cart'] = $count_cart;
            
            
            $data['count_cart'] = $count_cart;
            $data['message'] = $message;
            $data['message_id'] = $message_id;
            $data['message_chat_user'] = $message_chat_user;
            //$data['message_chat_user_id'] = $message_chat_user_id;
            $data['message_user_id'] = $message_user_id;
            $data['message_id'] = $message_id;
            $data['message_chat_user_all'] = $message_chat_user_all;
            $data['message_chat_user_all_order'] = $message_chat_user_all_order;
            //$data['message_chat_latest'] = $message_chat_latest;
            //$data['message_i_id'] = $message_i_id;
            //$data['message_i_id'] = $message_i_id;
            //$data['inbox'] = $inbox;
            //$data['inbox_user_kanan'] = $inbox_user_kanan;
            //$data['inbox_user_kiri'] = $inbox_user_kiri;
            //dd($data);
            return view('mmessage_chat', $data);
    }
    
    public function message_chat_save(Request $request)
    {
        //$message_inbox_id= DB::table('message_inbox')->where('message_id', $request->message_id)->first(); 
        $message_chat = DB::table('message_chat')->get();

      //  dd($like_post_id->user_id);
       // dd($like_post_id->post_id);
        $message_chat                        = new Message_Chat;
        $message_chat->message_id            = $request->message_id;
        $message_chat->user_id               = $request->user_id;
        $message_chat->message_chat_comment  = $request->message_chat_comment;
        $message_chat->save();
       
       /*
       if(($request->post_id == $comment_post_id->post_id) && ($request->user_id == $comment_post_id->user_id)) 
          {
            return redirect('/beranda#'.$like_post_id->post_id);
          } 
       */
        return redirect($request->asal);
     }

public function follow_save(Request $request)
    {
        

        $follower = DB::table('follower')->get();
        
         $follower_id= follower::with('get_follower_user')->where('user_id', $request->user_id)->where('follower_user_id', $request->follow_user_id)->first();
        //dd($follower_id);
        
        if (empty($follower_id) )
          {
        $follower                        = new follower;
        $follower->user_id               = $request->user_id;
        $follower->follower_user_id      = $request->follow_user_id;
        $follower->save();

        $followed = DB::table('followed')->get();

        $followed                        = new followed;
        $followed->followed_user_id      = $request->user_id;
        $followed->user_id               = $request->follow_user_id;
        $followed->save();
         }
      
        return redirect($request->asal);
     }
  public function follow_delete(Request $request)
    {
        //$follower_user = DB::table('follower')->where('follower_id',$id)->first();
         DB::table('follower')->where('follower_id',$request->follower_id)->delete();
         DB::table('followed')->where('followed_id',$request->followed_id)->delete();     
         //$comment_username = $comment_user->username;
         //$comment_post_id = $comment_user->post_id;
        return redirect($request->asal);
    }
       public function rating(Request $request)
    {   
        //$rating_id= DB::table('comment')->where('post_id', $request->post_id)->first(); 
        $rating= DB::table('rating')->get();

      //  dd($like_post_id->user_id);
       // dd($like_post_id->post_id);
         $rating_id= Rating::with('get_rating_user')->where('user_id', $request->user_id)->where('rating_pengirim_id', $request->rating_pengirim_id)->first();
       
        
        if (empty($rating_id) )
          {
        $rating                       = new Rating;
        $rating->user_id              = $request->user_id;
        $rating->rating_pengirim_id   = $request->rating_pengirim_id;
        $rating->rating_nilai         = $request->rating_nilai;
        $rating->save();
         
         $rating_detail =  DB::table('rating_detail')->get();
         $rating_detail_id = DB::table('rating_detail')->where('user_id', $request->user_id)->first();
         
          $rating_average = $rating->where('user_id',$request->user_id)->avg('rating_nilai');
          $rating_popularitas = $rating->where('user_id',$request->user_id)->sum('rating_nilai');

         if(empty($rating_detail_id))
           {  

              $rating_detail                              = new Rating_Detail;
              $rating_detail->user_id                     = $request->user_id;
              $rating_detail->rating_average              = $rating_average;
              $rating_detail->rating_popularitas          = $rating_popularitas;
              $rating_detail->save();
           }
           if(!empty($rating_detail_id)){

         DB::table('rating_detail')->where('user_id',$request->user_id)->update([
          'rating_average' => $rating_average,
          'rating_popularitas' => $rating_popularitas
           ]);
           };
          }else {
             return redirect($request->asal);
          }
       /*
       if(($request->post_id == $comment_post_id->post_id) && ($request->user_id == $comment_post_id->user_id)) 
          {
            return redirect('/beranda#'.$like_post_id->post_id);
          } 
       */
        return redirect($request->asal);
          
    }
    public function post_update(Request $request)
    {
      
          DB::table('post')->where('post_id',$request->post_id)->update([
          'status'=>$request->status
           ]);
        
        
         return redirect($request->asal)->with('success', 'post telah diupdate');
    }
     public function post_delete(Request $request)
    {
        
         DB::table('post')->where('post_id',$request->post_id)->delete();     
        return redirect($request->asal);
    }
    public function index()
    {
        //
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
     public function view_image_post($fileImage){
        $filepath = storage_path(env('PATH_IMAGE_POST').$fileImage);
        return Image::make($filepath)->response();
    }
     public function view_image_user($fileImage){
        $filepath = storage_path(env('PATH_IMAGE_USER').$fileImage);
        return Image::make($filepath)->response();
    }
    public function store(Request $request)
    {
      //  dd($POST); 
        if($request->hasFile('image_post'))
        {  
        $file       = $request->file('image_post');
        $ext        = $file->getClientOriginalExtension();

        $dateTime   = date('Ymd_his');
        $newName    = 'image_post_'.$dateTime.'.'.$ext;

        $file->move(storage_path(env('PATH_IMAGE_POST')), $newName);
        
        $post                      = new post;
        //$produk->id              = $request->id;
        $post->user_id             = $request->user_id;
        //$post->email               = $request->email;
        //$post->username            = $request->username;
        //$post->name                = $request->name;
        $post->status              = $request->status;
        $post->lokasi              = $request->lokasi;
        $post->image_post          = $newName;
        $post->save();
        }else{
           return redirect($request->asal)->with('warning', 'Anda belum memasukan foto');  
        }
        //dd($user_id);
        $followed_user_id = DB::table('followed')->where('user_id', Auth::user()->id)->where('followed_user_id', Auth::user()->id)->first();
        if(empty($followed_user_id))
        {
        $followed = DB::table('followed')->get();

        $followed                        = new followed;
        $followed->user_id               = Auth::user()->id;
        $followed->followed_user_id      = Auth::user()->id;
        $followed->save();
        }
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
    public function update(Request $request)
    {
       
       /*
        $file       = $request->file('image_profil');
        $ext        = $file->getClientOriginalExtension();

        $dateTime   = date('Ymd_his');
        $newName    = 'image_profil_'.$dateTime.'.'.$ext;

        $file->move(storage_path(env('PATH_IMAGE')), $newName);
       

        DB::table('users')->where('id',$request->id)->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'hp'=>$request->hp,
        'alamat'=>$request->alamat,
        //if($request->file('produk_image_src1'))
        'image_profil'=>$newName
        
        
    ]);

        return redirect('/profil_user')->with('success', 'Image have been saved');
     
        /*
        $user_profil = DB::table('users')->where('id', $id)->get();
        $file       = $request->file('image_profil');
        $ext        = $file->getClientOriginalExtension();

        $dateTime   = date('Ymd_his');
        $newName   = 'image_profil_'.$dateTime.'.'.$ext;
        

        $file->move(storage_path(env('PATH_IMAGE_PROFIL')), $newName);
        
       // $user_profil                = new user_profil;
        $user_profil->name          = $request->name;
        $user_profil->email         = $request->email;
        $user_profil->hp            = $request->hp;
        $user_profil->alamat        = $request->alamat;
        $user_profil->image_profil  = $newName;
        $user_profil->update();
    return redirect('/edit_profil');
     */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment_id_delete(Request $request , $id)
    {
        $comment_user = DB::table('comment')->where('comment_id',$id)->first();
         DB::table('comment')->where('comment_id',$id)->delete();     
         //$comment_username = $comment_user->username;
         $comment_post_id = $comment_user->post_id;
        return redirect($request->asal);
    }
}
