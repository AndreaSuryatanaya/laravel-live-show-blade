<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
   function index()
   {
      return view('welcome');
   }

   public function helloWorld()
   {
      return view('hello-world');
   }

   function about()
   {
      return view('about');
   }
}
