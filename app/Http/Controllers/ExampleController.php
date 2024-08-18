<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ExampleController extends Controller
{
    function uploadForm(){
        return view('upload');
    }

    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }
    public function index() {

        return view('index');
    }
    public function test() {
        dd(Student::find(1), Student::find(1)->phone);
    }
}

