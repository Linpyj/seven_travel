<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Plan;
use App\Models\Hotel;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Builder;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 予約履歴を参照
        $date = date("Y-m-d");
        $query =  Reservation::with('plan.hotel');
        $query->where('user_id', \Auth::id());
        $query->where('check_out','<', $date);
        $reservations = $query->get();
        return view('reservations.index', ['reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $reservation = new Reservation;
        $plan_id = request('plan_id');
        // dd($plan_id);
        $plan = Plan::where('id', $plan_id)->first();
        // dd($plan);
        return view('reservations.create', ['reservation' => $reservation, 'plan' => $plan]);
    }

    public function show(Request $request)
    {
        $input_data = array(
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        );
        $plan = Plan::with('hotel')->where('id', $request->plan_id)->first();
        return view('reservations.confirm', ['input_data' => $input_data, 'plan' => $plan]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flag = true;
        $this->validate($request, [
            'check_in' => 'required',
            'check_out' => 'required',
            'number_of_room' => 'required',
        ]);
        $reservation_count = Reservation::where('check_in','<=', $request->check_out)->where('check_out', '>=', $request->check_in)->where('plan_id',$request->plan_id)->count();
        //$reservation_room = Reservation::where('plan_id',$request->plan_id)->first();
        if($reservation_count < $request->number_of_room){
            // 予約を保存
            $reservation = new Reservation;
            $reservation->user_id = \Auth::id();
            $reservation->plan_id = $request->plan_id;
            $reservation->check_in = $request->check_in;
            $reservation->check_out = $request->check_out;
            $reservation->number_of_rooms = $request->number_of_room;
            $reservation->status = 1;
            $reservation->save();
            return view('reservations.complete', ['flag' => $flag]);
        }
        $flag = false;
        return view('reservations.complete', ['flag' => $flag]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //　予約を削除（キャンセル）
        $reservation->delete();
        return redirect(route('mypage'));
    }
}
