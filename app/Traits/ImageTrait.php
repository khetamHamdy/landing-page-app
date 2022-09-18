<?php

namespace App\Traits;


trait ImageTrait
{

    public function verifyAndUpload(Request $request , $nameFile , $name_img)
    {
        $avatarpath = null;
        if ($request->hasFile('image')) {
            $avatarpath = $request->file('image')->storeAs(
                $nameFile,
                $name_img. '.' . $request->file('image')->getClientOriginalExtension()
                ,
                'public'
            );
            // dd($request->file('profile_photo_path')->getClientOriginalExtension());
           $request->image = $avatarpath;
        }

        return $avatarpath;

    }

}
