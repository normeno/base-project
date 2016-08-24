<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['name' => 'administration', 'route' => 'api.menus', 'menu_id' => null, 'font' => 'unlock-alt'],
            ['name' => 'site', 'route' => 'api.menus', 'menu_id' => 1, 'font' => null],
            ['name' => 'administrator', 'route' => 'api.menus', 'menu_id' => 1, 'font' => null],
            ['name' => 'user', 'route' => 'api.menus', 'menu_id' => null, 'font' => 'users']
        ];

        for($i=0; $i<count($menus); $i++) {
            \DB::table('menus')->insert([
                'name' => $menus[$i]['name'],
                'route' => $menus[$i]['route'],
                'menu_id' => $menus[$i]['menu_id'],
                'font' => $menus[$i]['font']
            ]);
        }
    }
}
