<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Hotel;
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
            if($request->check_in < date("Y-m-d")){
                $plans = [];
                $error = [];
                $error2 = ['エラー'];
                return view('plans/index', ['plans' => $plans, 'prefectures' => $prefectures, 'error2' => $error2, 'error' => $error]);
            }
            $reservation = Plan::withCount(['reservations' => function (Builder $query) use ($request){
                $query->where('check_in','<=', $request->check_out)->where('check_out', '>=', $request->check_in);
            }])->with('hotel')->get();


            // 日付で絞り込み
            $filtered = $reservation->map(function($item, $key) {
                if ($item['reservations_count'] < $item['number_of_room']) {
                    return $item;
                }
            });
            $plans1 = $filtered->whereNotNull('name');
            //県で絞り込み
            if($request->prefecture){
                $plans = array();
                foreach($plans1 as $plan){
                    if($plan['hotel']['prefecture'] == $request->prefecture){
                        array_push($plans, $plan);
                    }
                }
                $plans1 = array();
                $plans1 = $plans;
            }
            //最低金額で絞り込み
            if($request->price_min){
                $plans = array();
                foreach($plans1 as $plan){
                    if($plan['price'] >= $request->price_min){
                        array_push($plans, $plan);
                    }
                }
                $plans1 = array();
                $plans1 = $plans;
            }
            //最高金額で絞り込み
            if($request->price_max){
                $plans = array();
                foreach($plans1 as $plan){
                    if($plan['price'] <= $request->price_max){
                        array_push($plans, $plan);
                    }
                }
                $plans1 = array();
                $plans1 = $plans;
            }
            
            $error = [];
            $error2 = [];
            $plans = $plans1;
            return view('plans/index',['plans' => $plans, 'prefectures' => $prefectures, 'error' => $error, 'error2' => $error2]);

        } else {
            $plans = [];
            $error = ['エラー'];
            $error2 = [];
            return view('plans/index', ['plans' => $plans, 'prefectures' => $prefectures, 'error' => $error, 'error2' => $error2]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Hotel $hotel)
    {
        $hotel_id = request('hotel');
        $plan = new Plan;
        return view('plans/create', ['plan' => $plan, 'hotel_id' => $hotel_id]);
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
            'price' => 'required|numeric|max:1000000',
            'number_of_room' => 'required|numeric|max:100',
            'remarks' => 'max:100',
        ]);
        $plan = new Plan;
        $plan->hotel_id = $request->hotel_id;
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->number_of_room = $request->number_of_room;
        $plan->remarks = $request->remarks;
        $plan->timestamps = false;
        $plan->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        $plan = Plan::with('hotel')->where('id', $plan->id)->first();
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
        
        return view('plans.edit', ['plan' => $plan]);
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
            'price' => 'required|numeric|max:1000000',
            'number_of_room' => 'required|numeric|max:100',
            'remarks' => 'max:100',
        ]);
        $plan->timestamps = false;
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
        return redirect(route('hotels.show',$plan->hotel_id));
    }
}
