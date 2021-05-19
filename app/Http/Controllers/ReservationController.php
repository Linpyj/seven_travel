<?php

namespace App\Http\Controllers;

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
        $reservations =  Reservation::where('user_id', '==', Auth::id)->get();
        return view('/', ['reservations' => $reservations]);
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
        return view('/', ['reservation' => $reservation]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //　予約を保存
        echo $request;
        $reservation = $request->user()->reservations()->create($request->all());
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
        return redirect(route('/'));
    }
}
