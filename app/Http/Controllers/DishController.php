<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Menu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDishRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
//image failo direktorija
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $dishes = DB::table('dishes')->paginate(15);
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
      $this->authorize('create', Dish::class);
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
      $name = $request->file('photo')->getClientOriginalName();
      $timestamp = Carbon::now()->toAtomString();
      $request->file('photo')->storeAs('public/images', $timestamp.$name );
      // Image::make(Input::file('photo'))->resize(100, 100)->save(storage_path('app/public/images/'.$timestamp.$name));
      $dish = new Dish();
      $dish->title = $request->title;
      $dish->photo = $timestamp.$name;
      $dish->description = $request->description;
      $dish->price = $request->price;
      $dish->menu_id = $request->menu_id;
      $dish->save();
      return redirect('admin/dish')->with(['message' => 'Dish added successfully']);
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
      $this->authorize('update', Dish::class);
      $menus = Menu::all();
      return view('admin.dish.edit', compact('dish'), compact('menus'));
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
      $dish->title = $request->title;

      if ($request->photo != null) {
        //artisane reikia palinkint storage
        $oldPath = 'public/images/';

        if(!empty($dish->photo)) {
          Storage::delete($oldPath.$dish->photo);
        }

        $name = $request->file('photo')->getClientOriginalName();
        $timestamp = Carbon::now()->toAtomString();
        $request->file('photo')->storeAs('public/images', $timestamp.$name );
        // $img = Image::make(Input::file('photo'))->resize(100, 100);
        // $img->pixelate(12);
        $img->save(storage_path('app/public/images/'.$timestamp.$name));
        $dish->photo = $timestamp.$name;
      }

      $dish->description = $request->description;
      $dish->price = $request->price;
      $dish->menu_id = $request->menu_id;
      $dish->update();
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
      $this->authorize('delete', Dish::class);

      if (!empty($dish->photo)) {
        $oldPath = 'public/images/';
        Storage::delete($oldPath.$dish->photo);
      }

      $dish->delete();
      return redirect('admin/dish');
    }
}
