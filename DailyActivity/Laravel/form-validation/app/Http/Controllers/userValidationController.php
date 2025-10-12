<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;
use App\Http\Requests\UserRequest;
use App\Rules\Uppercase;



class userValidationController extends Controller
{
    public function addUser(Request $req)
    {
        // this for the custum validation without form request THIS CLOSURE METHOD
        // $validator = Validator::make($req->all(), [
        //     'name' => 'required|min:5|max:20',
        //     'email' => 'required|email',
        //     'age' => [
        //         'required',
        //         'numeric',
        //         function ($attribute, $value, $fail) {
        //             if ($value <= 0) {
        //                 $fail($attribute . " must be a positive number.");
        //             }
        //         }
        //     ],
        //     'city' => 'required|string'
        // ]);
        // $validator->stopOnFirstFailure();
        // $validator->validate();
        // return back()->with('success', 'Form is successfully validated');

        //this for the form request validation | here need UserRequest file
        // $data = $req->validated();

        //this for the custum validation rule THIS RULES OBJECT
        $data = $req->validate([
            'name' => ['required', new Uppercase]
        ]);
        return $data;
    }

}