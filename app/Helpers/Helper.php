<?php
namespace App\Helpers;

class Helper 
{
    public static function CheckImage($name, $path)
    {
            $img = $name; //$request->file('');

            $img_file_extension = $img->getClientOriginalExtension();

            if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
    		{
    			return back()->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
            }
            $filename = uniqid() . " " . $img->getClientOriginalName();;

            $img->move($path ,$filename);

            return $filename;
        
    }
}