<?php
namespace App\Helper;
 
class helper{
    public static function category($categories,$id=0){
        $html='';
        foreach($categories as $key=>$category){
            if($category->$id==$id){
                $html .='
            <tr>
                <td>'. $category->code .'</td>
                <td>' .$category->name .'</td>
                <td>'. $category->updated_at .'</td>
                <td>
                
                <a class="btn btn-primary btn-sm" href="/admin/category/edit/'.$category->id.'">
                  <i class="fas fa-edit"></i>
                </a>

                <a class="btn btn-danger btn-sm" href="#" onclick="removeRow('.$category->id.',\'/admin/category/destroy\')" >
                  <i class="fas fa-trash"></i>
                </a>
                
                </td>
            </tr>
                
                ';
               

            }
       
            
        }
        return $html;

    }


    public static function animal($animals,$id=0)
{
    $html = '';
    foreach ($animals as $animal) {
        if($animal->$id==$id){
        $html .= '
            <tr>
                <td>' . $animal->species . '</td> <!-- Thêm trường species để hiển thị loại động vật -->
                <td>' . $animal->name . '</td>
                <td><img src="' . $animal->thumb . '" width="50" height="50" /></td>
                <td>' . self::status( $animal->status ). '</td>
                <td>' . $animal->updated_at . '</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/animal/edit/' . $animal->id . '">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#" onclick="removeRow(' . $animal->id . ',\'/admin/animal/destroy\')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        ';
        }
    }

    return $html;
}

public static function post($post, $id=0){
    $html='';
    foreach($post as $post){
        if($post->$id==$id){
            $html .= '
    <tr>
        <td>'.$post->title.'</td>
        <td><img src="' . $post->images. '" width="100" height="100" /></td>
        <td>'.$post->body.'</td>
        <td>'.$post->created_at.'</td>
        <td>
                    <a class="btn btn-primary btn-sm" href="/admin/Post/edit/' . $post->id . '">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#" onclick="removeRow(' . $post->id . ',\'/admin/Post/destroy\')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>

    </tr>
            




            
            
            ';
        }
    };
    return $html;
}

public static function status($status) {
    if ($status == 'safe') {
        $status = '<span class="btn btn-success  w-100 text-center">Safe</span>'; 
    } else if ($status == 'vulnerable') {
        $status = '<span class="btn btn-warning w-100 text-center">Vulnerable</span>'; 
      
    }else{
        $status = '<span class="btn btn-danger w-100 text-center" text-alight:center;>Endangered</span>'; 
    }

    return $status;
}



}

