<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/post', function () {
    return view('post');
});

function getUsers()
{
    return [
        [
            'name' => 'Dipak',
            'number' => '98040645472',
            'city' => 'Kathmandu'
        ],
        [
            'name' => 'Sujan',
            'number' => '98040645473',
            'city' => 'Lalitpur'
        ],
        [
            'name' => 'Ramesh',
            'number' => '98040645474',
            'city' => 'Bhaktapur'
        ]
    ];
}

Route::get('/passValueInRoute', function () {
    $name = "Dipak Tamang";
    $number = "98040645472";
    $city = "Kathmandu";
    $array = getUsers();
    // return view(
    //     'passValue',
    //     [
    //         'name' => $name,
    //         'number' => '98040645472'
    //     ]
    // );
    /*
    return view('passValue')
    ->with('name', $name)
    ->with('number', '9840645472');
    */
    // return view('passValue')
    // ->withName($name)
    // ->withNumber('9840645472');
    // return view('passValue', compact('name', 'number', 'city'));
    return view('passValue', compact('array'));
});

Route::get('/user/{id}', function ($id) {
    $users = getUsers();
    abort_if(!isset($users[$id]), 404);
    $user = $users[$id];
    return view('user', compact('user'));
})->name('view.user');
