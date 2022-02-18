<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weatherforecast;
use Illuminate\Routing\Controller;

class WeatherController extends Controller
{

    public function index()
    {
        return Weatherforecast::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            "city"=>"required",
            "weather"=>"required"
        ]);
        return Weatherforecast::create($request->all());
    }


    public function show($id)
    {
        return Weatherforecast::find($id);
    }

    public function update(Request $request, $id)
    {
        $weather = Weatherforecast::find($id);
        $weather->update($request->all());
        return $weather;
    }


    public function destroy($id)
    {
        return Weatherforecast::destroy($id);
    }
}
