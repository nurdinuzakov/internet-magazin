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
        <section id="cart_items">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="breadcrumbs">
                            <ol class="breadcrumb">
                                <li><a href="{{ route('homePage') }}">Home</a></li>
                                <li class="active">Shopping Cart</li>
                            </ol>
                        </div>
                        <div class="flash_message"></div>
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                <thead>
                                <tr class="cart_menu">
                                    <td class="image">Item</td>
                                    <td class="description">Name</td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product_id => $product)
                                    <tr>
                                        <td class="cart_product">
                                            <a href=""><img src="{{ $product["image"] }}" alt="" style="width: 250px"></a>
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href="">{{ $product['name'] }}</a></h4>
                                            <p>Web ID: 1089772</p>
                                        </td>
                                        <td class="cart_price">
                                            <p id="product-price">$ {{ $product['price'] }}</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <button class="cart_quantity_up" id="addToCart" data-product-add="{{ $product_id }}" href="" style="margin-left: 5px;"> + </button>
                                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $product['quantity'] }}" data-product-id="{{ $product_id }}"autocomplete="off" size="2">
                                                <button class="cart_quantity_down" id="subtractFromCart" data-product-subtract="{{ $product_id }}"href="" style="margin-left: 5px;"> - </button>
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">$ {{ $product['quantity'] * $product['price'] }}</p>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!--/#cart_items-->

        <section id="do_action">
            <div class="container">
                <div class="heading">
                    <h3>What would you like to do next?</h3>
                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="chose_area">
                            <ul class="user_option">
                                <li>
                                    <input type="checkbox">
                                    <label>Use Coupon Code</label>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <label>Use Gift Voucher</label>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <label>Estimate Shipping & Taxes</label>
                                </li>
                            </ul>
                            <ul class="user_info">
                                <li class="single_field">
                                    <label>Country:</label>
                                    <select>
                                        <option>United States</option>
                                        <option>Bangladesh</option>
                                        <option>UK</option>
                                        <option>India</option>
                                        <option>Pakistan</option>
                                        <option>Ucrane</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>

                                </li>
                                <li class="single_field">
                                    <label>Region / State:</label>
                                    <select>
                                        <option>Select</option>
                                        <option>Dhaka</option>
                                        <option>London</option>
                                        <option>Dillih</option>
                                        <option>Lahore</option>
                                        <option>Alaska</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>

                                </li>
                                <li class="single_field zip-field">
                                    <label>Zip Code:</label>
                                    <input type="text">
                                </li>
                            </ul>
                            <a class="btn btn-default update" href="">Get Quotes</a>
                            <a class="btn btn-default check_out" href="">Continue</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <li>Cart Sub Total <span>$59</span></li>
                                <li>Eco Tax <span>$2</span></li>
                                <li>Shipping Cost <span>Free</span></li>
                                <li>Total <span>$61</span></li>
                            </ul>
                            <a class="btn btn-default update" href="">Update</a>
                            <a class="btn btn-default check_out" href="">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->
    @endsection
    @section('script')
        <script>
            $(document).ready(function () {
                $('.cart_quantity_up').on('click', function () {
                    let productId = $(this).data('product-add');
                    let productQty = $(this).closest('.cart_quantity_button').find("input").val();
                    $('.cart_quantity_input[data-product-id="' + productId + '"]').val(parseInt(productQty)+1);

                    let productFinalQty = $(this).closest('.cart_quantity_button').find("input").val();

                    ajaxQuery(productId, productFinalQty);
                    // totalAmount(productFinalQty);

                })

                $('.cart_quantity_down').on('click', function () {
                    let productId = $(this).data('product-subtract');
                    let productQty = $(this).closest('.cart_quantity_button').find("input").val();


                    if (productQty > 0) {
                        $('.cart_quantity_input[data-product-id="' + productId + '"]').val(parseInt(productQty)-1);
                    }

                    let productFinalQty = $(this).closest('.cart_quantity_button').find("input").val();

                    ajaxQuery(productId, productFinalQty);
                    // totalAmount(productFinalQty);

                })
                    // let totalAmount = function(productFinalQty){
                    //     console.log($('#product-price').text())
                    //     // productFinalQty * $('#product-price').val();
                    // }


                    let ajaxQuery = function(productId, productFinalQty){


                        let route = "{{ route('add.subtract.cart', ['productId' => 'productIdToChange']) }}";

                        $.ajax({
                            url: route.replace('productIdToChange', productId),
                            type: "POST",
                            data: {
                                '_token': "{{ csrf_token() }}",
                                productQty : productFinalQty
                            },
                            success: function (data) {
                                if (data.success) {
                                    $('#toCart').text(data.productCount);
                                }
                                let message = '<div class="alert alert-info message1" style="display: none">\n' +
                                    '                            <strong id="message">'+ data.message +'</strong>\n' +
                                    '                        </div>'
                                $('.flash_message').append(message);
                                $(".message1").show(500);
                                setTimeout(function () {
                                    $(".message1").hide(500, function () {
                                        $(".message1").remove();
                                    });
                                }, 5000)
                            },
                            error: function () {
                                alert("Something went wrong");
                            }
                        });
                    }

            })
        </script>
@endsection
