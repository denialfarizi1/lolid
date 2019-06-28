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


class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function beranda()
    {       
            if(empty(Auth::user()))
            {
                return redirect('login');
            }
            $followed_user = Followed::with('get_followed')->where('user_id',Auth::user()->id)->get();
            $limit_post = 20;
            $limit_tambah = 20;
            $post_user = Post::with('get_post_user','get_comment_post')->orderByDesc('updated_at')->limit($limit_post)->get();
            $likes_user_post_all = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->get(); 
            $likes_user_post_l = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->limit(3)->get();

            $comment_post_t = DB::table('comment')->get();
            
            $post_detail = Post::with('get_post_user','get_comment_post')->get();
            $post= DB::table('post')->get();
            $post_comment = Post::with('get_comment_post')->get();
          
            $comment_post = Comment::with('get_comment_user')->get();
            $message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
            $message_user = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
          
            $message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
            $message_chat_user_all_order = Message_Chat::with('get_message_chat_user')->orderByDesc('updated_at')->first();
          
            
            $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            $grup_public_post = Grup_Public_Post::with('get_grup_public_post_user')->orderByDesc('updated_at')->get();
            $post_user_grup = Grup_Public_Post::with('get_grup_post','get_grup_public_post_user')->get();
            $post_detail_grup = Grup_Public_Post::with('get_grup_public_post_user','get_grup_public_post')->get();
            $comment_post_grup = Grup_Public_Comment::with('get_grup_public_comment_user','get_grup_public_comment_post')->get();
            $likes_user_post_all_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->get();
            $likes_user_post_l_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->limit(15)->get();
            $rating_detail =  Rating_Detail::with('get_rating_detail_user')->orderByDesc('rating_popularitas')->limit(10)->get();
            $rating_detail_id =  Rating_Detail::with('get_rating_detail_user')->where('user_id', Auth::user()->id)->first();
         
            $data['followed_user'] = $followed_user;
            $data['limit_tambah'] = $limit_tambah;
            $data['post_user'] = $post_user;
            $data['likes_user_post_all'] = $likes_user_post_all;
            $data['likes_user_post_l'] = $likes_user_post_l;
            $data['comment_post_t'] = $comment_post_t;
            $data['post'] = $post;
           
            $data['post_comment'] = $post_comment;
            $data['post_detail'] = $post_detail;
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
            $data['rating_detail'] = $rating_detail;
            $data['rating_detail_id'] = $rating_detail_id;
           
            return view('beranda', $data);
    }
       public function berandam()
    {       
            if(empty(Auth::user()))
            {
                return redirect('login');
            }
            $followed_user = Followed::with('get_followed')->where('user_id',Auth::user()->id)->get();
            $limit_post = 20;
            $limit_tambah = 20;
            $post_user = Post::with('get_post_user','get_comment_post')->orderByDesc('updated_at')->limit($limit_post)->get();
            $likes_user_post_all = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->get(); 
            $likes_user_post_l = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->limit(3)->get();

            $comment_post_t = DB::table('comment')->get();
            
            $post_detail = Post::with('get_post_user','get_comment_post')->get();
            $post= DB::table('post')->get();
            $post_comment = Post::with('get_comment_post')->get();
          
            $comment_post = Comment::with('get_comment_user')->get();
            $message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
            $message_user = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
          
            $message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
            $message_chat_user_all_order = Message_Chat::with('get_message_chat_user')->orderByDesc('updated_at')->first();
          
            
            $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            $grup_public_post = Grup_Public_Post::with('get_grup_public_post_user')->orderByDesc('updated_at')->get();
            $post_user_grup = Grup_Public_Post::with('get_grup_post','get_grup_public_post_user')->get();
            $post_detail_grup = Grup_Public_Post::with('get_grup_public_post_user','get_grup_public_post')->get();
            $comment_post_grup = Grup_Public_Comment::with('get_grup_public_comment_user','get_grup_public_comment_post')->get();
            $likes_user_post_all_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->get();
            $likes_user_post_l_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->limit(15)->get();
            $rating_detail =  Rating_Detail::with('get_rating_detail_user')->orderByDesc('rating_popularitas')->limit(10)->get();
            $rating_detail_id =  Rating_Detail::with('get_rating_detail_user')->where('user_id', Auth::user()->id)->first();
         
            $data['followed_user'] = $followed_user;
            $data['limit_tambah'] = $limit_tambah;
            $data['post_user'] = $post_user;
            $data['likes_user_post_all'] = $likes_user_post_all;
            $data['likes_user_post_l'] = $likes_user_post_l;
            $data['comment_post_t'] = $comment_post_t;
            $data['post'] = $post;
           
            $data['post_comment'] = $post_comment;
            $data['post_detail'] = $post_detail;
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
            $data['rating_detail'] = $rating_detail;
            $data['rating_detail_id'] = $rating_detail_id;
           
            return view('mberanda', $data);
    }
     public function beranda_limit($limit_post)
    {       
             if(empty(Auth::user()))
            {
                return redirect('login');
            }
            $followed_user = Followed::with('get_followed')->where('user_id',Auth::user()->id)->get();
            $limit_tambah = $limit_post;
            $post_user = Post::with('get_post_user','get_comment_post')->orderByDesc('updated_at')->limit($limit_post)->get();
            $likes_user_post_all = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->get(); 
            $likes_user_post_l = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->limit(3)->get();

            $comment_post_t = DB::table('comment')->get();
            
            $post_detail = Post::with('get_post_user','get_comment_post')->get();
            $post= DB::table('post')->get();
            $post_comment = Post::with('get_comment_post')->get();
          
            $comment_post = Comment::with('get_comment_user')->get();
            $message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
            $message_user = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
          
            $message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
            $message_chat_user_all_order = Message_Chat::with('get_message_chat_user')->orderByDesc('updated_at')->first();
          
            
            $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            $grup_public_post = Grup_Public_Post::with('get_grup_public_post_user')->orderByDesc('updated_at')->get();
            $post_user_grup = Grup_Public_Post::with('get_grup_post','get_grup_public_post_user')->get();
            $post_detail_grup = Grup_Public_Post::with('get_grup_public_post_user','get_grup_public_post')->get();
            $comment_post_grup = Grup_Public_Comment::with('get_grup_public_comment_user','get_grup_public_comment_post')->get();
            $likes_user_post_all_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->get();
            $likes_user_post_l_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->limit(15)->get();
            $rating_detail =  Rating_Detail::with('get_rating_detail_user')->orderByDesc('rating_popularitas')->limit(10)->get();
            $rating_detail_id =  Rating_Detail::with('get_rating_detail_user')->where('user_id', Auth::user()->id)->first();
         
            $data['followed_user'] = $followed_user;
            $data['limit_tambah'] = $limit_tambah;
            $data['post_user'] = $post_user;
            $data['likes_user_post_all'] = $likes_user_post_all;
            $data['likes_user_post_l'] = $likes_user_post_l;
            $data['comment_post_t'] = $comment_post_t;
            $data['post'] = $post;
           
            $data['post_comment'] = $post_comment;
            $data['post_detail'] = $post_detail;
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
            $data['rating_detail'] = $rating_detail;
            $data['rating_detail_id'] = $rating_detail_id;
           
            return view('beranda', $data);
    }
      public function beranda_limitm($limit_post)
    {       
             if(empty(Auth::user()))
            {
                return redirect('login');
            }
            $followed_user = Followed::with('get_followed')->where('user_id',Auth::user()->id)->get();
            $limit_tambah = $limit_post;
            $post_user = Post::with('get_post_user','get_comment_post')->orderByDesc('updated_at')->limit($limit_post)->get();
            $likes_user_post_all = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->get(); 
            $likes_user_post_l = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->limit(3)->get();

            $comment_post_t = DB::table('comment')->get();
            
            $post_detail = Post::with('get_post_user','get_comment_post')->get();
            $post= DB::table('post')->get();
            $post_comment = Post::with('get_comment_post')->get();
          
            $comment_post = Comment::with('get_comment_user')->get();
            $message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
            $message_user = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
          
            $message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
            $message_chat_user_all_order = Message_Chat::with('get_message_chat_user')->orderByDesc('updated_at')->first();
          
            
            $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            $grup_public_post = Grup_Public_Post::with('get_grup_public_post_user')->orderByDesc('updated_at')->get();
            $post_user_grup = Grup_Public_Post::with('get_grup_post','get_grup_public_post_user')->get();
            $post_detail_grup = Grup_Public_Post::with('get_grup_public_post_user','get_grup_public_post')->get();
            $comment_post_grup = Grup_Public_Comment::with('get_grup_public_comment_user','get_grup_public_comment_post')->get();
            $likes_user_post_all_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->get();
            $likes_user_post_l_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->limit(15)->get();
            $rating_detail =  Rating_Detail::with('get_rating_detail_user')->orderByDesc('rating_popularitas')->limit(10)->get();
            $rating_detail_id =  Rating_Detail::with('get_rating_detail_user')->where('user_id', Auth::user()->id)->first();
         
            $data['followed_user'] = $followed_user;
            $data['limit_tambah'] = $limit_tambah;
            $data['post_user'] = $post_user;
            $data['likes_user_post_all'] = $likes_user_post_all;
            $data['likes_user_post_l'] = $likes_user_post_l;
            $data['comment_post_t'] = $comment_post_t;
            $data['post'] = $post;
           
            $data['post_comment'] = $post_comment;
            $data['post_detail'] = $post_detail;
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
            $data['rating_detail'] = $rating_detail;
            $data['rating_detail_id'] = $rating_detail_id;
           
            return view('mberanda', $data);
    }
    
     public function beranda2()
    {       
            //$followed_user = Followed::with('get_followed')->where('user_id', Auth::user()->id)->get();
            $post_user = Post::with('get_post_user','get_comment_post')->orderByDesc('updated_at')->limit(20)->get();
            $likes_user_post_all = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->get(); 
            $likes_user_post_l = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->limit(15)->get();
            $comment_post_t = DB::table('comment')->get();
            
            //$post_detail = Post::with('get_post_user','get_comment_post')->get();
            //$post= DB::table('post')->get();
            //$post_comment = Post::with('get_comment_post')->get();
          
            $comment_post = Comment::with('get_comment_user')->get();
            //$message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
            //$message_user = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
          
            //$message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
            //$message_chat_user_all_order = Message_Chat::with('get_message_chat_user')->orderByDesc('updated_at')->first();
          
            
            $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            //$grup_public_post = Grup_Public_Post::with('get_grup_public_post_user')->orderByDesc('updated_at')->get();
            //$post_user_grup = Grup_Public_Post::with('get_grup_post','get_grup_public_post_user')->get();
            //$post_detail_grup = Grup_Public_Post::with('get_grup_public_post_user','get_grup_public_post')->get();
            //$comment_post_grup = Grup_Public_Comment::with('get_grup_public_comment_user','get_grup_public_comment_post')->get();
            //$likes_user_post_all_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->get();
            //$likes_user_post_l_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->limit(15)->get();
            
            
            //$data['followed_user'] = $followed_user;
            $data['post_user'] = $post_user;
            $data['likes_user_post_all'] = $likes_user_post_all;
            $data['likes_user_post_l'] = $likes_user_post_l;
            $data['comment_post_t'] = $comment_post_t;
            //$data['post'] = $post;
           
            //$data['post_comment'] = $post_comment;
            //$data['post_detail'] = $post_detail;
            $data['comment_post'] = $comment_post;
            //$data['message'] = $message;
            //$data['message_user'] = $message_user;
            //$data['message_chat_user_all'] = $message_chat_user_all;
            //$data['message_chat_user_all_order'] = $message_chat_user_all_order;
            $data['grup_list'] = $grup_list;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            //$data['grup_public_post'] = $grup_public_post;
            //$data['grup_public_post_all'] = $grup_public_post_all;
            //$data['post_user_grup'] = $post_user_grup;
            //$data['post_detail_grup'] = $post_detail_grup;
            //$data['comment_post_grup'] = $comment_post_grup;
            //$data['likes_user_post_all_grup'] = $likes_user_post_all_grup;
            //$data['likes_user_post_l_grup'] = $likes_user_post_l_grup;
           
            return view('beranda2', $data);
    }
       public function beranda3()
    {       
            //$followed_user = Followed::with('get_followed')->where('user_id', Auth::user()->id)->get();
            $post_user = Post::with('get_post_user','get_comment_post')->orderByDesc('updated_at')->limit(20)->get();
            $likes_user_post_all = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->get(); 
           // $likes_user_post_l = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->limit(15)->get();
            $comment_post_t = DB::table('comment')->get();
            
            //$post_detail = Post::with('get_post_user','get_comment_post')->get();
            //$post= DB::table('post')->get();
            //$post_comment = Post::with('get_comment_post')->get();
          
            $comment_post = Comment::with('get_comment_user')->get();
            //$message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
            //$message_user = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
          
            //$message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
            //$message_chat_user_all_order = Message_Chat::with('get_message_chat_user')->orderByDesc('updated_at')->first();
          
            
            $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            //$grup_public_post = Grup_Public_Post::with('get_grup_public_post_user')->orderByDesc('updated_at')->get();
            //$post_user_grup = Grup_Public_Post::with('get_grup_post','get_grup_public_post_user')->get();
            //$post_detail_grup = Grup_Public_Post::with('get_grup_public_post_user','get_grup_public_post')->get();
            //$comment_post_grup = Grup_Public_Comment::with('get_grup_public_comment_user','get_grup_public_comment_post')->get();
            //$likes_user_post_all_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->get();
            //$likes_user_post_l_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->limit(15)->get();
            
            
            //$data['followed_user'] = $followed_user;
            $data['post_user'] = $post_user;
            $data['likes_user_post_all'] = $likes_user_post_all;
            //$data['likes_user_post_l'] = $likes_user_post_l;
            $data['comment_post_t'] = $comment_post_t;
            //$data['post'] = $post;
           
            //$data['post_comment'] = $post_comment;
            //$data['post_detail'] = $post_detail;
            $data['comment_post'] = $comment_post;
            //$data['message'] = $message;
            //$data['message_user'] = $message_user;
            //$data['message_chat_user_all'] = $message_chat_user_all;
            //$data['message_chat_user_all_order'] = $message_chat_user_all_order;
            $data['grup_list'] = $grup_list;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            //$data['grup_public_post'] = $grup_public_post;
            //$data['grup_public_post_all'] = $grup_public_post_all;
            //$data['post_user_grup'] = $post_user_grup;
            //$data['post_detail_grup'] = $post_detail_grup;
            //$data['comment_post_grup'] = $comment_post_grup;
            //$data['likes_user_post_all_grup'] = $likes_user_post_all_grup;
            //$data['likes_user_post_l_grup'] = $likes_user_post_l_grup;
           
            return view('beranda3', $data);
    }
       public function beranda4()
    {       
            //$followed_user = Followed::with('get_followed')->where('user_id', Auth::user()->id)->get();
            $post_user = Post::with('get_post_user','get_comment_post')->orderByDesc('updated_at')->limit(20)->get();
            //$likes_user_post_all = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->get(); 
           // $likes_user_post_l = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->limit(15)->get();
            //$comment_post_t = DB::table('comment')->get();
            
            //$post_detail = Post::with('get_post_user','get_comment_post')->get();
            //$post= DB::table('post')->get();
            //$post_comment = Post::with('get_comment_post')->get();
          
           // $comment_post = Comment::with('get_comment_user')->get();
            //$message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
            //$message_user = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
          
            //$message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
            //$message_chat_user_all_order = Message_Chat::with('get_message_chat_user')->orderByDesc('updated_at')->first();
          
            
            $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            //$grup_public_post = Grup_Public_Post::with('get_grup_public_post_user')->orderByDesc('updated_at')->get();
            //$post_user_grup = Grup_Public_Post::with('get_grup_post','get_grup_public_post_user')->get();
            //$post_detail_grup = Grup_Public_Post::with('get_grup_public_post_user','get_grup_public_post')->get();
            //$comment_post_grup = Grup_Public_Comment::with('get_grup_public_comment_user','get_grup_public_comment_post')->get();
            //$likes_user_post_all_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->get();
            //$likes_user_post_l_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->limit(15)->get();
            
            
            //$data['followed_user'] = $followed_user;
            $data['post_user'] = $post_user;
            //$data['likes_user_post_all'] = $likes_user_post_all;
            //$data['likes_user_post_l'] = $likes_user_post_l;
            //$data['comment_post_t'] = $comment_post_t;
            //$data['post'] = $post;
           
            //$data['post_comment'] = $post_comment;
            //$data['post_detail'] = $post_detail;
            //$data['comment_post'] = $comment_post;
            //$data['message'] = $message;
            //$data['message_user'] = $message_user;
            //$data['message_chat_user_all'] = $message_chat_user_all;
            //$data['message_chat_user_all_order'] = $message_chat_user_all_order;
            $data['grup_list'] = $grup_list;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            //$data['grup_public_post'] = $grup_public_post;
            //$data['grup_public_post_all'] = $grup_public_post_all;
            //$data['post_user_grup'] = $post_user_grup;
            //$data['post_detail_grup'] = $post_detail_grup;
            //$data['comment_post_grup'] = $comment_post_grup;
            //$data['likes_user_post_all_grup'] = $likes_user_post_all_grup;
            //$data['likes_user_post_l_grup'] = $likes_user_post_l_grup;
           
            return view('beranda4', $data);
    }
        public function beranda5()
    {       
            //$followed_user = Followed::with('get_followed')->where('user_id', Auth::user()->id)->get();
            //$post_user = Post::with('get_post_user','get_comment_post')->orderByDesc('updated_at')->limit(20)->get();
            //$likes_user_post_all = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->get(); 
           // $likes_user_post_l = Likes::with('get_like_user','get_like_post')->orderByDesc('updated_at')->limit(15)->get();
            //$comment_post_t = DB::table('comment')->get();
            
            //$post_detail = Post::with('get_post_user','get_comment_post')->get();
            //$post= DB::table('post')->get();
            //$post_comment = Post::with('get_comment_post')->get();
          
           // $comment_post = Comment::with('get_comment_user')->get();
            //$message = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->get();
            //$message_user = Message::with('get_message_user1','get_message_user2')->where('message_user1', Auth::user()->id)->orWhere('message_user2', Auth::user()->id)->orderByDesc('updated_at')->first();
          
            //$message_chat_user_all = Message_Chat::with('get_message_chat_user')->get();
            //$message_chat_user_all_order = Message_Chat::with('get_message_chat_user')->orderByDesc('updated_at')->first();
          
            
            $grup_list = Grup_Public_User::with('get_grup','get_grup_public_post')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            //$grup_public_post = Grup_Public_Post::with('get_grup_public_post_user')->orderByDesc('updated_at')->get();
            //$post_user_grup = Grup_Public_Post::with('get_grup_post','get_grup_public_post_user')->get();
            //$post_detail_grup = Grup_Public_Post::with('get_grup_public_post_user','get_grup_public_post')->get();
            //$comment_post_grup = Grup_Public_Comment::with('get_grup_public_comment_user','get_grup_public_comment_post')->get();
            //$likes_user_post_all_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->get();
            //$likes_user_post_l_grup = Grup_public_Like::with('get_grup_public_like_user','get_grup_public_like_post')->orderByDesc('updated_at')->limit(15)->get();
            
            
            //$data['followed_user'] = $followed_user;
            //$data['post_user'] = $post_user;
            //$data['likes_user_post_all'] = $likes_user_post_all;
            //$data['likes_user_post_l'] = $likes_user_post_l;
            //$data['comment_post_t'] = $comment_post_t;
            //$data['post'] = $post;
           
            //$data['post_comment'] = $post_comment;
            //$data['post_detail'] = $post_detail;
            //$data['comment_post'] = $comment_post;
            //$data['message'] = $message;
            //$data['message_user'] = $message_user;
            //$data['message_chat_user_all'] = $message_chat_user_all;
            //$data['message_chat_user_all_order'] = $message_chat_user_all_order;
            $data['grup_list'] = $grup_list;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            //$data['grup_public_post'] = $grup_public_post;
            //$data['grup_public_post_all'] = $grup_public_post_all;
            //$data['post_user_grup'] = $post_user_grup;
            //$data['post_detail_grup'] = $post_detail_grup;
            //$data['comment_post_grup'] = $comment_post_grup;
            //$data['likes_user_post_all_grup'] = $likes_user_post_all_grup;
            //$data['likes_user_post_l_grup'] = $likes_user_post_l_grup;
           
            return view('beranda5', $data);
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
            $count_cart= DB::table('cart')->where('user_id', $user->id)->count();
            $count_post_id= DB::table('post')->where('user_id', $user_id->id)->count();
            $produk_id= DB::table('produk')->where('user_id', $user_id->id)->orderByDesc('updated_at')->get();
            $post_id= DB::table('post')->where('user_id', $user_id->id)->orderByDesc('updated_at')->get();
            $follower_id = DB::table('follower')->where('user_id', $user_id->id)->where('follower_user_id', $user->id)->first();
            $follower_user = DB::table('follower')->where('follower_user_id', $user->id)->get();
            $followed_id = DB::table('followed')->where('user_id', $user->id)->where('followed_user_id', $user_id->id)->first();
            $followed_user = DB::table('followed')->where('user_id', $user->id)->get();
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
            $catatan = Catatan::with('get_catatan_user')->where('user_id', $user_id->id)->orderByDesc('updated_at')->get();


            $data['count_post_id'] = $count_post_id;
            $data['produk_id'] = $produk_id;
            $data['count_cart'] = $count_cart;
            
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
            $data['catatan'] =  $catatan;
            return view('profil_id', $data);
    }
     public function usernamem($username)
    {       
            if(empty(Auth::user()))
              {
                   $user =  DB::table('users')->where('id', 21)->first();;
              }else
              {
                   $user = Auth::user();
              }

            $user_id = DB::table('users')->where('username', $username)->first();
            $count_cart= DB::table('cart')->where('user_id', $user->id)->count();
            $count_post_id= DB::table('post')->where('user_id', $user_id->id)->count();
            $produk_id= DB::table('produk')->where('user_id', $user_id->id)->orderByDesc('updated_at')->get();
            $post_id= DB::table('post')->where('user_id', $user_id->id)->orderByDesc('updated_at')->get();
            $follower_id = DB::table('follower')->where('user_id', $user_id->id)->where('follower_user_id', $user->id)->first();
            $follower_user = DB::table('follower')->where('follower_user_id', $user->id)->get();
            $followed_id = DB::table('followed')->where('user_id', $user->id)->where('followed_user_id', $user_id->id)->first();
            $followed_user = DB::table('followed')->where('user_id', $user->id)->get();
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
            $catatan = Catatan::with('get_catatan_user')->where('user_id', $user_id->id)->orderByDesc('updated_at')->get();


            $data['count_post_id'] = $count_post_id;
            $data['produk_id'] = $produk_id;
            $data['count_cart'] = $count_cart;
            
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
            $data['catatan'] =  $catatan;
            return view('mprofil_id', $data);
    }
       
     public function pencarian()
    {       
             if(empty(Auth::user()))
            {
                return redirect('login');
            }
            $post_user = DB::table('users')->orderByDesc('updated_at')->limit(100)->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $grup_list = Grup_Public_User::with('get_grup')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            $followed_user = Followed::with('get_followed')->where('user_id',Auth::user()->id)->get();
           
            $data['post_user'] = $post_user;
            $data['count_cart'] = $count_cart;
            $data['grup_list'] = $grup_list;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            $data['followed_user'] = $followed_user;
            return view('pencarian_user', $data);
    }
     public function pencarian_like(request $request)
    {       
             if(empty(Auth::user()))
            {
                return redirect('login');
            }
            $limit_post = 20;
            $limit_tambah = 20;
            $name = $request->name;
            $post_user = DB::table('users')->where('name','like','%'.$request->name.'%')->orwhere('username','like','%'.$request->name.'%')->orwhere('email','like','%'.$request->name.'%')->limit($limit_post)->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $grup_list = Grup_Public_User::with('get_grup')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            $followed_user = Followed::with('get_followed')->where('user_id',Auth::user()->id)->get();
           
            $data['limit_tambah'] = $limit_tambah;
            $data['name'] = $name;
            $data['post_user'] = $post_user;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            $data['count_cart'] = $count_cart;
            $data['grup_list'] = $grup_list;
            $data['followed_user'] = $followed_user;
            
            return view('pencarian_user', $data);
    }
       public function pencarian_likem(request $request)
    {       
             if(empty(Auth::user()))
            {
                return redirect('login');
            }
            $limit_post = 20;
            $limit_tambah = 20;
            $name = $request->name;
            $post_user = DB::table('users')->where('name','like','%'.$request->name.'%')->orwhere('username','like','%'.$request->name.'%')->orwhere('email','like','%'.$request->name.'%')->limit($limit_post)->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $grup_list = Grup_Public_User::with('get_grup')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            $followed_user = Followed::with('get_followed')->where('user_id',Auth::user()->id)->get();
           
            $data['limit_tambah'] = $limit_tambah;
            $data['name'] = $name;
            $data['post_user'] = $post_user;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            $data['count_cart'] = $count_cart;
            $data['grup_list'] = $grup_list;
            $data['followed_user'] = $followed_user;
            
            return view('mpencarian_user', $data);
    }
  
       public function pencarian_like_limit(request $request, $limit_post)
    {       
             if(empty(Auth::user()))
            {
                return redirect('login');
            }
            $limit_tambah = $limit_post;
            $name = $request->name;
            $post_user = DB::table('users')->where('name','like','%'.$request->name.'%')->orwhere('username','like','%'.$request->name.'%')->orwhere('email','like','%'.$request->name.'%')->limit($limit_post)->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $grup_list = Grup_Public_User::with('get_grup')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            $followed_user = Followed::with('get_followed')->where('user_id',Auth::user()->id)->get();
            
            $data['limit_tambah'] = $limit_tambah;
            $data['name'] = $name;
            $data['post_user'] = $post_user;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            $data['count_cart'] = $count_cart;
            $data['grup_list'] = $grup_list;
            $data['followed_user'] = $followed_user;
            
            return view('pencarian_user', $data);
    }

       public function pencarian_like_limitm(request $request, $limit_post)
    {       
             if(empty(Auth::user()))
            {
                return redirect('login');
            }
            $limit_tambah = $limit_post;
            $name = $request->name;
            $post_user = DB::table('users')->where('name','like','%'.$request->name.'%')->orwhere('username','like','%'.$request->name.'%')->orwhere('email','like','%'.$request->name.'%')->limit($limit_post)->get();
            $count_cart= DB::table('cart')->where('user_id', Auth::user()->id)->count();
            $grup_list = Grup_Public_User::with('get_grup')->where('user_id',Auth::user()->id)->orderByDesc('updated_at')->get();
            $grup_public_post_all = Grup_Public_Post::with('get_grup_public_post_user')->get();
            $followed_user = Followed::with('get_followed')->where('user_id',Auth::user()->id)->get();
            
            $data['limit_tambah'] = $limit_tambah;
            $data['name'] = $name;
            $data['post_user'] = $post_user;
            $data['grup_public_post_all'] =  $grup_public_post_all;
            $data['count_cart'] = $count_cart;
            $data['grup_list'] = $grup_list;
            $data['followed_user'] = $followed_user;
            
            return view('mpencarian_user', $data);
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
