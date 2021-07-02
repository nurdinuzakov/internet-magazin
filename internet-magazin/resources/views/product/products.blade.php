@extends('layout.app')

@section('title') Product Details | E-Shopper @endsection
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

                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well">
                                <div class="span2" value="" data-slider-min="0" data-slider-max="600"
                                      data-slider-step="5" data-slider-value="[{{ request('min_price', 0) }},{{ request('max_price', 600) }}]" id="sl2" ></div><br />
                                <b>$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach($products as $product)
                        <div class="col-sm-4">
                            <a href="{{ route('product.details', ['product_id' => $product->id]) }}">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ $product->images }}" alt="" />
                                            <h2>{{ $product->price }} Com</h2>
                                            <p>{{ $product->name }}</p>
                                            <a href="{{ route('product.details', ['product_id' => $product->id]) }}" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Смотреть</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        <ul class="pagination">
                            <li>{{ $products->links('vendor.pagination.custom') }}</li>
                        </ul>
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>
    <form action="" method="GET" id="product-form">
        <input type="hidden" name="min_price" value="{{ request('min_price', 0) }}">
        <input type="hidden" name="max_price" value="{{ request('max_price', 600) }}">
    </form>
@endsection

@section('script')
        <script type="text/javascript">
            $('#sl2').slider()
                .on('slideStop', function(ev){
                    $('input[name="min_price"]').val(ev.value[0])
                    $('input[name="max_price"]').val(ev.value[1])

                    $('#product-form').submit()
                });
        </script>
@endsection
