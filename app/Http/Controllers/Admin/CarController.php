<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Redirect;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars=Car::all();
        return view('admin.cars.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['id', 'name', 'capacity']);
        return view('admin.cars.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->is_new);
        $validated=$request->validate([
            'brand'         => 'required',
            'model'         => 'required',
            'category_id'   => 'required|numeric|exists:categories,id',
            'price'         => 'required|numeric|min:100000',
            'colors'        => 'required',
            'gear_type'     => 'required',
            'year'          => 'required',
            'country'       => 'required',
            'is_new'        => 'boolean|nullable',
            'description'   => 'required',

        ]);
        $validated['description']=clean($validated['description']);
        $car=Car::create($validated);

        return redirect()->route('admin.cars.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('admin.cars.show',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $categories = Category::all(['id', 'name', 'capacity']);
        return view('admin.cars.edit', compact('car','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {

        $validated=$request->validate([
            'brand'         => 'required|min:3',
            'model'         => 'required',
            'category_id'   => 'numeric|exists:categories,id',
            'price'         => 'required|numeric|min:100000',
            'colors'        => 'required',
            'gear_type'     => 'required',
            'year'          => 'required',
            'country'       => 'required',
            'is_new'        => 'boolean|nullable',
            'description'   => 'required',
        ]);
        $car->update($validated);
        /*
        $car->brand         = $request->brand;
        $car->model         = $request->model;
        $car->price         = $request->price;
        $car->colors        = $request->colors;
        $car->gear_type     = $request->gear_type;
        $car->year          = $request->year;
        $car->country       = $request->country;
        $car->is_new        = $request->is_new ?? false ;
        $car->description   = $request->description;
        $car->category_id   =  $request->category_id?? false;;
        $car->save();
        */
        return redirect()->route('admin.cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        /*
        if($car->is_new == false){
            return redirect()->back();
        }
        */
        $car->delete();
        return redirect()->route('admin.cars.index');

    }
}
