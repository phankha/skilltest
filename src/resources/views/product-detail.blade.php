@extends('layouts.primary')
@section('page-content')
    <div id="product" class="container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
            @if($product->category_id !=null)
                <li><a href="#">{{$product->category->name}}</a></li>
            @endif
            <li><a href="#">{{$product->name}}</a></li>
        </ul>
        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div id="product-images" class="carousel slide" data-bs-ride="carousel" align="center">
                            <!-- slides -->
                            @if(count($product->images)>=1)
                            <div class="carousel-inner">
                                @foreach($product->images as $key => $image)
                                <div class="carousel-item {{($key==0)?'active':''}}"> <img src="{{ asset('storage'.$image->image) }}" alt="product alt"> </div>
                                @endforeach

                            </div> <!-- Left right --> <a class="carousel-control-prev" href="#product-images" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#product-images" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                            <ol class="carousel-indicators list-inline">
                                @foreach($product->images as $key => $image)
                                <li class="list-inline-item {{($key==0)?'active':''}}"> <a id="carousel-selector-{{$key}}" class="{{($key==0)?'selected':''}}" data-bs-slide-to="{{$key}}" data-bs-target="#product-images"> <img src="{{ asset('storage'.$image->image) }}" class="img-fluid"> </a> </li>
                                @endforeach

                            </ol>
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <h1>{{$product->name}}</h1>
                        <p>Brand: {{ ($product->brand_id !=null) ? $product->brand->name : 'None' }}</p>
                        <div class="price">
                            @if($product->special_price == 0)
                            <span class="price-new">
                                <span id="price-special">{{$product->price}}</span>
                            </span>
                                <input type="hidden" id="price" value="{{$product->price}}">
                            @else
							<span class="price-new">
								<span id="price-special">{{$product->special_price}}</span>
							</span>
                            <input type="hidden" id="price" value="{{$product->special_price}}">
                            <span class="price-old" id="price-old">€ {{$product->price}}</span>
                            @endif
                        </div>
                        <div class="col-md-3 d-inline-flex">
                            <div class="input-qty">
                                <span class="pe-2">Amount</span>
                                <div class="qty-minus" onclick="if ($(this).parent('.input-qty').find('#qty-input').val()>1) { $(this).parent('.input-qty').find('#qty-input').val(parseInt($(this).parent('.input-qty').find('#qty-input').val())-1).change(); }">-</div>
                                <div class="qty-input-div">
                                    <input id="qty-input" type="text" name="quantity" value="1" class="form-control input-sm text-center">
                                </div>
                                <div class="qty-plus" onclick="$(this).parent('.input-qty').find('#qty-input').val(parseInt($(this).parent('.input-qty').find('#qty-input').val())+1).change();">+</div>
                            </div>


                        </div>
                        <div class="col-md-9 d-inline">
                            <button type="button" id="button-cart" data-loading-text="Loading..." class="btn btn-primary btn-block">Add to Cart</button>
                        </div>
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="ProductTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="tab-description" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab-delivery" data-bs-toggle="tab" data-bs-target="#delivery" type="button" role="tab" aria-controls="delivery" aria-selected="false">Delivery</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab-payment" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">Guarantees Payment</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="tab-description">{{$product->description}}</div>
                                <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="tab-delivery">{{$product->delivery}}</div>
                                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="tab-payment">{{$product->guarantees_payment}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
