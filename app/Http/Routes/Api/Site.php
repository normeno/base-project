<?php

/*Route::resource('site', 'SiteController',
    [
        'only' => ['index']
    ]
);*/


Route::get('site/menus', [
    'as' => 'api.menus',
    'uses' => 'SiteController@menus'
]);
