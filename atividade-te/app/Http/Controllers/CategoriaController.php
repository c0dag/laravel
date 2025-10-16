<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        return view('categoria');
    }
    public function formulario(Request $request) {
        $firstName = $request->input('fname');
        $lastName = $request->input('lname');

        return "First name: $firstName, Last name: $lastName";
    }
}
