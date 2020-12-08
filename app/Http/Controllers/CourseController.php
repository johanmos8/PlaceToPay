<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    //

    public function index(){

        return view("courses.index");
    }

    public function create(){
        return view("courses.create");
    }

    public function show($curso){

        return view('courses.show',['course' => $curso]);
    }
}
