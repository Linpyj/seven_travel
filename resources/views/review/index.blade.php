@extends('layouts.app')

@section('content')
@foreach($reviews as $review)
    <tr>
        <td>{{ $hotel->review->title }}</td>
        <td>{{ $hotel->review->content }}</td>
        <td>{{ $hotel->review->created_at }}</td>
    </tr>
@endforeach

    {{ $products->appends(Request::all())->links() }}

 @endsection