<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $prefectures = ['北海道',	'青森',	'岩手',	'宮城',	'秋田',	'山形',	'福島',	'茨城',	'栃木',	'群馬',	'埼玉',	'千葉',	'東京',	'神奈川',	'新潟',	'富山',	'石川',	'福井',	'山梨',	'長野',	'岐阜',	'静岡',	'愛知',	'三重',	'滋賀',	'京都',	'大阪',	'兵庫',	'奈良',	'和歌山',	'鳥取',	'島根',	'岡山',	'広島',	'山口',	'徳島',	'香川',	'愛媛',	'高知',	'福岡',	'佐賀',	'長崎',	'熊本',	'大分',	'宮崎',	'鹿児島',	'沖縄'];
        if ($request->check_in && $request->check_out) {
            // echo $request;
            // echo $request->prefecture;
            $reservation = Plan::withCount(['reservations' => function (Builder $query) use ($request){
                $query->where('check_in','<=', $request->check_out)->where('check_out', '>=', $request->check_in);
            }])->with('hotel')->get();


            // 日付で絞り込み
            $filtered = $reservation->map(function($item, $key) {
                if ($item['reservations_count'] < $item['number_of_room']) {
                    return $item;
                }
            });

            // 所在地で絞り込み
            if ($request->prefecture) {
                $filtered = $filtered->map(function($item, $key) use($request) {
                    if ($item['hotel']['prefecture'] == $request['prefecture']) {
                        return $item;
                    }
                });
            }

            // 値段で絞り込み
            if ($request->price_min && $request->price_max) {
                // $filtered = $filtered->where('price', '>=', $request->price_min)->where('price', '<=', $request->price_max);

                $filtered = $filtered->map(function($item, $key) use($request) {
                    if ($item['price'] >= $request['price_min'] && $item['price'] <= $request['price_max']) {
                        return $item;
                    }
                });
            }            

            $filtered = $filtered->map(function($item, $key) use($request) {
                if (isset($item)) {
                    return $item;
                }
            });

            // dd($filtered);

            $plans = $filtered->whereNotNull('name');
            $error = [];
            // dd($plans);
            return view('plans/index',['plans' => $plans, 'prefectures' => $prefectures, 'error' => $error]);

        } else {
            $plans = Plan::all();
            $error = ['エラー'];
            return view('plans/index', ['plans' => $plans, 'prefectures' => $prefectures, 'error' => $error]);
        }
        // else {
        //     $filtered = Plan::with('hotel')->get();

        //     // if ($request->price_min && $request->price_max) {
        //     //     $filtered = $filtered->where('price', '>=', $request->price_min)->where('price', '<=', $request->price_max);
        //     // }

        //     if ($request->prefecture) {
        //         $filtered = $filtered->map(function($item, $key) use($request) {
        //             if ($item['hotel']['prefecture'] == $request['prefecture']) {
        //                 return $item;
        //             }
        //         });
        //     }

        //     if ($request->price_min && $request->price_max) {
        //         // $filtered = $filtered->where('price', '>=', $request->price_min)->where('price', '<=', $request->price_max);

        //         $filtered = $filtered->map(function($item, $key) use($request) {
        //             if ($item['price'] >= $request['price_min'] && $item['price'] <= $request['price_max']) {
        //                 return $item;
        //             }
        //         });            
        //     }

        //     $plans = $filtered->whereNotNull('name');
        
        //     // dd($filtered);

        // }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plan = new Plan;
        return view('plan/create', ['plan' => $plan]);
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
            'price' => 'required|numeric|max:7',
            'number_of_room' => 'required|numeric|max:4',
            'remarks' => 'max:100',
        ]);
        $request->hotel->plans()->create($request->all());
        return redirect(route(''));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        $plan = Plan::with('hotel')->first();
        return view('plans.show', ['plan' => $plan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        return view('plan.edit', ['plan' => $plan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'price' => 'required|numeric|max:7',
            'number_of_room' => 'required|numeric|max:4',
            'remarks' => 'max:100',
        ]);
        $plan->update($request->all());
        return redirect(route(''));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect(route(''));
    }
}
