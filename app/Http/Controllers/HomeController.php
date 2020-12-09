<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        

        return View("home.home");

    }
    //

    public function index(){

        return view("courses.index");
    }

    public function create(){
        return view("courses.create");
    }

    public function showProducts($curso){

        return view('home.producto',['course' => $curso]);
    }
}