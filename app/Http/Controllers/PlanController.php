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
    public function index(){

    }
    public function search(Request $request)
    {
        if($request->check_in && $request->check_out){
            $reservation = Plan::withCount(['reservations' => function (Builder $query){
                $query->where('check_in', '>=', $request->check_in)->where('check_out','<=', $request->check_out);
            }]);
            $query =Plan::with('hotel')->where('number_of_room', '>', $reservation_count);
            $plans = $query->get();
            dd($plans);
        }
        return view('plans.index');
        // else{
        //     $query = Plan::with('hotel');
        // }
        // if($request->price){
        //     $max = $request->price + 10000;
        //     $query->where('price', '>=', $request->price)->where('price', '<=', $max);
        // }
        // if($request->prefecture){
        //     $query->where('prefecture', '==', $request->prefecture);
        // }
    
        // $plans = $query->paginate(10);
        // return view('plans/index', ['plans' => $plans]);
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
