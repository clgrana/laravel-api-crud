<?php


namespace App\Http\Controllers;


use App\Models\City;

class CityController extends Controller
{
    /**
     * @return mixed
     * list cities
     */
    public function index(){
        $cities = City::get();
        return response()->json($cities, 200);
    }

    /**
     * @param $id
     * @return mixed
     * show city
     */
    public function show($id){
        $city = City::findOrfail($id);
        return response()->json($city, 200);
    }
}
