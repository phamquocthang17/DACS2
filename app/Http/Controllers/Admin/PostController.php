<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Services\Post\PostServices;
use App\Models\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $PostServices; 
    public function __construct(PostServices $PostServices){
        $this->PostServices =$PostServices;

    }
   public function create(){
    return view('admin.Post.addpost',['title'=>'Add New Post' ]);
   }
   public function store(Request $request){
    $rs=$this->PostServices->create($request);
    return redirect()->back();
   }
   public function index(){
    
    return view('admin.Post.listpost',[
        'title'=>'List Post',
        'post' => $this->PostServices->getAll()
    ]);
        
    


}

   public function show(Post $post){
    $images = \App\Models\Image::where('post_id', $post->id)->get();

       

    return view ('admin.Post.edit',[
        'title'=>'Edit post ' . $post->title,

        'post'=>$post,
        'images'=> $images
    ]);


   }

   public function destroy(Request $request){

    
    $result=$this->PostServices->destroy($request);
        if($result){
            return response()->json([
                'error'=>false,
                'message'=>'delete success'
            ]);
        }
        return response()->json([
            'error'=>true
            
        ]);

   }

   public function update(Request $request,Post $post,Image $image)
   {
     $this->PostServices->update($request, $post,$image);
     return redirect('/admin/Post/listpost');
   }

}
