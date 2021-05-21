@extends('layouts.app')

@section('content')
@foreach($reviews as $review)
    <tr>
        <td>{{ $hotel->reviews->title }}</td>
        <td>{{ $hotel->reviews->content }}</td>
        <td>{{ $hotel->reviews->created_at }}</td>
    </tr>
@endforeach

    {{ $products->appends(Request::all())->links() }}

 @endsection