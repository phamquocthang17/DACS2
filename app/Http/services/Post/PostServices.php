<?php
namespace App\Http\Services\Post;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Str;

class PostServices 
{
    public function create($request){
        try{
            $slug = Str::slug($request->input('title'));
            
            $post=Post::create([
                "title" => (string) $request->input('title'),
                "body" => (string) $request->input('body'),
                "images" => (string) $request->input('thumb'),
                "excerpt" => (string) $request->input('excerpt'),
                "user_id" => auth()->id(),
                "slug" => $slug

            ]);
            Session::flash('success','Success');


          
            if($request->hasFile('images')){
                foreach($request->file('images')as $file){
                    $fileName = $file->getClientOriginalname();
                    $pathFull = 'uploads/' . date("Y/m/d");
                    $path = $file->storeAs('public/' . $pathFull, $fileName);


                    Image::create([
                        'post_id' => $post->id,
                        'path' => '/storage/' . $pathFull . '/' . $fileName,
                    ]);

                }

            }

        }catch(\Exception $e){
            Session::flash('error',$e->getMessage());
            return false;
      
              
           }
           return true;

        }


        public function update($request, Post $post)
        {
            try {
                // Cập nhật thông tin post
                $post->fill($request->all());
                $post->save();
        
                // Xử lý cập nhật ảnh
                if ($request->hasFile('path')) {
                    foreach ($request->file('path') as $file) {
                        $path = $file->store('uploads', 'public'); // lưu ảnh vào thư mục 'uploads'
        
                        // Tạo bản ghi mới trong bảng images
                        \App\Models\Image::create([
                            'path' => '/storage/' . $path,
                            'post_id' => $post->id
                        ]);
                    }
                }
        
                Session::flash('success', 'Update successful');
            } catch (\Exception $e) {
                Session::flash('error', $e->getMessage());
                return false;
            }
        
            return true;
        }
        


        public function getAll(){
            return Post::orderBy('id')->paginate(2);
        }


        public function destroy($request){
            

            $post= Post::where('id', $request->input('id'))->first();
      
        if ($post) {
             Image::where('post_id',$request->input('id'))->delete();
          
          return Post::where('id', $request->input('id'))->delete();
      }
      
      return false;
  }
        }

    


