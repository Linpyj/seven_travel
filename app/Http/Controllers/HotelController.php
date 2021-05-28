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
        $hotel_name = $request->input('name');
        if (!!$hotel_name) {
            //$hotels = Hotel::where('name', 'like', '%' . $hotel_name . '%')->get();
            $hotels = Hotel::where('name', 'like', '%' . $hotel_name . '%')->paginate(10);


        } else {
            //$hotels = Hotel::all();
            $hotels = Hotel::paginate(10);
        }
        return view('hotels.index', ['hotels' => $hotels]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prefectures = ['北海道',	'青森',	'岩手',	'宮城',	'秋田',	'山形',	'福島',	'茨城',	'栃木',	'群馬',	'埼玉',	'千葉',	'東京',	'神奈川',	'新潟',	'富山',	'石川',	'福井',	'山梨',	'長野',	'岐阜',	'静岡',	'愛知',	'三重',	'滋賀',	'京都',	'大阪',	'兵庫',	'奈良',	'和歌山',	'鳥取',	'島根',	'岡山',	'広島',	'山口',	'徳島',	'香川',	'愛媛',	'高知',	'福岡',	'佐賀',	'長崎',	'熊本',	'大分',	'宮崎',	'鹿児島',	'沖縄'];
        $hotel = new Hotel;
        return view('hotels/create', ['hotel' => $hotel, 'prefectures' => $prefectures]);
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
        if($request->file('image')){
            $filename = $request->file('image')->store('public');
            $hotel->image = str_replace('public/','',$filename);
        }
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
        $prefectures = ['北海道',	'青森',	'岩手',	'宮城',	'秋田',	'山形',	'福島',	'茨城',	'栃木',	'群馬',	'埼玉',	'千葉',	'東京',	'神奈川',	'新潟',	'富山',	'石川',	'福井',	'山梨',	'長野',	'岐阜',	'静岡',	'愛知',	'三重',	'滋賀',	'京都',	'大阪',	'兵庫',	'奈良',	'和歌山',	'鳥取',	'島根',	'岡山',	'広島',	'山口',	'徳島',	'香川',	'愛媛',	'高知',	'福岡',	'佐賀',	'長崎',	'熊本',	'大分',	'宮崎',	'鹿児島',	'沖縄'];
        return view('hotels.edit', ['hotel' => $hotel, 'prefectures' => $prefectures]);
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
            'address' => 'required|max:100',
            'tel' => 'required|numeric|digits_between:8,11',
            'check_in' => 'required',
            'check_out' => 'required',
            'remarks' => 'max:100',
            'prefecture' => 'required',
        ]);
        $hotel->timestamps = false;
        $hotel->update($request->all());
        $hotels = Hotel::all();
        return view('hotels.index', ['hotels' => $hotels]);
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
        return redirect(route('hotels.index'));
    }
}
