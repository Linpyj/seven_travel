<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $review = new Review;
        $hotel_id = request('hotel_id');
        return view('review/create', ['review' => $review, 'hotel_id' => $hotel_id]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'content' => 'required|max:300',
        ]);
        $review = new Review;
        $review->title = $request->title;
        $review->content = $request->content;
        $review->hotel_id = $request->hotel_id;
        $review->save();
        return redirect(route('reservations.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** public function show($id)
    * {
    *    $reviews = \App\Review::find($id);
    *    return view ('show', ['review' => $reviews]);//
    *}
    */


}
