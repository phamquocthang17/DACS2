<?php
namespace App\Http\services;

use App\Models\animals;
;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class UploadServices 
{
    public function store($request){
        if($request->hasFile('file')){
            try{
            $name = $request->file('file')->getClientOriginalname();
            $PathFulll='uploads/'.date("y/m/d");
            
            $path = $request->file('file')->storeAs(
                'public/'.$PathFulll,$name
                
              
            );

            return '/storage/'. $PathFulll.'/'.$name;

        }catch(\Exception $error){
            return false;


        }
    }
       

    }

}