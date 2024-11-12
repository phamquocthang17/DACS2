<?php
namespace App\Http\services\Category;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category
;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class CategoryServices
{

   public function getParent(){
      return Category::where('code',0)->get();
   }

   public function getAll(){
     return Category::orderBy('id')->paginate(20);
   }





    public function create($request){
     try {
        Category::create([
         "code"=>(string)$request->input('code'),
         "name"=>(string)$request->input('name'),
         "description"=>(string)$request->input('description'),
         'user_id' => auth()->id()

        ]);
        Session::flash('success','Success');

     } catch (\Exception $err ) {

      Session::flash('error',$err->getMessage());
      return false;

        
     }
     return true;
    }
    public function update($request,$category):bool{
      $category->code= (string)$request->input('code');
      $category->name= (string)$request->input('name');
      $category->description= (string)$request->input('description');
      $category->save();
      Session::flash('Success','edit Success ');
      return true;
    }


    public function destroy($request) {
     
      $category = Category::where('id', $request->input('id'))->first();
      
      if ($category) {
          
          return Category::where('id', $request->input('id'))->delete();
      }
      
      return false;
  }
  
   }
