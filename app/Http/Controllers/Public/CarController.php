<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query=Car::latest();
        // $q=$request->query('q');
        if($request->filled('category'))
        {

            $query->where('category_id',$request->category);
        }
        if($request->filled('q'))
        {
            $query->where(function($q) use ($request){
                $q->Where('model','like',"%$request->q%")
                ->orWhere('brand','like',"%$request->q%");

            });
        }
        // $cars->where('category_id',$request->category);

        // query is the input i get from Get method
        // input is from Get or Post
        // we can say $request->q as a input
        // $cars->get();
        // get() is to bring data from DB
        $cars=$query->paginate(1)->withQueryString();
        // we cant say $cars->get() cause he take it as a builser not collection

        $categories=Category::Has('cars')->get();
        return view('public.cars.index',compact('cars','categories'));
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
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('public.cars.show',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
