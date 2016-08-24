<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\App;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function menus()
    {
        $output = [];
        $menus = Menu::all();

        foreach ($menus as $menu) {

            if (!$menu->menu_id) {
                $output[$menu->id] = [
                    'id'        => $menu->id,
                    'name'      => $menu->name,
                    'route'     => route($menu->route),
                    'menu_id'   => $menu->menu_id,
                    'font'      => $menu->font
                ];
            } else {
                if (array_key_exists($menu->menu_id, $output)) {
                    $output[$menu->menu_id]['childs'][] = [
                        'id'        => $menu->id,
                        'name'      => $menu->name,
                        'route'     => route($menu->route),
                        'menu_id'   => $menu->menu_id,
                        'font'      => $menu->font
                    ];
                }
            }

        }

        return $output;
    }
}
