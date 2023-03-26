<?php
    namespace App\Traits;
    use Illuminate\Http\Request;
    trait ImageTrait{
        protected function verifyAndUpload($file, $path){
            $filename = null;
            if(!is_null($file)){
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $imageName = $filename . '_' . time() . '_.' . $extension;
            $path = $file->storeAs($path, $imageName);
            }
            return $imageName;
        }
    }
?>