<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PostController extends Controller
{
    public function AddPost(Request $request){
        $request->validate([
            'post_title' => 'required|max:25',
            'post' => 'required'
        ]);
        
        // $post =  Post::created([
        //     'user_id' => Auth::id(),
        //     'post_title' => $request->post_title,
        //     'post' => $request->post
        // ]);
            $post = new Post();
            $post->user_id = Auth::id();
            $post->post_title =$request->post_title;
            $post->post =$request->post;
            $post->created_at = Carbon::now();
            $post->updated_at = Carbon::now();
            $post->save();

            return response()->json(['success'=> 'Post added successfuly']);
    }//end method


    public function GetAllPost(){
        $post =  Post::with('user')->where('status', 'active')->inRandomOrder()->limit(10)->get();
        return response()->json(['post' => $post]);
        // <img src="{{ $value->user->photo != NULL ? asset($value->user->photo) : asset('/uploads/no_image_avatar.png') }}" class="img-thumbnail rounded" style="width: 50px; height: 25px;" alt="..." />
    }//end method 


    public function getPost($id){
        $post =  Post::findOrFail($id);
        return response()->json(['post' => $post]);
    }//end method

    public function updatePost(Request $request){
        $id =  $request->id;
        $post = Post::findOrFail($id);
        $post->post_title =$request->post_title;
        $post->post =$request->post;
        $post->updated_at = Carbon::now();
        $post->update();

        return response()->json(['success'=> 'Post update successfuly']);
    }//end method

    public function DeletePost($id){
        Post::findOrFail($id)->delete();
        return response()->json(['success'=> 'Post deleted successfuly']);

    }//end method
}
