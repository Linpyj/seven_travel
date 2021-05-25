<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Plan;
use App\Models\Review;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index(Request $request)
    {
        $hotels = Hotel::with('category')->paginate(5);
        return view('hotels.index', ['hotels' => $hotels]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel = new Hotel;
        return view('hotels/create', ['hotel' => $hotel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'address' => 'required|max:100',
            'tel' => 'required|numeric|digits_between:8,11',
            'check_in' => 'required',
            'check_out' => 'required',
            'remarks' => 'max:100',
            'prefecture' => 'required',
        ]);
        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->category_id = $request->category_id;
        $hotel->tel = $request->tel;
        $hotel->check_in = $request->check_in;
        $hotel->check_out = $request->check_out;
        $hotel->remarks = $request->remarks;
        $hotel->prefecture = $request->prefecture;
        $filename = $request->file('image')->store('public');
        $hotel->image = str_replace('public/','',$filename);
        $hotel->timestamps = false;
        $hotel->save();
        return redirect(route('hotels.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {   $reviews = Review::where('hotel_id', $hotel->id)->get();
        $plans = Plan::where('hotel_id', $hotel->id)->get();
        $hotel = Hotel::with(['category', 'plans', 'reviews'])->where('id', $hotel->id)->first();
        return view('hotels.show', ['hotel' => $hotel, 'plans' => $plans, 'reviews' => $reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', ['hotel' => $hotel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'category_id' => 'required|integer',
            'address' => 'required|max:100',
            'tel' => 'required|numeric|digits_between:8,11',
            'check_in' => 'required',
            'check_out' => 'required',
            'remarks' => 'max:100',
            'prefecture' => 'required',
        ]);
        $hotel->update($request->all());
        return redirect(route(''));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect(route(''));
    }
}
