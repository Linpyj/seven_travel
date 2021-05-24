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
        $prefectures = ['北海道',	'青森県',	'岩手県',	'宮城県',	'秋田県',	'山形県',	'福島県',	'茨城県',	'栃木県',	'群馬県',	'埼玉県',	'千葉県',	'東京都',	'神奈川県',	'新潟県',	'富山県',	'石川県',	'福井県',	'山梨県',	'長野県',	'岐阜県',	'静岡県',	'愛知県',	'三重県',	'滋賀県',	'京都府',	'大阪府',	'兵庫県',	'奈良県',	'和歌山県',	'鳥取県',	'島根県',	'岡山県',	'広島県',	'山口県',	'徳島県',	'香川県',	'愛媛県',	'高知県',	'福岡県',	'佐賀県',	'長崎県',	'熊本県',	'大分県',	'宮崎県',	'鹿児島県',	'沖縄県'];
        if ($request->check_in && $request->check_out) {
            $reservation = Plan::withCount(['reservations' => function (Builder $query) use ($request){
                $query->where('check_in','<=', $request->check_out)->where('check_out', '>=', $request->check_in);
            }])->with('hotel')->get();

            $filtered = $reservation->map(function($item, $key) {
                if ($item['reservations_count'] >= $item['number_of_room']) {
                    return $item;
                }
            });

            // foreach($filtered as $item) {
            //     echo $item;
            // }

            if ($request->price_min && $request->price_max) {
                echo $request->price_min;
                echo $request->price_max;
                $filtered = $filtered->where('price', '>=', $request->price_min)->where('price', '<=', $request->price_max);
            }

            if ($request->prefecture) {
                $filtered = $filtered->where('hotel->prefecture', '==', $request->prefecture);
            }
            $plans = $filtered->all();
        } else {
            $query = Plan::with('hotel');
            if ($request->price) {
                $max = $request->price + 10000;
                $query = $query->where('price', '>=', $request->price)->where('price', '<=', $max);
            }
            if ($request->prefecture) {
                $query = $query->where('prefecture', '==', $request->prefecture);
            }
            $plans = $query->get();
        }
        
        return view('plans/index',['plans' => $plans, 'prefectures' => $prefectures]);
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
        $plan = Plan::with('hotel')->get();
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
