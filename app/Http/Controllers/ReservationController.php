<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

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
        $date = $date = date("Y-m-d");
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
    public function create()
    {
        // 予約画面を表示
        $reservation = new Reservation;
        return view('/confirm', ['reservation' => $reservation]);
        // 確認画面へのルーティングを確認
    }

    public function confirm()
    {
        $input_data = 
        [
            $name = Input::get('user_name'),
            $plan = Input::get('plan'),
            $check_in = Input::get('check_in'),
            $check_out = Input::get('check_out'),
        ];
        return view('confirm', ['input_data' => $input_data]);

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
            'check_in' => 'required',
            'check_out' => 'required',
            'status' => 'required|max:10',
            ]);
        echo $request;

        // 予約を保存
        $reservation = $request->user->reservations->create($request->all());

        // 予約対象のプランを検索＆該当プランの部屋数を予約テーブルにも保存
        $plan = Plan::where('id', '==', $request->plan_id);
        $reservation->number_of_rooms = $plan->number_of_rooms;
        $reservation->save();
        return redirect(route('/'));
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
        return redirect(route('users.index'));
    }
}
