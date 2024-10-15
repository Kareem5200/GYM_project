<?php

namespace App\Http\Controllers\UserControllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CustomHelperFunctions;
use Illuminate\Validation\Rule;


class UserController extends Controller
{



    public function editInbody(Request $request){

        $request->validate([
            'inbody'=>['required','image','mimes:png,jpg,jpeg','max:2048']
        ]);


        $inbody = CustomHelperFunctions::storeImage(request()->file('inbody'),'\images\inbody/');
        $user = Auth::user();
        $user->update([
            'inbody'=>$inbody,
        ]);

        return to_route('profile');
    }


    public function editProfile(Request $request){
        $user = Auth::user();
        $request->validate([
            'phone1'=>['required','regex:/^01[0125][0-9]{8}$/', Rule::unique('users')->ignore($user->id),]
        ]);

        $user->update([
            'phone1'=>$request->phone1,
        ]);

        return to_route('profile');
    }
}
