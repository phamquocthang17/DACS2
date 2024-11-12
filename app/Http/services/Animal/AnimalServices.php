<?php
namespace App\Http\Services\Animal;

use App\Models\animals;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class AnimalServices 


{
    
    // public function create($request)
    // {
    //     try {
    //         animals::create([
    //             "code" => (string)$request->input('code'),
    //             "name" => (string)$request->input('name'),
    //             "description" => (string)$request->input('description'),
    //             "species" => (string)$request->input('species', 'unknown'), // Truyền giá trị mặc định nếu species không có trong input
    //             "habitat" => (string)$request->input('habitat', 'unknown'), // Truyền giá trị mặc định nếu habitat không có trong input
    //             "age" => $request->input('age', 0), // Giá trị mặc định là 0 nếu không có age
    //             "weight" => $request->input('weight', 0.0), // Giá trị mặc định là 0.0 nếu không có weight
    //             "height" => $request->input('height', 0.0), // Giá trị mặc định là 0.0 nếu không có height
    //             "status" => $request->input('status', 'safe'), // Giá trị mặc định là 'safe' nếu không có status
    //             "thumb" => (string)$request->input('thumb', ''), // Giá trị mặc định là chuỗi rỗng nếu không có thumb
    //         ]);
    //         Session::flash('success', 'Animal added successfully.');
    //     } catch (\Exception $err) {
    //         Session::flash('error', $err->getMessage());
    //         return false;
    //     }
    //     return true;
    // }
    public function insert($request)
{
    $species = $request->input('species'); // Lấy giá trị species từ form

    // Kiểm tra nếu species có giá trị
    if (!$species) {
        throw new \Exception('Species is required.');
    }

    // Tìm Category theo code
    $category = Category::where('code', $species)->first(); // Tìm Category với code

    // Kiểm tra nếu Category không tồn tại
    if (!$category) {
        throw new \Exception('Category not found for the provided species code: ' . $species);
    }

    // Lấy ID của Category tìm thấy
    $categoryId = $category->id;

    // Kiểm tra nếu categoryId là null
    if (!$categoryId) {
        throw new \Exception('Invalid category ID.');
    }

    try {
        animals::create([
            "code" => (string)$request->input('code'),
            "name" => (string)$request->input('name'),
            "description" => (string)$request->input('description'),
            "species" => (string)$request->input('species', 'unknown'),
            "habitat" => (string)$request->input('habitat', 'unknown'),
            "age" => $request->input('age', 0),
            "weight" => $request->input('weight', 0.0),
            "height" => $request->input('height', 0.0),
            "status" => $request->input('status', 'safe'),
            "thumb" => (string)$request->input('thumb', ''),
            "category_id" => $categoryId // Gán ID của category
        ]);
        Session::flash('success', 'Success');

    } catch (\Exception $err) {
        Session::flash('error', $err->getMessage());
        return false;
    }
}

        public function getAll(){
            return animals::orderBy('id')->paginate(5);
          }


          public function getParent(){
            return animals::all();
        }

        public function update($request,$animal){
            try{
                $animal->fill($request->all());
                $animal->save();
                
                Session::flash('success','update success');
            }catch(\Exception $e){
                Session::flash('error',$e->getMessage());
                return false;
            }
            return true;


        }
        


          public function destroy($request){
            $animals = animals::where('id',$request->input('id'))->first(); 
            if($animals){
                return animals::where('id',$request->input('id'))->delete();
            }
            return false;

          }

    }

    

