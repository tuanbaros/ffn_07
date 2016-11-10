<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::paginate(config('view.paginate'));
        return view('admin.country.list', compact('countries'));
    }
	
    public function create()
    {
        return view('admin.country.add');
    }

    public function store(Request $request)
    {
        $country = new Country();
        $data = $request->all();
        if ($country->validate($data)) {
            $country->name = ucwords($request->name);
            $country->code = (int)$request->code;
            $country->save();

            return redirect()->route('admin.country.index')->with([
                'flash_level' => 'success',
                'flash_message' => trans('admin.message.complate', ['name' => 'country'])
            ]);
        }
        return redirect()->back()->withErrors($country->valid());
    }
}
