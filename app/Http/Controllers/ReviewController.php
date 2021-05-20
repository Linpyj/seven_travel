<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create()
    {
        $review = new Review;
        return view('review/create', ['review' => $review ]);
    }
    //

    public function store(Request $request)
    {
        $review = new Review; //
        $review->create($request->all());
        return redirect(route('/.index')); //
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
