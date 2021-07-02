<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | E-Shopper</title>
@extends('layout.app')

    @section('content')
        <section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-products-->
                        @foreach($categories as $category)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian"
                                           href="#{{ 'category_' . $category->id }}">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            {{ $category->name }}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{'category_'. $category->id }}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            @foreach($category->subcategories()->get()  as $subcategory)
                                                <li><b><a href="{{ route('subcategory', ['category_id' =>
                                                                   $category->id]) }}">{{ $subcategory->name }}</a></b></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!--/category-products-->

{{--                    <div class="brands_products"><!--brands_products-->--}}
{{--                        <h2>Brands</h2>--}}
{{--                        <div class="brands-name">--}}
{{--                            <ul class="nav nav-pills nav-stacked">--}}
{{--                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>--}}
{{--                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>--}}
{{--                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>--}}
{{--                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>--}}
{{--                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>--}}
{{--                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>--}}
{{--                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div><!--/brands_products-->--}}

{{--                    <div class="price-range"><!--price-range-->--}}
{{--                        <h2>Price Range</h2>--}}
{{--                        <div class="well">--}}
{{--                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"--}}
{{--                                   data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />--}}
{{--                            <b>$ 0</b> <b class="pull-right">$ 600</b>--}}
{{--                        </div>--}}
{{--                    </div><!--/price-range-->--}}

{{--                    <div class="shipping text-center"><!--shipping-->--}}
{{--                        <img src="../images/home/shipping.jpg" alt="" />--}}
{{--                    </div><!--/shipping-->--}}

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ $product->images }}" alt="" />
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    @foreach($images as $image)
                                        <div class="item @if($loop->first) active @endif">
                                            @foreach($image as $url)
                                                <a href=""><img src="{{ asset($url) }}" alt="" style="width: 70px; height: 80px;"></a>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>


                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="{{ asset('images/product-details/new.jpg') }}" class="newarrival" alt="" />
                            <h2>{{$product->name}}</h2>
                            <span>
									<span>US ${{ $product->price }}</span>
									<label>Quantity:</label>
									<input type="text" value="{{ $product->quantity }}" />
									<button type="button" class="btn btn-fefault cart" id="addToCart" value="cart" data-product-id="{{ $product->id }}">
										<i class="fa fa-shopping-cart"></i>
										В корзину
									</button>
								</span>
                            <p><b>Availability:</b>
                                {{ $product->quantity > 0 ? 'In stock' : 'Not available' }}
                            </p>
{{--                            <p><b>Condition:</b> New</p>--}}
{{--                            <p><b>Brand:</b> E-SHOPPER</p>--}}
{{--                            <div class="dropdowns">--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Size chart--}}
{{--                                        <span class="caret"></span></button>--}}
{{--                                    <ul class="dropdown-menu">--}}
{{--                                        <li><a href="#">XS</a></li>--}}
{{--                                        <li><a href="#">S</a></li>--}}
{{--                                        <li><a href="#">M</a></li>--}}
{{--                                        <li><a href="#">L</a></li>--}}
{{--                                        <li><a href="#">XL</a></li>--}}
{{--                                        <li><a href="#">XXL</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <div class="dropdown">--}}
{{--                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Color chart--}}
{{--                                        <span class="caret"></span></button>--}}
{{--                                    <ul class="dropdown-menu">--}}
{{--                                        <li><a href="#">Белый</a></li>--}}
{{--                                        <li><a href="#">Черный</a></li>--}}
{{--                                        <li><a href="#">Красный</a></li>--}}
{{--                                        <li><a href="#">Оранжевый</a></li>--}}
{{--                                        <li><a href="#">Желтый</a></li>--}}
{{--                                        <li><a href="#">Зеленый</a></li>--}}
{{--                                        <li><a href="#">Синий</a></li>--}}
{{--                                        <li><a href="#">Красный</a></li>--}}
{{--                                        <li><a href="#">Голубой</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                            <div class="col-sm-12">
                                <p><b>About {{$product->name}}</b></p>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($products as $product)
                                <div class="item @if($loop->first) active @endif">
                                    @foreach($product as $data)
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="{{ asset($data['images']) }}" alt="" style="width: 200px; height: 180px;"/>
                                                        <h2>$ {{ $data['price'] }}</h2>
                                                        <p>{{ $data['name'] }}</p>
                                                        <button type="button" class="btn btn-fefault cart" id="addToCart" value="cart" data-product-id="#">
                                                            <i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
@endsection

    @section('script')
        <script>
            $('#addToCart').on('click', function () {
                let productId = $(this).data('product-id');
                let route = "{{ route('add.cart', ['productId' => 'productIdToChange']) }}";

                $.ajax({
                    url: route.replace('productIdToChange', productId),
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        if (data.success) {
                            $('#toCart').text(data.productCount);
                            alert('Product added to cart successfully!');
                        }else{
                            alert('The product add to cart was failed!');
                        }

                    },
                    error: function () {
                        alert("Something went wrong");
                    }
                });

            })
        </script>
@endsection

