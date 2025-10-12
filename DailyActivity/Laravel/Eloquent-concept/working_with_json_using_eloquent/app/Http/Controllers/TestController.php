<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $test = Test::get();
        // return $test;

        // $test=Test:find(1);
        // return $test->meta_data['address']['city'];

        // $test = Test::where('meta_data->name','Dipak Tamang')->get();
        // return $test;

        // $test = Test::where('meta_data->name', 'LIKE', '%D%')->get();
        // return $test;

        // $test = Test::whereJsonContains('meta_data->address', ['city' => 'Kathmandu'])->get();
        // return $test;

        $test = Test::whereJsonLength('meta_data->name', '>', 0)->get();
        return $test;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $test = Test::create([
        //     'meta_data' => [
        //         'key1' => 'value1',
        //         'key2' => 'value2',
        //         'key3' => 'value3'
        //     ]
        // ]);

        // $test = new Test();
        // $test->meta_data = [
        //     'name' => 'Dipak Tamang',
        //     'email' => 'dipak@gmail.com',
        //     'mo. number' => '9840645472'
        // ];
        // $test->save();

        // $test = Test::create([
        //     'meta_data' => [
        //         'name' => 'Dipak Tamang',
        //         'key2' => 'dipak@gmail.com',
        //         'key3' => '3920394834',
        //         'address' => [
        //             'city' => 'Kathmandu',
        //             'country' => 'Nepal'
        //         ]
        //     ]
        // ]);
        // return $test;

        // $test = Test::where(column: 'id',1) ->update([
        //     'meta_data->name' => 'Ram Tamang'
        // ]);
        // return $test;

        // $test = Test::find(2);
        // $test->meta_data = [
        //     'name' => 'Ram Tamang',
        //     'email' => 'ram.tamang@gmail.com',
        //     'mo. number' => '9840645472',
        //     'address' => [
        //         'city' => 'Kathmandu',
        //         'country' => 'Nepal'
        //     ]
        // ];
        // $test->save();
        // return $test;

        // $test = Test::where('id', 2)->update([
        //     'meta_data->address->city' => 'Pokhara'
        // ]);     
        // return $test;

        $test = Test::find(2);
        $test->meta_data = collect($test->meta_data)->forget('email');
        $test->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
