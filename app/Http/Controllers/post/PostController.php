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
        // if($post){

        // }else{
        //     return response()->json(['error'=> 'somthing is wrong']);

        // }

    }//end method
}
