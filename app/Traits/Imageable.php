<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use App\Models\Trending;

trait Imageable
{

    
    public function setImageAttribute($value,$oldImage= null)
    {
        if ($value) {
            // Delete the old image if it exists
            if ($oldImage && $oldImage != NULL) {
                Storage::disk('public')->delete('trending/' . $oldImage);
            }
    
            // Save the new image
            $imageName = time() . '.' . $value->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/trending');
            $value->move($destinationPath, $imageName);   
            return  $imageName;
        }
    }
  

    public function deleteImage($id)
    {
        $trending = Trending::find($id);
        if (!empty($trending->image) && Storage::disk('public')->exists('trending/' . $trending->image)) {
            Storage::disk('public')->delete('trending/' . $trending->image);
        }
    }
    
 
    
    
    
}
