<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //tikrinimas ar vartotojas yra adminas ar useris
      $this->authorize('create', Menu::class);
      return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
      Menu::create($request->all());
      return redirect('admin/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
      $this->authorize('update', Menu::class);
      //compact('menu') == ['menu' => $menu']
      return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMenuRequest $request, Menu $menu)
    {
      $menu->update($request->all());
      return redirect('admin/menu')->with(['message' => 'Menu successfuly edited']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
      $this->authorize('delete', Menu::class);
      if ($menu->dishes->count() == 0) {
        $menu->delete();
        return redirect('admin/menu');
      } else {
        return redirect('admin/menu')->with(['message' => 'Menu can not be deleted']);
      }
    }
}
