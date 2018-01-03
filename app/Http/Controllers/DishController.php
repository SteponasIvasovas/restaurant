<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDishRequest;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dishes = Dish::all();
      return view('admin.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $menus = Menu::all();
      return view('admin.dish.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
      $dish = new Dish();
      $dish->title = $request->title;
      $path = $request->file('photo')->store('public/images');
      $dish->photo = basename($path);
      $dish->description = $request->description;
      $dish->price = $reuqest->price;
      $dish->menu_id = $request->menu_id;
      $dish->save();
      return redirect('admin/dish')->(['message' => 'Dish added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
      return view('admin.dish.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDishRequest $request, Dish $dish)
    {
      $dish->update($request->all());
      return redirect('admin/dish')->with(['message' => 'Dish successfuly edited']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
      $menu->delete();
      return redirect('admin/dish');
    }
}
