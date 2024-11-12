<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Anmal\animalRequest;
use Illuminate\Http\Request;
use App\Http\services\Animal\AnimalServices;
use App\Http\services\Category\CategoryServices;
use App\Http\Requests\Category\CreateRequest;
use App\Models\animals;

class AnimalsController extends Controller
{
    protected $AnimalServices;
    protected $CategoryServices;

    public function __construct(AnimalServices $animalServices, CategoryServices $categoryServices)
    {
        $this->AnimalServices = $animalServices;
        $this->CategoryServices = $categoryServices;
    }

    public function create()
    {
        // Assuming you're using a Category model to fetch data
        $categories = \App\Models\Category::all();
    
        return view('admin.Animal.addAnimal', [
            'title' => 'Add Animals',
            'categories' => $categories
           
        ]);
    }
    
    public function index(){
    
            return view('admin.animal.list',[
                'title'=>'List Animal',
                'animals' => $this->AnimalServices->getAll()
            ]);
                
            
        
        
    }
    public function show(animals $animal){
        $categories = \App\Models\Category::all();
       
        return view('admin.animal.editAnimal', [
            'title' => 'Edit Animals',
            'categories' => $categories,
            'animal' => $animal,       
            'animals' =>  $this->AnimalServices->getParent()
        ]);
    }

    public function update(animals $animal,CreateRequest $request){
        $this->AnimalServices->update($request,$animal);
        return redirect('/admin/animal/list');


    }
    
 

    public function store(animalRequest $request)
    
    {
        
        $this->AnimalServices->insert($request);
        return redirect()->back();
    }
    public function destroy(Request $request){
        $rs=$this->AnimalServices->destroy($request);
        if($rs){
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

