<?php

namespace App\Http\Controllers;

use App\Models\contact;

class ContactController extends Controller
{
    public function show(){
        $contacts = contact::with('student')->get();
        return response()->json($contacts);
    }
}
