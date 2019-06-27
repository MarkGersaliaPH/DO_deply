<?php
namespace App\Helpers;
use Auth;
use Image;

class FileUpload
{
    public static function bookImage($image,$image_name){
        
        $newImage = Image::make($image);
        $path =  public_path().'/img/uploads/'. Auth::user()->id.'/books/';
        $thumbPath =  public_path().'/img/uploads/'. Auth::user()->id.'/books/50x50-';
        
        $input['imagename'] = $image_name;   
        $image->move($path, $input['imagename']);
 
  
        $newImage->fit(50, 50);;
        $newImage->save($thumbPath.$input['imagename']); 



    }
}