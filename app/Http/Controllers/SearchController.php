<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search(Request $request) {
      $dishes = Dish::where('menu_id', '=', $request->menu_id)
                     ->where('title', 'like', '%'.$request->title.'%')
                     ->whereBetween('price', explode("-", $request->price))
                     ->paginate(100);
      return view('home', compact('dishes'));
    }
}
