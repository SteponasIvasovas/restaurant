<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //sukuria logino redirecta
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dishes = Dish::paginate(8);
      return view('home', compact('dishes'));
    }
}
