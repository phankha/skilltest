@extends('layouts.primary')
@section('page-content')
    <div id="product" class="container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="#">product name</a></li>
        </ul>
        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div id="product-images" class="carousel slide" data-bs-ride="carousel" align="center">
                            <!-- slides -->
                            <div class="carousel-inner">
                                <div class="carousel-item active"> <img src="{{ asset('images/demo/600x450-01.png') }}" alt="product alt"> </div>
                                <div class="carousel-item"> <img src="{{ asset('images/demo/600x450-02.png') }}" alt="product alt"> </div>
                                <div class="carousel-item"> <img src="{{ asset('images/demo/600x450-03.png') }}" alt="product alt"> </div>
                                <div class="carousel-item"> <img src="{{ asset('images/demo/600x450-04.png') }}" alt="product alt"> </div>
                            </div> <!-- Left right --> <a class="carousel-control-prev" href="#product-images" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#product-images" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                            <ol class="carousel-indicators list-inline">
                                <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-bs-slide-to="0" data-bs-target="#product-images"> <img src="{{ asset('images/demo/600x450-01.png') }}" class="img-fluid"> </a> </li>
                                <li class="list-inline-item"> <a id="carousel-selector-1" data-bs-slide-to="1" data-bs-target="#product-images"> <img src="{{ asset('images/demo/600x450-02.png') }}" class="img-fluid"> </a> </li>
                                <li class="list-inline-item"> <a id="carousel-selector-2" data-bs-slide-to="2" data-bs-target="#product-images"> <img src="{{ asset('images/demo/600x450-03.png') }}" class="img-fluid"> </a> </li>
                                <li class="list-inline-item"> <a id="carousel-selector-2" data-bs-slide-to="3" data-bs-target="#product-images"> <img src="{{ asset('images/demo/600x450-04.png') }}" class="img-fluid"> </a> </li>
                            </ol>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <h1>Product name</h1>
                        <p>Brand: Brand name</p>
                        <div class="price">
							<span class="price-new">
								<span id="price-special">$60.00</span>
							</span>
                            <input type="hidden" id="price" value="60.00">
                            <span class="price-old" id="price-old">
								$77.00
						   </span>
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
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="tab-description">description</div>
                                <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="tab-delivery">delivery</div>
                                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="tab-payment">Guarantees Payment</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
