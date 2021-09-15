<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityCreateRequest;
use App\Http\Requests\Admin\CityEditRequest;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function cities()
    {
        $cities = City::all();

        return view('layouts.admin.cities',['cities'=>$cities]);
    }

    public function cityCreate()
    {
        $cities = City::all();

        return view('layouts.admin.city_create', ['cities'=>$cities]);
    }

    public  function cityCreateSubmit(CityCreateRequest $request): RedirectResponse
    {
        $city = new City();

        $city->fill($request->all());

        $city->save();

        return redirect()->route('admin.cities', ['city'=>$city])->with('success', 'Город был добавлен');

    }

    public function  cityEdit(City $city)
    {
        return view('layouts.admin.city_edit', ['city'=>$city]);
    }

    public function cityEditSubmit(CityEditRequest $request, City $city): RedirectResponse
    {
        $city->fill($request->all());

        $city->save();

        $cities = City::all();

        return redirect()->route('admin.cities', [
            'cities'=>$cities,
            'city' =>$city,
        ])->with('success', 'Город был отредактирован');
    }

    public function cityDelete(City $city): RedirectResponse
    {
        $city->delete();

        return redirect()->route('admin.cities')->with('success', 'Город удален');
    }


}
