<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\services\category\CategoryServices;
use App\Http\Requests\Category\CreateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $CategoryServices;

    public function __construct(CategoryServices $CategoryServices){
        $this->CategoryServices = $CategoryServices;
    }

    public function create()

    {
        
    return view('admin.Menu.addCategory',
       [ 'title'=>'Add Category',
       'categories' => $this->CategoryServices->getParent()
       

       
       ]); 
       
    }

    public function store(CreateRequest $request){
        $rs = $this->CategoryServices->create($request);
        return redirect()->back();
    }

    public function index(){
        return view('admin.Menu.listcategory',[
            'title'=>'List Category',
            'categories' => $this->CategoryServices->getAll()
        ]);
    }


    public function show(Category $category){
        
     
        return view('admin.Menu.editcategory',[
            'title'=>'Edit Category '.$category->name,
            'category' => $category,
            'categories' => $this->CategoryServices->getParent()

        ]);

    }

    public function update(Category $category,CreateRequest $request){
       $this->CategoryServices->update($request,$category);
       return redirect('/admin/category/listcategory');
    }


    public function destroy(Request $request){
        $result=$this->CategoryServices->destroy($request);
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
}

