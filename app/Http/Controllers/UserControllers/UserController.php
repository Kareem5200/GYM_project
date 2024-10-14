<?php

namespace App\Http\Controllers\UserControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CustomHelperFunctions;
use App\Models\User;

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

        return to_route('home');
    }
}
