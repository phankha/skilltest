@extends('layouts.primary')
@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-4">
            <h6 class="text-muted">Products List</h6>
            <ul>
                @foreach($products as $product)
                <li><a href="{{route('product.index', $product->id)}}"> {{$product->name}}</a></li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
@endsection
